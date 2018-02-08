<div class="container">
        <?=  $this->Form->create('Cliente',['class'=>'form-horizontal']) ?>
        
          
               <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?> 
            <div class="col-sm-7">
			   <?= $this->Form->input('nit_cc', array('class' => 'required','placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?> 

               <?= $this->Form->input('nombre_completo', array('class' => 'required','placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('direccion',array('placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?>   
              
               <?= $this->Form->input('telefonos',array('placeholder'=>'Telefonos','label'=>false,'class'=>'form-control')) ?>   
               
               <?= $this->Form->input('email',array('placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?>   
        
        
        	    <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
        	</div> 
  
</div>
