<?php

class DocumentsController extends GalleryAppController
{
    public $helpers = array('Form' => array('className' => 'Gallery.CakePHPFTPForm'));
    
    public $uses = array('Gallery.Document', 'Gallery.Archivo','Gallery.LogArchivo','Gallery.LogDocument');

   

     public function isAuthorized($user) {
    // todos los visitantes ven el index
        if ($this->action === 'index') {
            return true;
        }

        if (in_array($this->action, array('upload','update','view'))) {
            if ($user['role']=='registrado') {
                return true;
            }
        }

        if (in_array($this->action, array('upload','update','view'))) {
            if ($user['role']=='director') {
                return true;
            }
        }

        if (in_array($this->action, array('upload','download','update','view','delete'))) {
            if ($user['role']=='administrator') {
                return true;
            }
        }


        if (in_array($this->action, array('upload','download','update','view','delete'))) {
        if ($user['role']=='sadmin') {
            return true;
            }
    }

    }
    
    
    public function beforeFilter() {
      parent::beforeFilter();
    } 


    public function add()
    {
    }
    

    public function view($id = null,$model_id=null)

    {

        //$this->layout = 'showroomd';

        $this->Document->id = $id;
        

        if (!$this->Document->exists()) {

            throw new NotFoundException(__d('gallery', 'Este Document no existe'));
        }

        $document = $this->Document->read(null);
        

        $this->set('title_for_layout', $document['Document']['title']);

        $this->set(compact('document','model_id'));
    }

    public function update()
    {
        if ($this->request->is('post')) {
            if ($this->Document->save($this->request->data)) {
                echo __d('gallery', 'Tu configuracion ha sido guardada.');
            }
        }
        $this->render(false, false);
    }

    /**
     * Create or find the requested document
     * @param null $model
     * @param null $model_id
     */
    public function upload($model = null, $model_id = null)
    {
        //ini_set("memory_limit", "100000M");
             
              

        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $document = $this->Document->findById($this->params['gallery_id']);
            $conteo= count ($document['Archivo']);
            //var_dump($document);exit;
            

            $logarchivo = array();
            foreach ($document['Archivo'] as $archivo) { 
            //echo "<PRE>";  var_dump($archivo); echo "</PRE>";
            $logarchivo['LogArchivo']['archivo_id']=$archivo['id'];
            $logarchivo['LogArchivo']['name']=$archivo['name'];
            $logarchivo['LogArchivo']['path']=$archivo['path'];
            $logarchivo['LogArchivo']['size']=$archivo['size'];
            $logarchivo['LogArchivo']['document_id']=$archivo['document_id'];
            $logarchivo['LogArchivo']['main_id']=$archivo['main_id'];
            $logarchivo['LogArchivo']['caption']=$archivo['caption'];
            $logarchivo['LogArchivo']['style']=$archivo['style'];
            $logarchivo['LogArchivo']['order']=$archivo['order'];
            $logarchivo['LogArchivo']['modified']=$archivo['modified'];
            $logarchivo['LogArchivo']['created']=$archivo['created'];
            /*$logarchivo['LogArchivo']['styles']['small']=$archivo['styles']['small'];
            $logarchivo['LogArchivo']['styles']['medium']=$archivo['styles']['medium'];
            $logarchivo['LogArchivo']['styles']['large']=$archivo['styles']['large'];*/
             //$logarchivo['LogArchivo']['link']=$archivo['link'];
           // var_dump($album['Picture']['0']);exit;
            
           
            }
            //var_dump($document);exit;
            

        } else {
            # If the gallery doesnt exists, create a new one and redirect back to this page with the
            # gallery_id
            $document = $this->Document->init($model, $model_id);
            $logarchivo = array();
            $logarchivo['LogDocument']['document_id']=$document['Document']['id'];
            $logarchivo['LogDocument']['title']=$document['Document']['title'];
            $logarchivo['LogDocument']['default_name']=$document['Document']['default_name'];
            $logarchivo['LogDocument']['path']=$document['Document']['path'];
            $logarchivo['LogDocument']['model']=$document['Document']['model'];
            $logarchivo['LogDocument']['model_id']=$document['Document']['model_id'];
            $logarchivo['LogDocument']['tags']=$document['Document']['tags'];
            $logarchivo['LogDocument']['status']=$document['Document']['status'];
            $logarchivo['LogDocument']['created']=$document['Document']['created'];
            $logarchivo['LogDocument']['modified']=$document['Document']['modified'];
           // var_dump($document);var_dump($logarchivo);exit;
            $this->LogDocument->save($logarchivo);
            

            # Redirect back to this page with an document ID
            $this->redirect(
                array(
                    'action' => 'upload',
                    'gallery_id' => $document['Document']['id'],
                    'model_id'=>$model_id
                )
            );
           
        }
        

        $files = $document['Archivo'];
       // echo "<PRE>"; var_dump($logarchivo); echo "</PRE>";exit;
         //$this->LogArchivo->save($logarchivo);
        $this->set(compact('model', 'model_id', 'document', 'files'));
    }

     public function download($model = null, $model_id = null)
    {
        
        ini_set("memory_limit", "10000M");
            
        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $document = $this->Document->findById($this->params['gallery_id']);
           
            $zip = new ZipArchive();
          /*
            echo "<PRE>";
            var_dump($document);
            echo "</PRE>";exit;
          */
            
            $filename = 'files/documentos/'.$document['Document']['id'].'/documentos.zip';
            //echo $filename;
             
            if($zip->open($filename,ZIPARCHIVE::CREATE)===true) {
                foreach($document["Archivo"] as $doc){
                     
                    $zip->addFile($doc["path"]);
                    

                }
                    
                   // $zip->addFile('b.txt');
                    $zip->close();
                    echo 'Creado '.$filename;
                    //$ruta = "descargas/pedidos.csv"; 
                    $ruta = '/'.$filename;
                    header("Content-Description: File Transfer");
                    header("Content-Type: application/force-download");
                    header("Content-Disposition: attachment; filename=$ruta");  
                    header("Location: ".$ruta);
                    exit;
        }
        else {
                echo 'Error creando '.$filename;exit;
        }

        } else {
            # If the gallery doesnt exists, create a new one and redirect back to this page with the
            # gallery_id
            $document = $this->Document->init($model, $model_id);
            

            # Redirect back to this page with an document ID
            $this->redirect(
                array(
                    'action' => 'view',
                    'gallery_id' => $document['Document']['id'],
                    'model_id'=>$model_id
                )
            );
           
        }
        

        $files = $document['Archivo'];


        $this->set(compact('model', 'model_id', 'document', 'files'));
    }


    public function delete($id)
    {
        $this->Document->id = $id;

        $document = $this->Document->read(null);

        if (count($document['Archivo'])) {
            foreach ($document['Archivo'] as $pic) {
                # Original
                if ($pic['style'] = 'full') {
                    # Remove from database and all files
                    $this->Archivo->delete($pic['id']);
                }
            }
        }

        if ($this->Document->delete($id)) {
            # Delete document folders
            $document_dir = WWW_ROOT . 'files' . DS . 'documentos' . DS . $id . DS;
            $this->Util->deleteDir($document_dir);

            $this->Session->setFlash(__d('gallery', 'Document Eliminado'));

            $this->redirect(array('controller' => 'galleryd', 'action' => 'index', 'plugin' => 'gallery'));
        }
    }
}

?>
