<div class="container">

        <?=  $this->Form->create('Ordenante', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">

               <?= $this->Form->input('nit', array('class' => 'required', 'value' => $ordenante[0]['Ordenante']['nit'],'placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>  
    
               <?= $this->Form->input('nombre', array('value' => $ordenante[0]['Ordenante']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?>  
                 
               <?= $this->Form->input('direccion', array( 'value' => $ordenante[0]['Ordenante']['direccion'],'placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('telefonos', array( 'value' => $ordenante[0]['Ordenante']['telefonos'],'placeholder'=>'Telefonos','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('email', array('value' => $ordenante[0]['Ordenante']['email'],'placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $ordenante[0]['Ordenante']['id'])) ?>   
       
        <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
    </div> 
   
</div>
