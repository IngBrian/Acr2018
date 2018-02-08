<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

        <!-- Meta especificado de la pagina
        --------------------------------------------   -->
        <title>Procesos con tecnología</title>
        
        <meta name="author" content="Alianza Protec"/>
        <meta name="copyright" content="Todos los derechos reservados"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=" organización prestadora de servicios profesionales en el área jurídica.  "/>
        
		<script type="text/javascript">
			$('a.smooth').live('click', function(e) {
			e.preventDefault();
			var $link = $(this);
			var anchor = $link.attr('href');
			$('html, body').stop().animate({
			scrollTop: $(anchor).offset().top
			}, 1000);
			});
		</script>	
<title> </title>
</head>

<body>

                <?php echo $this->Form->create('User', array(
				'action' => 'login',
				'target' => 'mainFrame',
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => false,
				'wrapInput' => false
			)
		)); ?><ul class="seventeen columns columnscenter">
                    <!--<li><a href=""><img src="Css/images/logo1.png" height="45"/></a></li>-->
					
                   
               		
			   		
			   		
					  
			
		
<div id="mainWrap">
	<div id="loggit">
		<h1>
			<img src="http://gvmultiservicios.com/wp-content/uploads/2015/07/logoss.png" width="180" height="auto" alt="Software Juridico" class="logo">
		
			  </h1>
		<h3>Acceso</h3>
		
		
			
					<div class="input-group">
						<span class="input-group-addon"><i class="fa fa-envelope fa-fw"></i></span>
						<li style="padding:15px 5px 25px 1px"><? echo $this->Form->input('username', array('label' => '' , 'placeholder' => 'Usuario','class' => 'form-control input-lg')) ?></li>
					</div>
			
					<div class="input-group">
					
						<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
						<li style="padding:15px 5px 25px 1px"><? echo $this->Form->input('password', array('type' => 'password', 'label' => '','class' => 'form-control input-lg' , 'placeholder' => 'Password' )) ?></li>
					</div>
				
			<label>
			<div class="form-group  ">
				<div class="col-sm-7">

			<div class="checkbox">

							<input type="checkbox" checked autocomplete="off"> Keep me logged inx
						</label>
						</div>
				</div>
				<div class="col-sm-5  ">
					<li ><input name="btn" class="btn btn-primary btn-lg" type="submit" value="Login" >&nbsp;&nbsp;&nbsp;<a href="#recordar" class='smooth'></a></li> 
				</div>
				</div>
			
			<div class="form-group  ">
			<div class="col-xs-12">


					<p class=""><a href=""><i class="fa fa-key fa-fw"></i>  Recordar la  password</a></p>
					<p class=""><a href=""><i class="fa fa-users    "></i> Registro Usuarios</a></p>

				
			</div>
			</div>
			

			 </ul><?php echo $this->Form->end(); ?>
		
		 <p>Design by Auyama Web Design </p>
		 </div></div>


<!-- HOLA Jonathan estas son las LIBRERIAS PUBLICAS  -->		

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
<link media="screen" rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,300italic">
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<style>
		#loggit{
			max-width:500px;
			margin: 50px auto 0px auto;
			padding:30px;
			border:solid 8px rgba(255,255,255,0.5);
			background-color:rgba(255,255,255,0.4);
		}
	
	body{
		background-image: url(http://todofondosdepaisajes.com/wp-content/uploads/images/d1/nubes-1.jpg);
		background-size:cover;
		background-repeat:no-repeat;
	}
	
	a {
		color: black;
	}
	
	</style>
</body>
</html>