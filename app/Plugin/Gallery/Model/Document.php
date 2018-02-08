
<?php    
App::uses('Folder', 'Utility');
App::uses('GalleryAppModel', 'Gallery.Model');

class Document extends GalleryAppModel
{
    public $name = 'Document';
    public $tablePrefix = 'gallery_';
    public $order = 'Document.id DESC';
    
    public $hasMany = array(
        'Archivo' => array(
            'className' => 'Gallery.Archivo',
            'conditions' => array('Archivo.main_id' => null),
            'order' => array('Archivo.order' => 'ASC')
        )
    );

    public $validate = array(
        'title' => array(
            array(
                'rule' => array('notEmpty'),
                'message' => 'A title is required.'
            )
        )
    );

    /**
     * Create a folder in webroot/files/gallery/{document_id}
     * for this folder after save it (only on create)
     * @param $created
     * @param array $options
     */
    public function afterSave($created, $options = array())
    {
        if ($created) {
            $this->createFolder($this->data['Document']['id']);
        }
    }


    /**
     * Get all published documents
     * @return mixed
     */
    public function published($fields = null)
    {
        return $this->find(
            'all',
            array(
                'conditions' => array(
                    'Document.status' => 'published'
                ),
                'recursive' => 2,
                'fields' => $fields
            )
        );
    }


    /**
     * Get all draft documents
     * @return array
     */
    public function draft($fields = null)
    {
        return $this->find(
            'all',
            array(
                'conditions' => array(
                    'Document.status' => 'draft'
                ),
                'recursive' => 2,
                'fields' => $fields
            )
        );
    }


    /**
     * Create an document record on database
     * @param $model
     * @param $model_id
     */
    public function init($model = null, $model_id = null)
    {
        # If there is a Model and ModelID on parameters, get or create a folder for it
        if ($model && $model_id) {
            # Searching for folder that belongs to this particular $model and $model_id
            if (!$document = $this->getAttachedDocument($model, $model_id)) {
              
                # If there is no Document , lets create one for it
                $document = $this->createInitDocument($model, $model_id);
            }
        } else {
            # If there is no model on parameters, lets create a generic folder
            $document = $this->createInitDocument(null, null);
            
        }

        return $document;
    }

    /**
     * Save document with a random name in database
     * @param null $model
     * @param null $model_id
     * @return mixed
     */
    private function createInitDocument($model = null, $model_id = null)
    {
        $this->save(
            array(
                'Document' => array(
                    'model' => $model,
                    'model_id' => $model_id,
                    'status' => 'draft',
                    'tags' => '',
                    'title' => $this->generateDocumentName($model, $model_id)
                )
            )
        );
        return $this->read(null);
    }

    /**
     * Get an attached document
     * @param null $model
     * @param null $model_id
     * @return mixed
     */
    public function getAttachedDocument($model = null, $model_id = null)
    {
        return $this->find(
            'first',
            array(
                'conditions' => array(
                    'Document.model' => $model,
                    'Document.model_id' => $model_id
                )
            )
        );
    }

    /**
     * Generate a random document name
     * @param null $model
     * @param null $model_id
     * @return string
     */
    private function generateDocumentName($model = null, $model_id = null)
    {
        $name = 'Document - ' . rand(111, 999);

        if ($model && $model_id) {
            $name = Inflector::humanize('Document ' . $model . ' - ' . $model_id);
        }

        return $name;
    }

    /**
     * Create an folder at webroot/files/gallery to store document pictures
     * @param $folder_name
     */
    private function createFolder($folder_name)
    {
        # Folder to store galleries folders
        $galleries_path = WWW_ROOT . 'files' . DS . 'documentos';

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
