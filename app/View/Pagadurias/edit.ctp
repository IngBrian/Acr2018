<div class="container">

    
        <?=  $this->Form->create('Pagaduria', ['action' => 'edit','class'=>'form-horizontal']) ?>
		 <div class="col-sm-7">
             <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $pagaduria[0]['Pagaduria']['empresa'], 'class' => 'short-text')) ?>

		     <?= $this->Form->input('nombre', array('class' => 'form-control', 'value' => $pagaduria[0]['Pagaduria']['nombre'],'placeholder'=>'Nombre','label'=>false)) ?> 

             <?= $this->Form->input('id',   array('class' => 'form-control', 'type' => 'hidden', 'value' => $pagaduria[0]['Pagaduria']['id'])) ?> 
      
           <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?>
         </div>
</div>