<?php

class BagsController extends GalleryAppController
{
    public $helpers = array('Form' => array('className' => 'Gallery.CakePHPFTPForm'));
    
    public $uses = array('Gallery.Bag', 'Gallery.Item','Gallery.LogBag','Gallery.LogItem');

   
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

        //$this->layout = 'showroomdv';

        $this->Bag->id = $id;
        

        if (!$this->Bag->exists()) {

            throw new NotFoundException(__d('gallery', 'Este Document no existe'));
        }

        $bag = $this->Bag->read(null);
        

        $this->set('title_for_layout', $bag['Bag']['title']);

        $this->set(compact('bag','model_id'));
    }

    public function update()
    {
        if ($this->request->is('post')) {
           if ($this->Bag->save($this->request->data)) {
                echo __d('gallery', 'Tu configuracion ha sido guardada.');
            }
        }
        $this->render(false, false);
    }

    /**document
     * Create or find the requested 
     * @param null $model
     * @param null $model_id
     */
    public function upload($model = null, $model_id = null)
    {
        // ini_set("memory_limit", "100000M");
        /*
        echo 'post_max_size = ' . ini_get('post_max_size') . "\n";
        echo ' memory_limit = ' . ini_get('memory_limit') . "\n";
        echo 'upload_max_filesize = ' . ini_get('upload_max_filesize') . "\n";
        echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
        echo 'max_input_time = ' . ini_get('max_input_time') . "\n";
        exit;
        */
        
             
        
        //var_dump($this->params['gallery_id']);exit;
        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $bag = $this->Bag->findById($this->params['gallery_id']);
            $conteo= count ($bag['Item']);
            //var_dump($conteo);exit;
            $logitem = array();
            foreach ($bag['Item'] as $item) { 
            $logitem['LogItem']['item_id']=$item['id'];
            $logitem['LogItem']['name']=$item['name'];
            $logitem['LogItem']['path']=$item['path'];
            $logitem['LogItem']['size']=$item['size'];
            $logitem['LogItem']['bag_id']=$item['bag_id'];
            $logitem['LogItem']['main_id']=$item['main_id'];
            $logitem['LogItem']['caption']=$item['caption'];
            $logitem['LogItem']['style']=$item['style'];
            $logitem['LogItem']['order']=$item['order'];
            $logitem['LogItem']['modified']=$item['modified'];
            $logitem['LogItem']['created']=$item['created'];
            /* $logitem['LogItems']['styles']['small']=$item['styles']['small'];
            $logitem['LogItems']['styles']['medium']=$item['styles']['medium'];
            $logitem['LogItems']['styles']['large']=$item['styles']['large'];*/
            //$logitem['LogItem']['link']=$item['link'];
            //var_dump($logitem);exit;
            // var_dump($bag['Item']);exit;
            
            }
        } else {
            # If the gallery doesnt exists, create a new one and redirect back to this page with the
            # gallery_id
            $bag = $this->Bag->init($model, $model_id);
            $logbag = array();
            $logbag['LogBag']['bag_id']=$bag['Bag']['id'];
            $logbag['LogBag']['title']=$bag['Bag']['title'];
            $logbag['LogBag']['default_name']=$bag['Bag']['default_name'];
            $logbag['LogBag']['path']=$bag['Bag']['path'];
            $logbag['LogBag']['model']=$bag['Bag']['model'];
            $logbag['LogBag']['model_id']=$bag['Bag']['model_id'];
            $logbag['LogBag']['tags']=$bag['Bag']['tags'];
            $logbag['LogBag']['status']=$bag['Bag']['status'];
            $logbag['LogBag']['created']=$bag['Bag']['created'];
            $logbag['LogBag']['modified']=$bag['Bag']['modified'];
           // var_dump($bag);var_dump($logbag);exit;
             $this->LogBag->save($logbag);
            # Redirect back to this page with an document ID
            $this->redirect(
                array(
                    'action' => 'upload',
                    'gallery_id' => $bag['Bag']['id'],
                    'model_id'=>$model_id
                )
            );
           
        }
        
        $files = $bag['Item'];
       // $this->LogItem->save($logitem);
        $this->set(compact('model', 'model_id', 'bag', 'files'));
    }

     public function download($model = null, $model_id = null)
    {
        
        ini_set("memory_limit", "10000M");
            
        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $bag = $this->Bag->findById($this->params['gallery_id']);
           
            $zip = new ZipArchive();
              /*
                echo "<PRE>";
                var_dump($document);
                echo "</PRE>";exit;
              */
            
            $filename = 'files/multimedia/'.$bag['Bag']['id'].'/multimedia.zip';
            //echo $filename;
             
            if($zip->open($filename,ZIPARCHIVE::CREATE)===true) {
                foreach($bag["Item"] as $doc){
                     
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
            $bag = $this->Bag->init($model, $model_id);
            

            # Redirect back to this page with an document ID
            $this->redirect(
                array(
                    'action' => 'view',
                    'gallery_id' => $bag['Bag']['id'],
                    'model_id'=>$model_id
                )
            );
           
        }
        

        $files = $bag['Item'];


        $this->set(compact('model', 'model_id', 'bag', 'files'));
    }


    public function delete($id)
    {
        $this->Bag->id = $id;

        $bag = $this->Bag->read(null);

        if (count($bag['Item'])) {
            foreach ($bag['Item'] as $pic) {
                # Original
                if ($pic['style'] = 'full') {
                    # Remove from database and all files
                    $this->Item->delete($pic['id']);
                }
            }
        }

        if ($this->Bag->delete($id)) {
            # Delete document folders
            $bag_dir = WWW_ROOT . 'files' . DS . 'multimedia' . DS . $id . DS;
            $this->Util->deleteDir($bag_dir);

            $this->Session->setFlash(__d('gallery', 'Documento Eliminado'));

            $this->redirect(array('controller' => 'gallerydv', 'action' => 'index', 'plugin' => 'gallery'));
        }
    }
}

?>
