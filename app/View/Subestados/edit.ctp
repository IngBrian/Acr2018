<div class="container">

   
        <?=  $this->Form->create('Subestado', ['action' => 'edit','class'=>'form-horizontal']) ?>
        
        <div class="col-sm-7">
             <?= $this->Form->input('nombre', array('class' => 'required', 'value' => $subestado[0]['Subestado']['nombre'],'placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 
             
             <?= $this->Form->input('id',   array('class' => 'required', 'type' => 'hidden', 'value' => $subestado[0]['Subestado']['id'])) ?> 
       
        	 <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
        </div>
   
</div>