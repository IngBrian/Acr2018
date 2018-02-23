
<div class="container">
    
        <?= $this->Form->create("Prejuridico",['class'=>'form-horizontal']) ?>
        <? //print_r($tprocesos) ; ?>
        
        <div class="col-sm-7">
		    
            <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $this->Session->read('Auth.User.empresa'), 'class' => 'short-text')) ?>	

            
    		<?= $this->Form->input('tproceso_id', array('options' => $tprocesos, 'type' => 'select', 'empty' => '<< Seleccione Tipo de Negocio >>', 'label' => false,  'class' => 'form-control','id'=>'tproceso')) ?>
    			
            
            <?= $this->Form->input('ordenante_id', array('options'=> $ordenantes, 'type' => 'select', 'empty' => '<< Seleccione Vendedor >>', 'label' => false, 'class' => 'form-control', 'id' => 'id_demandante')) ?>

            
            <?= $this->Form->input('cliente_id', array('options'=> $clientes, 'type' => 'select', 'empty' => '<< Seleccione  Comprador >>', 'label' => false, 'class' => 'form-control', 'id' => 'id_deudor')) ?>
                
                       
            <?= $this->Form->input('codeudor', array('options'=> $clientes, 'type' => 'select', 'empty' => '<< Seleccione Otros >>', 'label' => false, 'class' => 'form-control' , 'id' => 'codeudor')) ?>

             
                
            <?= $this->Form->hidden('QtyDMora', array('hiddenField' => 'true','value'=> 0, 'class' => 'short-text', 'placeholder' => 'Dias'))?>
    			   
            
            <?= $this->Form->input('juzgado_id', array('options' => $juzgados, 'type' => 'select', 'empty' => '<< Seleccione Forma de Pago >>', 'label' => false, 'id' => 'juzgado', 'class' => 'form-control', 'id' => 'juzgado')) ?>
               
            
            <?= $this->Form->input('subestado_id', array('options' => $subestados, 'type' => 'select','class'=>'form-control', 'empty' => '<< Seleccione Etapa Filtro >>', 'label' => false, 'id' => 'subestado')) ?>
            
            
     
            
            <?= $this->Form->input('ubicacion_id', array('options' => $ubicaciones, 'type' => 'select', 'empty' => '<< Seleccione Ubicacion >>', 'label' => false, 'class' => 'form-control', 'id' => 'ubicacion')) ?> 
             
            
            <?= $this->Form->input('Abogado', array('options' => $asesores, 'type' => 'select', 'empty' => '<< Seleccione Coordinador >>', 'label' => false,'class' => 'form-control','id'=>'asesoru')) ?> 
               
            
            <?= $this->Form->input('Abogado2', array('options' => $asesores, 'type' => 'select', 'empty' => '<< Seleccione Asesor actual >>', 'label' => false,'class' => 'form-control','id'=>'asesord')) ?>
               
            
            <?= $this->Form->input('pagaduria_id', array('options' => $pagadurias,'class'=>'form-control', 'type' => 'select', 'empty' => '<< Seleccione Tipo de Propiedad >>', 'label' => false,'id'=>'pagaduria')) ?>
			
    		<?= $this->Form->input('pendiente_id', array('options' => $pendientes,'class'=>'form-control', 'type' => 'select', 'empty' => '<< Seleccione Estado >>', 'label' => false,'id'=>'pendiente')) ?>
    			    	    
            
            <?= $this->Form->input('guia', array('label' =>false, 'class' => 'form-control', 'placeholder' => 'Baños'))?>
        
            <?= $this->Form->input('guia2', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Parqueaderos'))?>
        
            <?= $this->Form->input('ntitulo', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Alcobas'))?>

                  			  
            <?= $this->Form->input('pagare', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Estrato'))?>
            
            <?= $this->Form->input('saldo_int', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Cuantia'))?>

            <?= $this->Form->date('fecha_inicio', array('label' => false, 'class' => 'form-control', 'placeholder' => 'Seleccione Fecha', 'id' => 'datepicker'))?>
      			  
      			 
          <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
          </div>
       
</div>
    <script>
      $(function() {
        $('.chosen-select').chosen();
        $('.chosen-select-deselect').chosen({ allow_single_deselect: true });
      });
    </script>