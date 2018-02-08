<?php

class MunicipiosController extends AppController {
    
    public function getByDepartament() {   
        $this->autoRender = FALSE;
		$dpto_id = $this->request->data['departamento_id_'];
		$municipios = $this->Municipio->find('list', array(
			'conditions' => array('Municipio.id_dpto' => $dpto_id),
			'recursive' => -1
                ));
 
		print '{"status" : 1, "data" :'.json_encode($municipios).'}';
	}
    
}

?>
