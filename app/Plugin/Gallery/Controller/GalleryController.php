<?php

class GalleryController extends GalleryAppController
{
    public $uses = array('Gallery','Gallery.Album');

    public function beforeFilter()
    {
        parent::beforeFilter();
         $this->Auth->allow('index');
    }

    public function index()
    {
        $search_status = "published";
         $model_id=$this->request->params['id'];
        //echo $this->request->params['id'];

       
        $page_title = __d('gallery', 'Galerias Publicadas');

        if (isset($this->request->query['status']) && $this->request->query['status'] == 'draft') {
            $search_status = $this->request->query['status'];
            $page_title = __d('gallery', 'Drafts');
        }

       //$galleries = $this->Album->findAllByStatus($search_status);
        $galleries=$this->Album->find('all', array('conditions' => array('Album.model' => $model_id)));
        
        $this->set(compact('galleries', 'page_title', 'search_status','model_id'));
    }

    
}
