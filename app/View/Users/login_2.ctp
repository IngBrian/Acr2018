<body style="background: #ffffff; margin:0px;">
<!DOCTYPE html>
<html>
     <!--[if IE]>
      <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
    <![endif]-->
    <head>
        <!-- Meta especificado de la pagina
        --------------------------------------------   -->
        <title>Procesos con tecnología</title>
        <meta http-equiv="Content-Type" content="text/html; charset="/>
        <meta name="author" content="Alianza Protec"/>
        <meta name="copyright" content="Todos los derechos reservados"/>
        <meta name="keywords" content=""/>
        <meta name="description" content=" organización prestadora de servicios profesionales en el área jurídica.  "/>
        
        
        <!-- Importado de las funciones Js
        ---------------------------------------------  -->
		<script src="http://api.html5media.info/1.1.8/html5media.min.js"></script>
        <script type="text/javascript" src="JsWeb/jquery-1.4.4.min.js"></script>
        <script type="text/javascript" src="JsWeb/jquery-ui-1.8.7.custom.min.js"></script>
        <script type="text/javascript" src="JsWeb/global.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>

		<script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.8.2.min"></script>
		<script type="text/javascript" src="js/jquery-ui-1.9.0.custom.min" ></script>

    </head>
    <body>
        <header>
            <nav class="container">
                <?php echo $this->Form->create('User', array(
		'action' => 'login',
		'target' => 'mainMenu',
			'inputDefaults' => array(
				'div' => 'form-group',
				'label' => false,
				'wrapInput' => false
			)
		)); ?><ul class="sixteen columns columnscenter">
                    <!--<li><a href=""><img src="Css/images/logo1.png" height="45"/></a></li>-->
					
                    <li><a href="" id="home"><? echo $this->Html->image("../css_web/images/home.png"); ?></a></li>
                    <li style="padding:15px 5px 25px 10px"><a href="#nosotros" ><? echo  utf8_encode("ALIANZA PRO-TEC. Procesos con Tecnología"); ?></a></li>
                    <li style="padding:15px 5px 25px 10px"><a href="#servicios"  >Servicio</a></li>
                    <li style="padding:15px 5px 25px 10px"><a href="#contacto"  >Contacto</a></li>
                    <li style="padding:15px 30px 25px 10px"><a href="#" onClick="window.open('aprotec.pdf')">Documentos</a></li>
               		<li style="padding:15px 5px 25px 1px"><? echo $this->Form->input('username', array('label' => '' , 'placeholder' => 'Usuario','style' => 'width:80px' , 'value' =>$this->Session->read('NOMBRE') )) ?></li>
			   		<li style="padding:15px 5px 25px 1px"><? echo $this->Form->input('password', array('type' => 'password', 'label' => '','style' => 'width:80px' , 'placeholder' => 'Password' )) ?></li>
			   		<li style="padding:11px 5px 25px 1px;"><input name="btn" type="submit" class="btn-default" style="background-color:#FCFCFC" value="Login" ></li> 
			   
			   </ul><?php echo $this->Form->end(); ?>
            </nav>
        </header>
    </body>
</html>
</body>