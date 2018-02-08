<div class="container view-add-cliente"> 
    
    <h3> <? echo utf8_encode("Importación de Datos"); ?> </h3>   
    <div class="eight columns columnscenter">
        	<?=  $this->Form->create('Mmto', array('type' => 'file')); ?>
            <legend><?php echo utf8_encode('Ingrese archivo, extension: *.xlsx (siga la plantilla dada)'); ?></legend>
            <li> <?=  $this->Form->input('archivo', array('type' => 'file')); ?> </li>
        <?php echo $this->Form->end('Importar Datos'); ?>
    </div>
</div>