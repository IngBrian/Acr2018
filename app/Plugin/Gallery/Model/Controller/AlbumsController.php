<?php

class AlbumsController extends GalleryAppController
{
    public $helpers = array('Form' => array('className' => 'Gallery.CakePHPFTPForm'));

    public $uses = array('Gallery.Album', 'Gallery.Picture','Gallery.LogAlbum','Gallery.LogPicture');



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
        $this->layout = 'showroom';

        $this->Album->id = $id;

        if (!$this->Album->exists()) {
            throw new NotFoundException(__d('gallery', 'Este Album no existe'));
        }

        $album = $this->Album->read(null);

        $this->set('title_for_layout', $album['Album']['title']);

        $this->set(compact('album','model_id'));
    }

    public function update()
    {
        if ($this->request->is('post')) {
            //
            if ($this->Album->save($this->request->data)) {
                /*var_dump($this->data);exit;
                $this->LogAlbum->save($this->request->data);*/
                echo __d('gallery', 'Tu configuracion ha sido guardada.');
            }
        }
        $this->render(false, false);
    }

    /**
     * Create or find the requested album
     * @param null $model
     * @param null $model_id
     */
    public function upload($model = null, $model_id = null)
    {
        
        ini_set("memory_limit", "10000M");
        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $album = $this->Album->findById($this->params['gallery_id']);
            $conteo= count ($album['Picture']);
            $logpicture = array();
            
         //   foreach ($album['Picture'] as $picture) { 
            $logpicture['LogPicture']['picture_id']=$album['Picture'][$conteo]['id'];
            $logpicture['LogPicture']['name']=$album['Picture'][$conteo]['name'];
            $logpicture['LogPicture']['path']=$album['Picture'][$conteo]['path'];
            $logpicture['LogPicture']['size']=$album['Picture'][$conteo]['size'];
            $logpicture['LogPicture']['album_id']=$album['Picture'][$conteo]['album_id'];
            $logpicture['LogPicture']['main_id']=$album['Picture'][$conteo]['main_id'];
            $logpicture['LogPicture']['caption']=$album['Picture'][$conteo]['caption'];
            $logpicture['LogPicture']['style']=$album['Picture'][$conteo]['style'];
            $logpicture['LogPicture']['order']=$album['Picture'][$conteo]['order'];
            $logpicture['LogPicture']['modified']=$album['Picture'][$conteo]['modified'];
            $logpicture['LogPicture']['created']=$album['Picture'][$conteo]['created'];
            
                 $this->LogPicture->save($logpicture);
            // var_dump($conteo);exit;

         //   }
           
        } else {
            # If the gallery doesnt exists, create a new one and redirect back to this page with the
            # gallery_id
            
            $album = $this->Album->init($model, $model_id);
            $logalbum = array();
            $logalbum['LogAlbum']['album_id']=$album['Album']['id'];
            $logalbum['LogAlbum']['title']=$album['Album']['title'];
            $logalbum['LogAlbum']['default_name']=$album['Album']['default_name'];
            $logalbum['LogAlbum']['path']=$album['Album']['path'];
            $logalbum['LogAlbum']['model']=$album['Album']['model'];
            $logalbum['LogAlbum']['model_id']=$album['Album']['model_id'];
            $logalbum['LogAlbum']['tags']=$album['Album']['tags'];
            $logalbum['LogAlbum']['status']=$album['Album']['status'];
            $logalbum['LogAlbum']['created']=$album['Album']['created'];
            $logalbum['LogAlbum']['modified']=$album['Album']['modified'];
           // var_dump($album);
            $this->LogAlbum->save($logalbum);
            $this->Album->save($album);
           /*
            var_dump($logalbum);exit;*/
            # Redirect back to this page with an album ID
            $this->redirect(
                array(
                    'action' => 'upload',
                    'gallery_id' => $album['Album']['id'],
                    'model_id'=>$model_id
                )
            );
        }

        $files = $album['Picture'];
        var_dump($files);exit;

        $this->set(compact('model', 'model_id', 'album', 'files'));
    }

     public function download($model = null, $model_id = null)
    {
        
        ini_set("memory_limit", "10000M");
            
        if (isset($this->params['gallery_id']) && !empty($this->params['gallery_id'])) {
            $album = $this->Album->findById($this->params['gallery_id']);
           
            $zip = new ZipArchive();
          
          /*
            echo "<PRE>";
            var_dump($album);
            echo "</PRE>";exit;
          */
            
            $filename = 'files/gallery/'.$album['Album']['id'].'/album.zip';
            //echo $filename;
             
            if($zip->open($filename,ZIPARCHIVE::CREATE)===true) {
                foreach($album["Picture"] as $doc){
                     
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
            $album= $this->Album->init($model, $model_id);
            

            # Redirect back to this page with an document ID
            $this->redirect(
                array(
                    'action' => 'view',
                    'gallery_id' => $album['Album']['id'],
                    'model_id'=>$model_id
                )
            );
           
        }
        

        $files = $album['Picture'];


        $this->set(compact('model', 'model_id', 'album', 'files'));
    }

    public function delete($id)
    {
        $this->Album->id = $id;

        $album = $this->Album->read(null);

        if (count($album['Picture'])) {
            foreach ($album['Picture'] as $pic) {
                # Original
                if ($pic['style'] = 'full') {
                    # Remove from database and all files
                    $this->Picture->delete($pic['id']);
                }
            }
        }

        if ($this->Album->delete($id)) {
            # Delete album folders
            $album_dir = WWW_ROOT . 'files' . DS . 'gallery' . DS . $id . DS;
            $this->Util->deleteDir($album_dir);

            $this->Session->setFlash(__d('gallery', 'Album Eliminado'));

            $this->redirect(array('controller' => 'gallery', 'action' => 'index', 'plugin' => 'gallery'));
        }
    }
}

?>
