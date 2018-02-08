<?php

class ArchivosController extends GalleryAppController
{
    public $components = array('Gallery.Util');
    public $uses = array('Gallery.Document', 'Gallery.Archivo','Gallery.LogArchivo');





    public function isAuthorized($user) {
    // todos los visitantes ven el index
    if ($this->action === 'index') {
        return true;
        
    }
    if (in_array($this->action, array('upload','caption','short'))) {
        if ($user['role']=='registrado') {
            return true;
            }
    }
    if (in_array($this->action, array('upload','caption','short'))) {
        if ($user['role']=='director') {
            return true;
            }
    }
    if (in_array($this->action, array('upload','caption','short','delete'))) {
        if ($user['role']=='administrator') {
            return true;
            }
    }
    if (in_array($this->action, array('upload','caption','short','delete'))) {
        if ($user['role']=='sadmin') {
            return true;
            }
    }
    }

    public function index()
    {
        $this->Document->id = $this->params['pass'][0];

        return new CakeResponse(
            array(
                'type' => 'application/json',
                'status' => 200,
                'body' => json_encode($this->Document->read(null), true)
            )
        );

        $this->render(false, false);
    }

    public function upload()
    {
       
        //$document_id = $_POST['document_id'];
        $document_id = $_POST['album_id'];

        

        ;

        if ($_FILES) {
            $file = $_FILES['file'];
            //var_dump($file);exit;

            try {
                # Check if the file have any errors
                $this->Util->checkFileErrors($file);

                # Get file extention
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

                # Validate if the file extention is allowed
                $this->Util->validateExtensions($ext);

                # Generate a random filename
                $filename = $this->Util->getToken();

                $full_name = $filename . "." . $ext;

                # Image Path
                $path = $this->Archivo->generateFilePath($document_id, $full_name);

                $main_id = $this->Archivo->uploadFile(
                    $path,
                    $document_id,
                    $file['name'],
                    $file['tmp_name'],
                    true
                );

               


                $this->Archivo->id = $main_id;
                $this->logarch($main_id,'Subio');
				/*$rs=explode("/files/",$path);
                $rutaV="/files/".$rs[1];
                $this->Archivo->query("update gallery_archivos 
							          set path = REPLACE(path, '".$rs[0]."', '') 
							          where main_id =".$main_id);*/
                return new CakeResponse(
                    array(
                        'type' => 'application/json',
                        'status' => 200,
                        'body' => json_encode(array(
                            'file' => $this->Archivo->read(null)
                        ), true)
                    )
                );

            } catch (ForbiddenException $e) {
                $response = $e->getMessage();
                return new CakeResponse(
                    array(
                        'status' => 401,
                        'body' => $response
                    )
                );
            }
        }

        $this->render(false, false);
    }
	
	function logarch($id,$accion='subio'){
		$user=$this->Auth->user();
		$Archivo_ = $this->Archivo->findById($id);
		$archivo=$Archivo_['Archivo'];
		$logarchivo = array();
		
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
		$logarchivo['LogArchivo']['username']=$user['username'];
		$logarchivo['LogArchivo']['accion']=$accion;
		$this->LogArchivo->save($logarchivo);	
		
		
	}
	
	

    /**
     * Delete an image and all its versions from database
     * @param $id
     */
    public function delete($id)
    {
        # Delete the picture and all its versions
        $this->logarch($id,'Elimino');
		
		$this->Archivo->delete($id);
        
        $this->render(false, false);
    }

    /**
     * Sort pictures from an album
     */
    public function sort()
    {
        if ($this->request->is('post')) {
            $order = explode(",", $_POST['order']);
            $i = 1;
            foreach ($order as $photo) {
                $this->Archivo->read(null, $photo);
                $this->Archivo->set('order', $i);
                $this->Archivo->save();
                $i++;
            }
        }

        $this->render(false, false);
    }

    public function caption()
    {

        if ($this->request->is('post')) {

            $archivo_id = $this->request->data['pk'];
            $caption = $this->request->data['value'];
            $this->logarch($archivo_id,'Edito');
            $this->Archivo->id = $archivo_id;

            $this->Archivo->saveField('caption', $caption);
        }

        $this->render(false, false);
    }

    public function pathUrl($file){

         $ext = pathinfo($file['name'], PATHINFO_EXTENSION);

         switch($ext){

         case "doc":
           return $picture_url="doc";
           break;
         case "docx":
            return $picture_url="docx";
            break; 
         case "xlsx":
            return $picture_url="xlsx";
            break; 
         case "xls":
            return $picture_url="xls";
            break; 
         case "pdf":
            return $picture_url="pdf";
            break; 
            
        default:
             return $picture_url="iError";
           break;
       }



    }

}

?>
