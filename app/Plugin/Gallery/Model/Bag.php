<?php    
App::uses('Folder', 'Utility');
App::uses('GalleryAppModel', 'Gallery.Model');

class Bag extends GalleryAppModel
{
    public $name = 'Bag';
    public $tablePrefix = 'gallery_';
    public $order = 'Bag.id DESC';
    
    public $hasMany = array(
        'Item' => array(
            'className' => 'Gallery.Item',
            'conditions' => array('Item.main_id' => null),
            'order' => array('Item.order' => 'ASC')
        )
    );

    public $validate = array(
        'title' => array(
            array(
                'rule' => array('notBlank'),
                'message' => 'A title is required.'
            )
        )
    );

    /**
     * Create a folder in webroot/files/gallery/{bag_id}
     * for this folder after save it (only on create)
     * @param $created
     * @param array $options
     */
    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->createFolder($this->data['Bag']['id']);
        }
    }


    /**
     * Get all published bags
     * @return mixed
     */
    public function published($fields = null)
    {
        return $this->find(
            'all',
            array(
                'conditions' => array(
                    'Bag.status' => 'published'
                ),
                'recursive' => 2,
                'fields' => $fields
            )
        );
    }


    /**
     * Get all draft bags
     * @return array
     */
    public function draft($fields = null)
    {
        return $this->find(
            'all',
            array(
                'conditions' => array(
                    'Bag.status' => 'draft'
                ),
                'recursive' => 2,
                'fields' => $fields
            )
        );
    }


    /**
     * Create an bag record on database
     * @param $model
     * @param $model_id
     */
    public function init($model = null, $model_id = null)
    {
        # If there is a Model and ModelID on parameters, get or create a folder for it
        if ($model && $model_id) {
            # Searching for folder that belongs to this particular $model and $model_id
            if (!$bag = $this->getAttachedBag($model, $model_id)) {
              
                # If there is no bag , lets create one for it
                $bag = $this->createInitBag($model, $model_id);
            }
        } else {
            # If there is no model on parameters, lets create a generic folder
            $bag = $this->createInitBag(null, null);
            
        }

        //var_dump($bag);exit;
        return $bag;
    }

    /**
     * Save bag with a random name in database
     * @param null $model
     * @param null $model_id
     * @return mixed
     */
    private function createInitBag($model = null, $model_id = null)
    {
        $this->save(
            array(
                'Bag' => array(
                    'model' => $model,
                    'model_id' => $model_id,
                    'status' => 'draft',
                    'tags' => '',
                    'title' => $this->generateBagName($model, $model_id)
                )
            )
        );
        return $this->read(null);
    }

    /**
     * Get an attached bag
     * @param null $model
     * @param null $model_id
     * @return mixed
     */
    public function getAttachedBag($model = null, $model_id = null)
    {
        return $this->find(
            'first',
            array(
                'conditions' => array(
                    'Bag.model' => $model,
                    'Bag.model_id' => $model_id
                )
            )
        );
    }

    /**
     * Generate a random bag name
     * @param null $model
     * @param null $model_id
     * @return string
     */
    private function generateBagName($model = null, $model_id = null)
    {
        $name = 'Bag - ' . rand(111, 999);

        if ($model && $model_id) {
            $name = Inflector::humanize('Bag' . $model . ' - ' . $model_id);
        }

        return $name;
    }

    /**
     * Create an folder at webroot/files/gallery to store bag pictures
     * @param $folder_name
     */
    private function createFolder($folder_name)
    {
        # Folder to store galleries folders
        $galleries_path = WWW_ROOT . 'files' . DS . 'multimedia';

        # Gallery folder
        $folder_path = $galleries_path . DS . $folder_name;

        # Check if webroot/files and webroot/files/gallery folder are created
        if (!is_dir($galleries_path)) {
            if (!is_dir(WWW_ROOT . 'files')) {
                # Create webroot/files folder if dont exists
                new Folder(WWW_ROOT . 'files', true, 0755);
            }
            # Create webroot/files/gallery folder if dont exists
            new Folder($galleries_path, true, 0755);
        }
        if (!is_dir($folder_path)) {
            # Create gallery folder if dont exists
            new Folder($folder_path, true, 0755);
        }
    }
}

?>
