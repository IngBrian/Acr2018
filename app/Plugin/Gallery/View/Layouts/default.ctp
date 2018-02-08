<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title><?php echo $title_for_layout; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <?php echo $this->Html->css(array(
        '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css',
        '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css',
        '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css',
        '//cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.3.0.2/css/swipebox.min.css',
        'Gallery.bootstrap-editable',
        'Gallery.sweetalert')) ?>


    <?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
        <?php echo $this->Html->css(
            array(
                'Gallery.themes/' . Configure::read('GalleryOptions.App.theme') . '.min'
            )
        ); ?>
    <?php } ?>

    <?php echo $this->Html->script('Gallery.lib/modernizr') ?>
    <?php echo $this->fetch('css'); ?>
    
    <?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');
		echo $this->Html->css('https://fonts.googleapis.com/css?family=Lato:100,300,400,700');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css');
		echo $this->Html->css('global');
		
		echo $this->fetch('meta');
		
		echo $this->fetch('script');
		$url=parse_url(Router::url( $this->here, true ));
		$rs__=explode('/',$url['path']);
		?>
	    <style>
         body {
	  font-family: 'Lato';
	 }
	
	.fa-btn {
	  margin-right: 6px;
	}
	a{
	  font-size: 17px;
	}
	body  { 
		background-color: transparent;
		/* background-image: url("/img/juridicanube.jpg");*/
		background-repeat: no-repeat;
		background-position: center top;
		background-attachment: fixed;
		backgroudn-size: contain;
		background-color: #FFFFFF !important;
		font-family: Arial, Helvetica, sans-serif;
		text-transform: uppercase;
		font-weight: bold !important;
	}
	h5{
		text-transform: uppercase;
		font-weight: bold !important;	
	
	}
	.pagination-result.columnscenter {
	     margin-left: -15px !important;
	}
	/*Ahora podemos cambiar solo la propiedad background-image */
/*
	@media (min-width: 480px) {
	body {
	   background-image: url("/img/juridicanube.jpg");
	}
	}
	@media (min-width: 768px) {
	body {
	   background-image: url("/img/juridicanube.jpg");
	}
	}
	@media (min-width: 1200px) {
	body {
	   background-image: url("/img/juridicanube.jpg");
	}
	}
  */
	 .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand 
	 {
	   margin-left: 0px;
	 }      
	.table-condensed > tbody > tr > td, .table-condensed > tbody > tr > th, .table-condensed > tfoot > tr > td, .table-condensed > tfoot > tr > th, .table-condensed > thead > tr > td, .table-condensed > thead > tr > th {
		padding: 5px;
		font-weight: bold;
	}
	a {
		font-size: 12px;
		text-transform: uppercase;
		font-weight: bold;
	} 
		#<?=strtolower($rs__[1])?> {
		  background-color: #FFFFFF;
		  color:#000000;	 
		 }
    </style>
</head>

<body class="<?php echo $this->params->params['controller'] . '_' . $this->params->params['action'] ?>"
      data-base-url="<?php echo $this->params->webroot ?>"
      data-plugin-base-url="<?php echo $this->Html->url(
          array('plugin' => 'gallery', 'controller' => 'gallery', 'action' => 'index')
      ) ?>">

<div id="canvasup"></div>

<?php echo $this->Html->script(array(
    '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js',
    '//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js',
    '//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js',
    '//cdnjs.cloudflare.com/ajax/libs/jquery.swipebox/1.3.0.2/js/jquery.swipebox.min.js',
    'Gallery.lib/bootstrap-editable.min',
    'Gallery.lib/mustache.min',
    'Gallery.lib/sweetalert.min'
)) ?>

<?php echo $this->fetch('js'); ?>

<!--  Inicio --> 
   <!--  Inicio --> 
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      <?php 
			
			if(empty($username__)){ ?>
        	<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Vendedor<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
            <li role="separator" class="divider"></li>
            <li><a href="/ordenantes" class="glyphicon glyphicon-th-list"> Inicio</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/ordenantes/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
            <li role="separator" class="divider"></li>
            <li ><a href="/ordenantes/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Comprador<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/clientes" class="glyphicon glyphicon-th-list" > Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/clientes/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li ><a href="/clientes/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
            
          </ul>
        </li>

        <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestor<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/asesors" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/asesors/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/asesors/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
            
          </ul>
        </li>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
Forma de Pago <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/juzgados" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/juzgados/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/juzgados/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo de Propiedad <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/pagadurias" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pagadurias/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pagadurias/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>

        </li>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo de Negocio <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/tprocesos" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/tprocesos/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/tprocesos/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>

        </li>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etapas <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/subestados" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/subestados/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/subestados/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ubicacion <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/localidades" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/localidades/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/localidades/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>
         <li class="dropdown">
          		<a href="#" class="dropdown-toggle"  id="pendientes" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Estado<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>
        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="gallery"  role="button" aria-haspopup="true" aria-expanded="false">Procesos<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/searchadv" class="glyphicon glyphicon-upload"> Busqueda Avanzada</a></li>
          </ul>
        </li>
       <?php }else{?>
		    <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" id="gallery"  role="button" aria-haspopup="true" aria-expanded="false">Procesos<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/searchadv" class="glyphicon glyphicon-upload"> Busqueda Avanzada</a></li>
          </ul>
        </li>
	  <?php }?>
       
       
       

        <?php if($user['role']=='sadmin' or $user['role']=='administrator'): ?>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraciones <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
            
            <li role="separator" class="divider"></li>
            <li><a href="/afiliados" class="glyphicon glyphicon-th-list"> Inicio</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/afiliados/add" class="glyphicon glyphicon-plus-sign"> Afiliado</a></li>
            
            <li role="separator" class="divider"></li>
            




            </li>
          </ul>
        </li>
        <?php endif; ?>

        <li><a href="/users/logout" class="glyphicon glyphicon-off"></a></li>


      </ul>
      
      

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

			<!-- End Menu -->
<style>
.navbar.navbar-default {
	background: #000000 none repeat scroll 0 0 !important ;
}	
.btn-info:hover {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important;
}
.btn-info {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important;
}
	
.btn-primary:hover {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important
}
.btn-success:hover {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important;
}
.btn-success {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important;
}
.btn-primary {
    color: #fff;
    background-color: #000000 !important;
    border-color: #000000 !important
}	
</style>

<?php if (Configure::read('GalleryOptions.App.interfaced')) { ?>
    <div class="container">
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand"
                       href="<?php echo $this->Html->url(
                           array('controller' => 'gallery', 'action' => 'index', 'id' => "".$model_id."")
                       ) ?>">Galeria de Imagenes</a>
                         
                        <a class="navbar-brand"
                       href="<?php echo $this->Html->url(
                           array('controller' => 'galleryd', 'action' => 'index', 'id' => "".$model_id."")
                       ) ?>">Galeria de Documentos</a>
                       
                    <a class="navbar-brand"
                       href="<?php echo $this->Html->url(
                           array('controller' => 'gallerydv', 'action' => 'index', 'id' => "".$model_id."")
                       ) ?>">Galeria de Videos</a>
                       
                        
                        </div>
                
                
                <div class="navbar-collapse collapse">
                    
<div style="float: right"><a class="navbar-brand" 
									  href="javascript:void(0)" onclick="history.go(0)"><strong></strong>Refrescar galeria</strong> </a></div>
                 
                </div>
            </div>
        </div>
        
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->fetch('content'); ?>
    </div>
<?php } else { ?>
    <?php echo $this->Session->flash(); ?>
    <?php echo $this->fetch('content'); ?>
<?php } ?>

</body>
</html>
