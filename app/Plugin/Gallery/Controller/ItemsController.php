<?php

class ItemsController extends GalleryAppController
{
    public $components = array('Gallery.Util');
    public $uses = array('Gallery.Bag', 'Gallery.Item','Gallery.LogItem','Gallery.LogArchivo');


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
        $this->Bag->id = $this->params['pass'][0];

        return new CakeResponse(
            array(
                'type' => 'application/json',
                'status' => 200,
                'body' => json_encode($this->Bag->read(null), true)
            )
        );

        $this->render(false, false);
    }

    public function upload()
    {
        $document_id = $_POST['album_id'];
		
        if ($_FILES) {
            $file = $_FILES['file'];
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
                $path = $this->Item->generateFilePath($document_id, $full_name);
                
					$main_id = $this->Item->uploadFile(
						$path,
						$document_id,
						$file['name'],
						$file['tmp_name'],
						true
					);

                $this->Item->id = $main_id;
                $this->logitem($main_id,'Subio');
				$rs=explode("/files/",$path);
                $rutaV="/files/".$rs[1];
                $this->Item->query("update gallery_items 
							          set path = REPLACE(path, '".$rs[0]."', '') 
							          where main_id =".$main_id);
                return new CakeResponse(
                    array(
                        'type' => 'application/json',
                        'status' => 200,
                        'body' => json_encode(array(
                            'file' => $this->Item->read(null)
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
	
	
	function logitem($id,$accion='subio'){
		$user=$this->Auth->user();
		$Item_ = $this->Item->findById($id);
		$item=$Item_['Item'];
		$logitem = array();
		$this->LogItem->create();
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
		$logitem['LogItem']['username']=$user['username'];
		$logitem['LogItem']['accion']=$accion;
		
		$this->LogItem->save($logitem);	
		
		
	}
	

    /**
     * Delete an image and all its versions from database
     * @param $id
     */
    public function delete($id)
    {
        # Delete the picture and all its versions
        
		$this->logitem($id,'Elimino');
		$this->Item->delete($id);

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
                $this->Item->read(null, $photo);
                $this->Item->set('order', $i);
                $this->Item->save();
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

            $this->Item->id = $archivo_id;

            $this->Item->saveField('caption', $caption);
			
			$this->logitem($id,'Edito');
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
