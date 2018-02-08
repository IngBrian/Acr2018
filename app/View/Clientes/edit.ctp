<div class="container">
        <?=  $this->Form->create('Cliente', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        
               <?= $this->Form->input('nit_cc', array('class' => 'required', 'value' => $cliente[0]['Cliente']['nit_cc'],'placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>  

               <?= $this->Form->input('nombre_completo', array('class' => 'required', 'value' => $cliente[0]['Cliente']['nombre_completo'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('direccion', array('value' => $cliente[0]['Cliente']['direccion'],'placeholder'=>'Direccion','label'=>false,'class'=>'form-control')) ?>   
    
               <?= $this->Form->input('telefonos', array('value' => $cliente[0]['Cliente']['telefonos'],'placeholder'=>'Telefonos','label'=>false,'class'=>'form-control')) ?>   

               <?= $this->Form->input('email', array('value' => $cliente[0]['Cliente']['email'],'placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?>  

                <?= $this->Form->input('id', array('type' => 'hidden', 'value' => $cliente[0]['Cliente']['id'])); ?>   
        
        
              <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> </div> 
</div>
 
    <script>
        
            $(document).on('ready', function(){
             $('#departamento').trigger('select'); 
            });

    </script> 
   
    
    
</div>
