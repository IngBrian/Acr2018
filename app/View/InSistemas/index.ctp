<div style="overflow:auto; width: 100%; height: 100px" src="<? echo $this->Html->url(array('controller' => 'Users', 'action' => 'login')) ?>" >
<? echo  $this->Html->url(array('controller' => 'Users', 'action' => 'login')) ?>
</div>
<?php echo $this->Html->url(array('controller' => 'Users', 'action' => 'login')); ?><title>Procesos con Tecnología</title>
</head>
<frameset rows="50,*" cols="*" framespacing="0" frameborder="no" border="0">
  <frame src="<?=$this->Html->url("menus/view_list")?>" name="topFrame" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
  <frame src="<?=$this->Html->url("menus/index")?>" name="mainMenu" id="mainMenu" title="mainMenu" />
</frameset>
<noframes> 
</noframes> 