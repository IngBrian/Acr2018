<script type="text/javascript">
    function calculateTotal(){
         
          var total = document.getElementById('pago_capital').value*1 + document.getElementById('pago_intereses').value*1 + document.getElementById('otros_pagos').value*1 ;
            document.getElementById('valor').value = total;
     }
 </script>

<div class="container">

    <h4> <?= __('Nueva Pago') ?></h4>

    
    
   <div class="col-sm-7">
    
     <?=  $this->Form->create('Pago',['class'=>'form-horizontal']) ?>
       
           <?= $this->Form->input('idproceso', 
           array('type' => 'hidden', 'value' => $proceso)) ?>
        
           <?= $this->Form->date('fecha_pago', array('label'=>false,'id'=>'fecha_pago','class'=>'form-control')) ?> 
          
           <?= $this->Form->input('pago_capital', 
            array('placeholder' => 'Pago Capital','label'=>false,'id'=>'pago_capital','onblur'=>"calculateTotal();",'class'=>'form-control')) ?>

           <?= $this->Form->input('pago_intereses',
            array('placeholder' => 'Pago intereses','label'=>false,'id'=>'pago_intereses','onblur'=>"calculateTotal();",'class'=>'form-control')) ?>
          
           <?= $this->Form->input('otros_pagos', array('placeholder' => 'otros Pagos','label'=>false,'id'=>'otros_pagos','onblur'=>"calculateTotal();",'class'=>'form-control')) ?>
           
           <?= $this->Form->input('valor',
           array('placeholder' => 'valor','label'=>false,'readonly'=>'readonly','id'=>'valor','class'=>'form-control')) ?>

           <?= $this->Form->input('PathFile', array('type' => 'hidden', 'value' => '')) ?>
           <?= $this->Form->input('tipo', array('type' => 'hidden', 'value' => 'p')) ?>
           <?= $this->Form->input('cancelado', array('type' => 'hidden', 'value' => 's')) ?>
           
           <?= $this->Form->input('observa',array('label'=>false,'placeholder'=>'observaciones','class'=>'form-control')) ?> 
        
        
           <?php echo $this->Form->end(['class'=>'btn btn-default','label'=>'Guardar']) ?> 
  </div>
</div>