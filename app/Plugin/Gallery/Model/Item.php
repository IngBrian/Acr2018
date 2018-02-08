<?php
App::uses('File', 'Utility');

class Item extends GalleryAppModel
{
    public $name = 'Item';

    public $itemToDelete = null;

    public $tablePrefix = 'gallery_';

    public $belongsTo = array('Gallery.Bag');

    public $order = 'Item.order ASC';

    public $validate = array(
        'bag_id' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'The document ID is required'
        ),
        'size' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'The SIZE is required'
        ),
        'path' => array(
            'rule' => 'notEmpty',
            'required' => true,
            'message' => 'The PATH is required'
        )
    );

    /**
    * Preserve picture ID for deleting versions after remove from database
    */
    public function beforeDelete($cascade = true)
    {
      $this->itemToDelete = $this->id;

      return true;
    }

    /**
     * Remove all versions of the picture from the storage after delete the
     * record from the database
     */
    public function afterDelete()
    {
      if( $this->itemToDelete ) {

        $this->deleteVersions($this->itemToDelete);

        $this->itemToDelete = null;
      }
    }

    /**
     * @param $bag_id
     * @return int
     */
    public function getNextNumber($bag_id)
    {
        return (int)$this->find('count', array('conditions' => array('Item.bag_id' => $bag_id))) + 1;
    }


    public function beforeValidate($options = array())
    {
        if (empty($this->data['Item']['size'])) {
            $file = new File($this->data['Item']['path']);
            $this->data['Item']['size'] = $file->size();
            
        }

        return true;
    }

    /**
     * @param $results
     * @param bool $primary
     * @return mixed
     */
    public function afterFind($results, $primary = false)
    {
        foreach ($results as $key => $val) {
            $root_url = WWW_ROOT;
            $relative_url = Router::url('/');

            if (isset($val['Item']['path'])) {
                # Add custom styles
                $results[$key]['Item']['styles'] = $this->getChild($val['Item']['id']);

                # Add relative image path
                $results[$key]['Item']['link'] = str_replace($root_url, $relative_url, $val['Item']['path']);
            }
        }
        return $results;
    }



    /**
     * Remove all versions from a picture from the database and from the server
     *
     * @param $id
     */
    public function deleteVersions($id)
    {
        # Remove all versions of the picture
        $items = $this->find(
            'all',
            array(
                'conditions' => array(
                    'Item.main_id' => $id
                )
            )
        );

        if (count($items)) {
            foreach ($items as $pic) {
                # Remove Item
                if (unlink($pic['Item']['path'])) {
                    # Remove from database
                    $this->delete($pic['Item']['id'], array('callback' => false));
                }
            }
        }

        return true;
    }

    /**
     * Save picture information in database
     *
     * @param $bag_id
     * @param $Itemname
     * @param $Itemsize
     * @param $path
     * @param null $main_id
     * @param string $style
     * @return mixed
     */
    public function saveItem($bag_id, $filename, $path, $main_id = null, $style = 'full')
    {
        $this->create();

        # Save the record in database
        $picture = array(
            'Item' => array(
                'bag_id' => $bag_id,
                'name' => $filename,
                'path' => $path,
                'main_id' => $main_id,
                'style' => $style
            )
        );

        $this->save($picture);

        return $this->id;
    }


   

    /**
     * Upload the image to WWW_ROOT/Items/gallery/{document_id}/picture.jpg
     * Optionaly save it to database
     *
     * @param $path
     * @param $document_id
     * @param $Itemname
     * @param $Itemsize
     * @param $tmp_name
     * @param bool $save
     * @param null $main_id
     * @param string $style
     * @return mixed|null
     * @throws ForbiddenException
     */
    public function uploadFile(

        $path = null,
        $bag_id = null,
        $filename,
        $tmp_name = null,
        $save = false,
        $main_id = null,
        $style = 'full'
    ) {


        if (!$bag_id) {
            throw new ForbiddenException("The document ID is required");
        }

        if (!$path) {
            throw new ForbiddenException("The PATH is required");
        }

        if (!$tmp_name) {
            throw new ForbiddenException("The TMP_NAME is required");
        }
            ##### move_uploaded_Item
        if (copy($tmp_name, $path)) {
           
            if ($save) {
                return $this->saveItem($bag_id, $filename, $path, $main_id, $style);
            }
            return null;
        } else {
            throw new ForbiddenException("Upload failed. Check your folders permissions.");
        }
    }

    

    /**
     * @param null $picture_id
     * @return array
     */
    private function getChild($item_id = null)
    {
        $this->unbindModel(
            array('belongsTo' => array('Gallery.Bag'))
        );

        $childrens = $this->find(
            'all',
            array(
                'conditions' => array(
                    'main_id' => $item_id
                ),
                'fields' => array('Item.path', 'Item.id', 'Item.style')
            )
        );

        $childs = array();
        foreach ($childrens as $child) {
            $childs[$child['Item']['style']] = $child['Item']['link'];
        }

        return $childs;
    }

    /**
     * Get Item size
     * @param null $path
     * @return integer
     */
    public function getFileSize($path = null)
    {
        $file = new File($path);

        return $file->size();
    }

    /**
     * @param $document_id
     * @param $Itemname
     * @return string
     */
    public function generateFilePath($bag_id = null, $filename = null)
    {
        if (!$bag_id || !$filename) {
            return false;
        }

        $folder = WWW_ROOT . 'files' . DS .$_SESSION['empresa_'].DS. 'multimedia' . DS . $bag_id . DS;
         if (!file_exists($folder)) {
		  mkdir($folder, 0777);
		}


        if(!is_writable($folder)) {
          throw new ForbiddenException('Your files/Documentos directory is not writtable.');
        }

        return  $folder . $filename;
    }

   
}

?>
