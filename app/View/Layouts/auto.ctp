<?php
/**
 *
 * PHP 5
 *
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
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css');
		echo $this->Html->css('https://fonts.googleapis.com/css?family=Lato:100,300,400,700');
		echo $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css');
		echo $this->Html->css('footer');
		echo $this->Html->css('estilos');

		echo $this->Html->css('bootstrap.css');
		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js');
		echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js');
    	echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js');

		

		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
		echo $this->Html->script('http://harvesthq.github.io/chosen/chosen.jquery.js');


		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
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
    </style>

	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
		
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
      <a class="navbar-brand" href="#">Menu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        	<li class="active"><a href="#">Home<span class="sr-only">(current)</span></a></li>
        	

        	<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Demandante<span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Demandados<span class="caret"></span></a>
    
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
Juez/Autoridad <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pagaduria <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Tipo de Proceso <span class="caret"></span></a>
    
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
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Procesos<span class="caret"></span></a>
    
          <ul class="dropdown-menu">
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos" class="glyphicon glyphicon-th-list"> Inicio</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
             <li role="separator" class="divider"></li>
             <li><a href="/prejuridicos/searchadv" class="glyphicon glyphicon-upload"> Busqueda Avanzada</a></li>
          </ul>
        </li>


        <?php if($user['role']=='sadmin'): ?>

        <li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Configuraciones <span class="caret"></span></a>
    
          <ul class="dropdown-menu">
            
            <li role="separator" class="divider"></li>
            <li><a href="/afiliados" class="glyphicon glyphicon-th-list"> Inicio</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="/afiliados/add" class="glyphicon glyphicon-plus-sign"> Agregar</a></li>
            
            <li role="separator" class="divider"></li>
            <li><a href="/users" class="glyphicon glyphicon-user"> Usuarios</a>




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
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			

	<footer class="footer1">
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="footer-desc text-center">
                        
                        <p>
                            <a href="/" rel="home" title="Juridica Online"></a>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12">
                    <ul class="social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>

                <nav class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <div class="input-group input-group-md">
                      <input type="text" class="form-control" placeholder="Email Address">
                      <span class="input-group-addon">Subscribe</span>
                    </div>
                </nav>
            </div> <!--/.row--> 
        </div> <!--/.container--> 
    </div> <!--/.footer-->
    
    
</footer>

		</div>
	
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>

