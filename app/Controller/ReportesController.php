<?php
App::import('Model', 'TipoProceso');
App::import('Model', 'Juzgado');
class ReportesController extends AppController {
 	
 	var $uses = array('Proceso', 'Prejuridico', 'Ordenante', 'Asesor', 'Etapa', 'Pago', 'Juzgado','Cliente','Pagaduria','TProceso','Agenda', 'Subestado');
 	public $paginate =  array( 'limit' => 50, 'order' => array('fecha_inicio' => 'asc'), 'recursive' => 2);
 	
 	 public function beforeFilter() {
        parent::beforeFilter();   
        $prejuridico = array('etapa1' => 'Admision Demanda y/o Mandamiento', 'etapa2' => 'Medidas Cautelares', 'etapa3' => 'Concicilacion saneamiento Exepciones Fijacion Litigio', 'etapa4' => 'Tramite-y-Juzgamiento', 'etapa5' => 'Liquidacion-Avaluo-Remate');
         $this->set('prejuridico', $prejuridico);
    }
 	
    public function index() {
	    
	    if(!$this->Session->read('Auth.User.Permiso.id_mod5')){ noAutorizadoModulo(); exit; }
		$criteria_ordenante=array(); $criteria_asesor=array();
		if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
			$hilo='';$or='';
			if($this->Session->read('Auth.User.Permiso.id_demandante')>0){ $hilo.='Ordenante.id = '.$this->Session->read('Auth.User.Permiso.id_demandante');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $hilo.=$or.' Ordenante.id='.$this->Session->read('Auth.User.Permiso.id_demandante2');$or=' or '; }
        	if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $hilo.=$or.' Ordenante.id='.$this->Session->read('Auth.User.Permiso.id_demandante3');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $hilo.=$or.' Ordenante.id='.$this->Session->read('Auth.User.Permiso.id_demandante4');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $hilo.=$or.' Ordenante.id='.$this->Session->read('Auth.User.Permiso.id_demandante5');$or=' or '; }
			$criteria_ordenante = array($hilo);
        } //(1)
        //$criteria_ordenante = ($this->Session->read('Auth.User.Permiso.id_demandante') == 0 ? NULL : array('Ordenante.id' => $this->Session->read('Auth.User.Permiso.id_demandante')));
		if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		   if($hilo==""){$hilo.=" Ordenante.empresa=".$this->Session->read('Auth.User.empresa');}else{$hilo.=" and Ordenante.empresa=".$this->Session->read('Auth.User.empresa');}	
		}else{
			//if(!empty($hilo1)){ $hilo.=$and." (".$hilo1.")"; }
		}
		//echo $hilo;
		$criteria_ordenante = array($hilo);

        //$criteria_ordenante = ($this->Session->read('Auth.User.Permiso.id_demandante') == 0 ? NULL : array('Ordenante.id' => $this->Session->read('Auth.User.Permiso.id_demandante')));


        $ordenantes = $this->Ordenante->find('list', array('order' => 'Ordenante.nombre asc', 'conditions' => $criteria_ordenante));
        $this->set('ordenantes', $ordenantes);
        $subestados = $this->Subestado->find('list', array('order' => 'Subestado.nombre asc', 'conditions' => $criteria_subestado));
        $this->set('subestados', $subestados);
		//echo "as".$this->Session->read('Auth.User.Id_Asesor');
        if($this->Session->read('Auth.User.Id_Asesor')>0){
        	$criteria_asesor = ($this->Session->read('Auth.User.Id_Asesor') == 0 ? NULL : array('Asesor.id' => $this->Session->read('Auth.User.Id_Asesor')));
 				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			 $criteria_asesor.=" Asesor.empresa=".$this->Session->read('Auth.User.empresa'); 	
				}
       }else{
			//Editado el: 12/09/2014 (1)
			if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
				$hilo='';$or='';
				if($this->Session->read('Auth.User.Permiso.id_demandante')>0){ $hilo.='id_demandante = '.$this->Session->read('Auth.User.Permiso.id_demandante');$or=' or '; }
				if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante2');$or=' or '; }
				if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante3');$or=' or '; }
				if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante4');$or=' or '; }
				if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante5');$or=' or '; }
				$hilo= 'Asesor.id in(select Abogado from tb_procesos_a where '.$hilo.')';
				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			  $hilo.=" and Asesor.empresa=".$this->Session->read('Auth.User.empresa'); 
				}
				//echo $hilo;
				$criteria_asesor = array($hilo);
			}else{
				
 				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			 $criteria_asesor=" Asesor.empresa=".$this->Session->read('Auth.User.empresa'); 	
				}
			}
		}
		$asesores = $this->Asesor->find('list', array('order' => 'Asesor.nombre asc', 'conditions' => $criteria_asesor));
        $this->set('asesores', $asesores);
        
        $etapas = $this->Etapa->find('list', array('fields' => array('Etapa.id', 'Etapa.nombre_etapa'), 'order' => 'Etapa.nombre_etapa asc'));
        $etapas['99'] = '[No Iniciada]'; 
        $this->set('etapas', $etapas);

		//Editado el: 12/09/2014 (1)
		$criteria_juzg=array();
		if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
			$hilo='';$or='';
			if($this->Session->read('Auth.User.Permiso.id_demandante')>0){ $hilo.='id_demandante = '.$this->Session->read('Auth.User.Permiso.id_demandante');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante2');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante3');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante4');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante5');$or=' or '; }
			$hilo= 'Juzgado.id in(select id_juzgado from tb_procesos_a where '.$hilo.')';
			if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
				 $hilo.=" and Juzgado.empresa=".$this->Session->read('Auth.User.empresa'); 	
			}
			$criteria_juzg = array($hilo);
		} else{
 				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			 $criteria_juzg=" Juzgado.empresa=".$this->Session->read('Auth.User.empresa'); 	
				}
		}
		$juzgado = new Juzgado();          
		$juzgados = $juzgado->find('list', array('order' =>  'Juzgado.nombre_juzgado asc', 'conditions' => $criteria_juzg));
		$this->set('juzgados', $juzgados);

		//Editado el: 12/09/2014 (1)
		$criteria_pagadurias=array();
		if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
			$hilo='';$or='';
			if($this->Session->read('Auth.User.Permiso.id_demandante')>0){ $hilo.='id_demandante = '.$this->Session->read('Auth.User.Permiso.id_demandante');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante2');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante3');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante4');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante5');$or=' or '; }
			$hilo= 'Pagaduria.id in(select id_pagaduria from tb_procesos_a where '.$hilo.')';
			if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
				 $hilo.=" and Pagaduria.empresa=".$this->Session->read('Auth.User.empresa'); 	
			}
			$criteria_pagadurias = array($hilo);
		}  else{
 				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			 $criteria_pagadurias=" Pagaduria.empresa=".$this->Session->read('Auth.User.empresa'); 	
				}
		}
		
        $pagadurias = $this->Pagaduria->find('list', array('fields' => array('Pagaduria.id', 'Pagaduria.nombre'), 'order' => 'Pagaduria.nombre asc', 'conditions' => $criteria_pagadurias));
        $this->set('pagadurias', $pagadurias);

		//Editado el: 12/09/2014 (1)
		$criteria_tproc=array();
		if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
			$hilo='';$or='';
			if($this->Session->read('Auth.User.Permiso.id_demandante')>0){ $hilo.='id_demandante = '.$this->Session->read('Auth.User.Permiso.id_demandante');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante2');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante3');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante4');$or=' or '; }
			if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $hilo.=$or.' id_demandante='.$this->Session->read('Auth.User.Permiso.id_demandante5');$or=' or '; }
			$hilo= 'TipoProceso.id in(select id_tproceso from tb_procesos_a where '.$hilo.') ';
			if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
				 $hilo.=" and TipoProceso.empresa=".$this->Session->read('Auth.User.empresa'); 	
			}
			$criteria_tproc = array($hilo);
		} else{
 				if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		  			 $criteria_tproc=" TipoProceso.empresa=".$this->Session->read('Auth.User.empresa'); 	
				}
		}

		$tpro = new TipoProceso();          
		$tprocesos = $tpro->find('list',array('order' =>  'TipoProceso.nombre asc', 'conditions' => $criteria_tproc));
		$this->set('tprocesos', $tprocesos);
    }
 	
		public function export(){
			$conditions = $this->Session->read('conditions');   
			$procesos = $this->Proceso->find('all', array('conditions' => $conditions, 'recursive' => 2));
			$this->set('procesos', $procesos);
			$this->set('total', $this->Session->read('total'));
			$this->render('export','excel');
		}
 	 
        public function export_data(){
				$conditions = $this->Session->read('conditions');        
				$procesos = $this->Prejuridico->find('all', array('conditions' => $conditions));
				$procesos = DelPrRetorno($procesos);
				$total_pr=SaldoPrRetorno($procesos);
				$this->set('procesos', $procesos);
				$this->set('total', $total_pr);
				$this->render('export_data','excel');
		}
        
    public function export_pago(){
			$query = $this->Session->read('query');        
			$pagos = $this->Pago->query($query);
			$this->set('pagos', $pagos);
			$this->set('total', $this->Session->read('total'));
			$this->render('export_pago','excel_layout');
 	}

     public function pago(){
	     $criteria_fecha; $query;
		 $criterio='p';
	     $table = (empty($criterio) ? 'tbprocesos' : 'tb_procesos_a');
	     $field = (empty($criterio) ? 'id_ordenante' : 'id_demandante');
        $criteria_ordenante = ($this->Session->read('Auth.User.Permiso.id_demandante') == 0 ? NULL : array('Ordenante.id' => $this->Session->read('Auth.User.Permiso.id_demandante')));
	     //$criteria_ordenante = ($this->Session->read('Auth.User.Permiso.id_demandante') > 0 ? ' and '.$field.'= '.$this->Session->read('Auth.User.Permiso.id_demandante') : '');
	     //print_r($criteria_ordenante);
		 $criteria_asesor = '';//exit;
	     if($this->Session->read('Auth.User.Id_Asesor') > 0){
		    //$criteria_asesor = ' and Pago.asesor = '.$this->Session->read('Auth.User.Id_Asesor');
		    $criteria_asesor0 = ' and tb_procesos_a.Abogado= '.$this->Session->read('Auth.User.Id_Asesor');
	     } else if(!empty($this->data['Reporte']['asesor'])){
		    $criteria_asesor0 = ' and tb_procesos_a.Abogado= '.$this->data['Reporte']['asesor']; //' and Pago.asesor = '.$this->data['Reporte']['asesor'];		     
		    //$criteria_asesor0 = ' and tb_procesos_a.Abogado = '.$this->Session->read('Auth.User.Id_Asesor');
	     }
	     
	     $ordenante_criteria = (empty($criterio) ? ($this->data['Reporte']['ordenante'] > 0 ? ' and tbprocesos.id_ordenante = '.$this->data['Reporte']['ordenante']: '') : ($this->data['Reporte']['ordenante'] > 0 ? ' and tb_procesos_a.id_demandante = '.$this->data['Reporte']['ordenante']: ''));
	     
	     if(!empty($this->data['Reporte']['fecha_inicial']) && !empty($this->data['Reporte']['fecha_final'])){
		    $criteria_fecha = ' and Pago.fecha_pago between "'.$this->data['Reporte']['fecha_inicial'].'" and "'.$this->data['Reporte']['fecha_final'].'"'; 
	     }
		 if(!empty($criteria_ordenante['Ordenante.id'])){
			 $criteria = ' and Pago.idproceso In (select id From '.$table.' where 1=1 and id_demandante='.$criteria_ordenante['Ordenante.id'].$criteria_asesor0.')';
		 }
		 //print_r($criteria_ordenante);
	     //$criteria = ' and Pago.idproceso In (select id From '.$table.' where 1=1 '.$criteria_ordenante.$criteria_asesor.')';
	     //$pagos = $this->Pago->find('all', array('conditions' => $conditions));
	     $query = 'SELECT Pago.id, Pago.idproceso, Pago.fecha_pago, Pago.pago_capital, Pago.pago_intereses, Pago.otros_pagos, Pago.valor,
	     Pago.PathFile, Pago.observa, Pago.tipo, Pago.cancelado, Ordenante.nombre as ordenante, Cliente.nombre_completo as
	     cliente, Asesor.nombre as asesor 
	     FROM tbpagos AS Pago '.
	     ($criterio == 'p' ? ' Inner Join tb_procesos_a on tb_procesos_a.id = Pago.idproceso ' : ' Inner Join tbprocesos on tbprocesos.id = Pago.idproceso ').
	    'Inner Join tbasesor as Asesor on Asesor.id = '.($criterio == 'p' ?  'tb_procesos_a.Abogado ' : 'tbprocesos.Abogado').
	     ($criterio == 'p' ? 'Inner Join tbclientes as Cliente on Cliente.id = tb_procesos_a.id_deudor ' : ' Inner Join tbclientes as Cliente on Cliente.id = tbprocesos.id_cliente ').
	     ($criterio == 'p' ? 'Inner Join tbordenantes as Ordenante on Ordenante.id = tb_procesos_a.id_demandante ' : ' Inner Join tbordenantes as Ordenante on Ordenante.id = tbprocesos.id_ordenante ').
	     ' Where Pago.tipo = "'.$criterio.'" '.$criteria.$criteria_fecha.$criteria_asesor.$ordenante_criteria;

		if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
		   $query.=" and Pago.idproceso in(select id from tb_procesos_a where empresa=".$this->Session->read('Auth.User.empresa').")";		
		}

		 
        //  ' Where Pago.tipo = "p" '.$criteria_fecha.$criteria_asesor.$ordenante_criteria;
		//echo $query;
		 $this->Session->write('query', $query); 
	     $pagos = $this->Pago->query($query);
	     $this->set('pagos', $pagos);
     }
 	
 	public function search(){
	 	
	 	if(!empty($this->data)){
            $this->Session->write('search', $this->data);
        }else {
            $this->data = $this->Session->read('search');
        }
	 	
	 	$conditions = array();
	 	if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['Proceso.empresa']=$this->Session->read('Auth.User.empresa');
		}
		
	 	if(isset($this->data['Reportes']['deudor_criteria']) && !empty($this->data['Reportes']['deudor_criteria'])){
		 	$conditions['Cliente.nit_cc'] = $this->data['Reportes']['deudor_id'];	
	 	}else{
	 		$conditions = $this->prepareConditions($this->data);
	 	} 	

		$criteria_asesor = ($conditions['Proceso.Abogado'] > 0 ? 'and Abogado = '.$conditions['Proceso.Abogado'] : '');
		
		$this->Session->write('conditions', $conditions); 	
	 	$procesos = $this->paginate('Proceso', $conditions);
		$total = $this->Proceso->find('all', array('fields' => array('sum(saldo_insoluto) as total'), 'conditions' => $conditions, 'recursive' => 1));
		//echo $conditions;exit;
	 	$this->set('procesos', $procesos);
		$procesos = DelPrRetorno($procesos);
		$total_pr=SaldoPrRetorno($procesos);
	 	$this->set('total', $total_pr);
	 	$this->Session->write('total', $total_pr); 	
 	}
 	  
 	public function search_data(){
	 	
	 	if(!empty($this->data)){
            $this->Session->write('criteria', $this->data);// echo "1";
        }else {
            $this->data = $this->Session->read('criteria');// echo "2";
        }
		//$this->Session->write('criteria', $this->data);
		// $this->data = $this->Session->read('criteria');
		//print_r( $this->Session->read('criteria'));
	 	if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['Proceso.empresa']=$this->Session->read('Auth.User.empresa');
			//echo "ok";
		}
	 	if(isset($this->data['Reportes']['deudor_criteria'])){
		 	$conditions['Cliente.nit_cc'] = $this->data['Reportes']['deudor_id'];	
	 	}else{
	 		$conditions = $this->prepareData($this->data);
	 	} 	
		//print_r($conditions)."<br>";
		$this->Session->write('conditions', $conditions);
		//print_r($conditions); 	
	 	$procesos = $this->paginate('Prejuridico', $conditions);
		$procesos2 = $this->Prejuridico->find('all', array('conditions' => $conditions )); $procesos2 = DelPrRetorno($procesos2);
		$total_pr=SaldoPrRetorno($procesos2);
	 	$criteria_asesor = ($conditions['Prejuridico.Abogado'] > 0 ? 'and Abogado = '.$conditions['Prejuridico.Abogado'] : '');
	 	$total = $this->Prejuridico->find('all', array('fields' => array('sum(saldo_int) as total'), 'conditions' => $conditions, 'recursive' => 1));
	 	$this->set('procesos', $procesos);
	 	$this->set('total', $total_pr);
	 	$this->Session->write('total', $total_pr);
 	}
 	  
 	public function prepareConditions($data){
			$conditions = array();
			
			if(!empty($data['Reportes']['juzgado_criteria'])){
				$conditions['Proceso.id_juzgado'] = $data['Reportes']['juzgado'];	
				//echo "RETORNO";exit;
			}	
			if(!empty($data['Reportes']['mora_criteria'])){
		 		$values = explode('-', $data['Reportes']['mora_criteria']);
			 	$conditions['((datediff(Now(),Proceso.fecha_inicio))) between ? and ?'] = array($values[0], $values[1]);
		 	}
		 	
		 	if(!empty($data['Reportes']['juzgado_criteria'])){
			 	$conditions['Demanda.id_juzgado'] = $data['Reportes']['juzgado'];
		 	}
		 	
		 	if(!empty($data['Reportes']['etapa_criteria'])){
		 		$etapas = $this->Etapa->find('all', array('order' => 'Etapa.id asc'));
		 		if($data['Reportes']['etapa']=='99'){
			 		foreach($etapas as $etapa){
	        	   		array_push($conditions, 'Proceso.Id Not In (select id_proceso From '.$etapa['Etapa']['tabla'].')');
	        	   }
		 		} else {
			 		foreach($etapas as $etapa){
	        	   		if($etapa['Etapa']['id'] > $this->data['Reportes']['etapa']){
		        	   		array_push($conditions, 'Proceso.Id Not In (select id_proceso From '.$etapa['Etapa']['tabla'].')');
	        	   		} else if($etapa['Etapa']['id'] == $this->data['Reportes']['etapa']){
		        	   		array_push($conditions, 'Proceso.Id in (select id_proceso From '.$etapa['Etapa']['tabla'].')');
	        	   		}	
	        	   }	
		 		}
		 	}
		 	
		 	if(!empty($data['Reportes']['noetapa_criteria'])){
			 	foreach($etapas as $etapa){
		   		 	if($etapa['Etapa']['id'] == $this->data['Reportes']['noetapa']){ 
			   		 	array_push($conditions, 'Proceso.Id Not In (select id_proceso From '.$etapa['Etapa']['tabla'].')');	
		   		 	}
	        	  }	
		 	}
		 	
		 	if(!empty($data['Reportes']['ordenante_criteria'])){
			 	$conditions['Proceso.id_ordenante'] = $data['Reportes']['ordenante'];
		 	}

		 	
		 	if(!empty($data['Reportes']['fecha_criteria'])){
			 	$conditions['Proceso.fecha_inicio between ? and ?'] = array($data['Reportes']['fecha_inicial'], $data['Reportes']['fecha_final']);
		 	}
		 	
		 	if(!empty($data['Reportes']['asesor_criteria'])){
			 	$conditions['Proceso.Abogado'] = $data['Reportes']['asesor'];
		 	}
		 	
		 	if($this->Session->read('Auth.User.Permiso.id_demandante') > 0 ){
		 		$conditions['Proceso.id_ordenante'] = $this->Session->read('Auth.User.Permiso.id_demandante');
		 	}
		 	
		 	if($this->Session->read('Auth.User.Id_Asesor') > 0){
			 	$conditions['Proceso.Abogado'] = $this->Session->read('Auth.User.Id_Asesor');
		 	}
	 	
	 	return $conditions;
	}
  
 	public function prepareData($data){
	 	
	 	$conditions = array();
	 	
	 	if(!empty($data['Reportes']['mora_criteria'])){
		 		$values = explode('-', $data['Reportes']['mora_criteria']);
			 	$conditions['((datediff(Now(),Prejuridico.fecha_inicio))) between ? and ?'] = array($values[0], $values[1]);
		 	}
		 	
		 	if(!empty($data['Reportes']['etapa_criteria'])){
		  		array_push($conditions, 'Prejuridico.Id in (select id_proceso From '.$data['Reportes']['etapa'].')');
		 	}
		 	
		 	if(!empty($data['Reportes']['noetapa_criteria'])){
			 	array_push($conditions, 'Prejuridico.Id Not In (select id_proceso From '.$data['Reportes']['noetapa'].')');
		 	}
		 	
		 	if(!empty($data['Reportes']['juzgado_criteria'])){
			 	$conditions['Prejuridico.id_juzgado'] = $data['Reportes']['juzgado'];
		 	}

		 	if(!empty($data['Reportes']['pagadurias_criteria'])){
			 	$conditions['Prejuridico.id_pagaduria'] = $data['Reportes']['pagaduria'];
		 	}
		 	if(!empty($data['Reportes']['tproceso_criteria'])){
			 	$conditions['Prejuridico.id_tproceso'] = $data['Reportes']['tproceso'];
		 	}

		 	if(!empty($data['Reportes']['ordenante_criteria'])){
			 	$conditions['Prejuridico.id_demandante'] = $data['Reportes']['ordenante']; 
			}
		 	
		 	if(!empty($data['Reportes']['subestado_criteria'])){
			 	$conditions['Prejuridico.subestado_id'] = $data['Reportes']['subestado'];
			}
		 	
		 	if(!empty($data['Reportes']['fecha_criteria'])){
			 	$conditions['Prejuridico.fecha_inicio between ? and ?'] = array($data['Reportes']['fecha_inicial'], $data['Reportes']['fecha_final']);
		 	}
		 	
		 	if(!empty($data['Reportes']['asesor_criteria'])){
			 	$conditions['Prejuridico.Abogado'] = $data['Reportes']['asesor'];
		 	}
		 	
		 	
		 	if($this->Session->read('Auth.User.Id_Asesor') > 0){
			 	$conditions['Prejuridico.Abogado'] = $this->Session->read('Auth.User.Id_Asesor');
		 	}
	 	if($this->Session->read('Auth.User.id_tipo_usuario')!=1){
			$conditions['Prejuridico.empresa']=$this->Session->read('Auth.User.empresa');
			//echo "ok";
		}
		//Si varios
		
		if(($this->Session->read('Auth.User.Permiso.id_demandante')>0)||($this->Session->read('Auth.User.Permiso.id_demandante2')>0)||($this->Session->read('Auth.User.Permiso.id_demandante3')>0)||($this->Session->read('Auth.User.Permiso.id_demandante4')>0)||($this->Session->read('Auth.User.Permiso.id_demandante5')>0)){
					$dem1='';$dem2='';$dem3='';$dem4='';$dem5='';
					if($this->Session->read('Auth.User.Permiso.id_demandante')>0){  $dem1=NumStr($this->Session->read('Auth.User.Permiso.id_demandante'));  }
					if($this->Session->read('Auth.User.Permiso.id_demandante2')>0){ $dem2=NumStr($this->Session->read('Auth.User.Permiso.id_demandante2'));  }
					if($this->Session->read('Auth.User.Permiso.id_demandante3')>0){ $dem3=NumStr($this->Session->read('Auth.User.Permiso.id_demandante3'));  }
					if($this->Session->read('Auth.User.Permiso.id_demandante4')>0){ $dem4=NumStr($this->Session->read('Auth.User.Permiso.id_demandante4'));  }
					if($this->Session->read('Auth.User.Permiso.id_demandante5')>0){ $dem5=NumStr($this->Session->read('Auth.User.Permiso.id_demandante5'));  }
					$or =array();
					if(strlen($dem1)==0){$dem1=0; }
					if(strlen($dem2)==0){$dem2=0; }
					if(strlen($dem3)==0){$dem3=0; }
					if(strlen($dem4)==0){$dem4=0; }
					if(strlen($dem5)==0){$dem5=0; }
					
					//$or['OR']="OK";
					$or=array('OR' => array(
						array('Prejuridico.id_demandante' => $dem1),
						array('Prejuridico.id_demandante' => $dem2),
						array('Prejuridico.id_demandante' => $dem3),
						array('Prejuridico.id_demandante' => $dem4),
						array('Prejuridico.id_demandante' => $dem5)
					));
					$conditions=array_merge ($conditions, $or);
					//print_r($conditions); //exit;
		}


	 	//print_r($conditions);
	 	return $conditions;
	}
 	   
}

?>