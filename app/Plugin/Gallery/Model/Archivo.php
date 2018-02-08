<?php
App::uses('File', 'Utility');

class Archivo extends GalleryAppModel
{
    public $name = 'Archivo';

    public $archivoToDelete = null;

    public $tablePrefix = 'gallery_';

    public $belongsTo = array('Gallery.Document');

    public $order = 'Archivo.order ASC';

    public $validate = array(
        'document_id' => array(
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
      $this->archivoToDelete = $this->id;

      return true;
    }

    /**
     * Remove all versions of the picture from the storage after delete the
     * record from the database
     */
    public function afterDelete()
    {
      if( $this->archivoToDelete ) {

        $this->deleteVersions($this->archivoToDelete);

        $this->archivoToDelete = null;
      }
    }

    /**
     * @param $document_id
     * @return int
     */
    public function getNextNumber($document_id)
    {
        return (int)$this->find('count', array('conditions' => array('Archivo.document_id' => $document_id))) + 1;
    }


    public function beforeValidate($options = array())
    {
        if (empty($this->data['Archivo']['size'])) {
            $file = new File($this->data['Archivo']['path']);
            $this->data['Archivo']['size'] = $file->size();
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

            if (isset($val['Archivo']['path'])) {
                # Add custom styles
                $results[$key]['Archivo']['styles'] = $this->getChild($val['Archivo']['id']);

                # Add relative image path
                $results[$key]['Archivo']['link'] = str_replace($root_url, $relative_url, $val['Archivo']['path']);
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
        $archivos = $this->find(
            'all',
            array(
                'conditions' => array(
                    'Archivo.main_id' => $id
                )
            )
        );

        if (count($archivos)) {
            foreach ($archivos as $pic) {
                # Remove Archivo
                if (unlink($pic['Archivo']['path'])) {
                    # Remove from database
                    $this->delete($pic['Archivo']['id'], array('callback' => false));
                }
            }
        }

        return true;
    }

    /**
     * Save picture information in database
     *
     * @param $document_id
     * @param $Archivoname
     * @param $Archivosize
     * @param $path
     * @param null $main_id
     * @param string $style
     * @return mixed
     */
    public function saveArchivo($document_id, $filename, $path, $main_id = null, $style = 'full')
    {
        $this->create();

        # Save the record in database
        $picture = array(
            'Archivo' => array(
                'document_id' => $document_id,
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
     * Upload the image to WWW_ROOT/Archivos/gallery/{document_id}/picture.jpg
     * Optionaly save it to database
     *
     * @param $path
     * @param $document_id
     * @param $Archivoname
     * @param $Archivosize
     * @param $tmp_name
     * @param bool $save
     * @param null $main_id
     * @param string $style
     * @return mixed|null
     * @throws ForbiddenException
     */
    public function uploadFile(

        $path = null,
        $document_id = null,
        $filename,
        $tmp_name = null,
        $save = false,
        $main_id = null,
        $style = 'full'
    ) {


        if (!$document_id) {
            throw new ForbiddenException("The document ID is required");
        }

        if (!$path) {
            throw new ForbiddenException("The PATH is required");
        }

        if (!$tmp_name) {
            throw new ForbiddenException("The TMP_NAME is required");
        }
            ##### move_uploaded_Archivo
        if (copy($tmp_name, $path)) {
           
            if ($save) {
                return $this->saveArchivo($document_id, $filename, $path, $main_id, $style);
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
    private function getChild($archivo_id = null)
    {
        $this->unbindModel(
            array('belongsTo' => array('Gallery.Document'))
        );

        $childrens = $this->find(
            'all',
            array(
                'conditions' => array(
                    'main_id' => $archivo_id
                ),
                'fields' => array('Archivo.path', 'Archivo.id', 'Archivo.style')
            )
        );

        $childs = array();
        foreach ($childrens as $child) {
            $childs[$child['Archivo']['style']] = $child['Archivo']['link'];
        }

        return $childs;
    }

    /**
     * Get Archivo size
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
     * @param $Archivoname
     * @return string
     */
    public function generateFilePath($document_id = null, $filename = null)
    {
        if (!$document_id || !$filename) {
            return false;
        }

        $folder = WWW_ROOT . 'files' .DS .$_SESSION['empresa_'].DS. 'documentos' . DS . $document_id . DS;
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
