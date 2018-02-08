<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */


$cakeDescription = __d('cake_dev', 'ARC');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');
		echo $this->Html->css('https://fonts.googleapis.com/css?family=Lato:100,300,400,700');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css');
		echo $this->Html->css('footer');
		echo $this->Html->css('estilos');

		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js');
		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js');
        echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->css('global');
		$url=parse_url(Router::url( $this->here, true ));
		$rs__=explode('/',$url['path']);
	  ?>
	   
       <style>
        #<?=strtolower($rs__[1])?> {
		  background-color: #FFFFFF;
		  color:#000000;	 
		 }
       </style>
   
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body >
	
  <!--  Inicio --> 
  <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
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
        	<
        	<?php 
			
			if(empty($username__)){ ?>

        	<li class="dropdown">
          		<a href="#" class="dropdown-toggle" id="ordenantes" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Otorgante I<span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" id="clientes" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Otorgante II<span class="caret"></span></a>
    
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
              <a href="#" class="dropdown-toggle"  id="asesors" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Gestor<span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" id="juzgados" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
Entidad <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle"  id="pagadurias" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Relacionado <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" id="tprocesos" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo de Acto <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle"  id="subestados" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Etapas <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle"  id="localidades" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ubicacion<span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle"  id="pendientes" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Notario (E)<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/pendientes/exce" class="glyphicon glyphicon-upload"> Masivo</a></li>
          </ul>
        </li>
       <?php }?>
        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" id="prejuridicos" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/searchadv" class="glyphicon glyphicon-upload"> Busqueda Avanzada</a></li>
          </ul>
        </li>


        <?php if($user['role']=='sadmin' or $user['role']=='administrator'): ?>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle"  id="afiliados" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="https://s-media-cache-ak0.pinimg.com/originals/ef/b1/bb/efb1bb96636956a6eef51b52aaf799a7.png" height="25px" width="25px"/> <span class="caret"></span></a> 
    
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

        <li style="color:#FFF"><a href="/users/logout" class="glyphicon glyphicon-off"></a></li>


      </ul>
      
      

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

			<!-- End Menu -->
	
		<div id="content">

			<?php echo $this->Flash->render(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			

	

		</div>
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
