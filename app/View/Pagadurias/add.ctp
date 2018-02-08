<div class="container">

   
        <?=  $this->Form->create('Pagaduria',['class'=>'form-horizontal']) ?>
       <div class="col-sm-7">
            <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?>

			<?= $this->Form->input('nombre', array('class' => 'form-control','placeholder'=>'Nombre','label'=>false)) ?>

        
             <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
   		</div>
</div>