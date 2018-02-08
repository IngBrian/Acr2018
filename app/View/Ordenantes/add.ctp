<div class="container">

        
        <?=  $this->Form->create('Ordenante',['class'=>'form-horizontal']) ?>
        
            <?= $this->Form->hidden('empresa', array('hiddenField' => 'true','value'=> $user['empresa'], 'class' => 'short-text')) ?>
        <div class="col-sm-7">

			<?= $this->Form->input('nit', array('class' => 'required','placeholder'=>'Identificacion','label'=>false,'class'=>'form-control')) ?>
			
            <?= $this->Form->input('nombre',array('placeholder'=>'Nombre','label'=>false,'class'=>'form-control')) ?> 
            
            <?= $this->Form->input('direccion',array('placeholder'=>'Direcion','label'=>false,'class'=>'form-control')) ?> 

            <?= $this->Form->input('telefonos',array('placeholder'=>'telefonos','label'=>false,'class'=>'form-control')) ?>  

            <?= $this->Form->input('email',array('placeholder'=>'Email','label'=>false,'class'=>'form-control')) ?> 
            
           <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
        </div> 
   
</div>
