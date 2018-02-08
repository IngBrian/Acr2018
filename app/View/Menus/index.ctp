<!DOCTYPE html>
<html lang="it">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> </title>
</head>
<body>
    <!-- Navigation -->
 
    <div class="container">
		
		<div id="menu" style="background: green;">
			<label class="minimal-menu-button" for="mobile-nav">Menu</label>
			<input class="minimal-menu-button" type="checkbox" id="mobile-nav" name="mobile-nav">
			<div   class="minimal-menu clr-white">		
			<ul>
					 
					<li><a href="#"><span class="glyphicon glyphicon-home"></span> home</a></li>
							
						<li><a href="#"><span class="glyphicon glyphicon-screenshot"></span> Demandante</a>
							<ul>
								<li><a href="/ordenantes"><span class="glyphicon glyphicon-screenshot"></span> Ver </a></li>
								<li><a href="/ordenantes/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
								<li><a href="/ordenantes/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>
						
						<li><a href="#"><span class="glyphicon glyphicon-user"></span>Demandados</a>
							<ul>
								<li><a href="/clientes"><span class="glyphicon glyphicon-user"></span> Ver </a></li>
								<li><a href="/clientes/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
								<li><a href="/clientes/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>
						
						<li><a href="#"><span class="glyphicon glyphicon-cloud"></span> Gestor</a>
							<ul>
								<li><a href="/asesors"><span class="glyphicon glyphicon-cloud"></span> Ver </a></li>
								<li><a href="/asesors/add"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
								<li><a href="/asesors/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>
						
						<li><a href="#"><span class="glyphicon glyphicon-king"></span> Juez/Autoridad</a>
							<ul>
								<li><a href="/juzgados"><span class="glyphicon glyphicon-user"></span> Ver </a></li>
								<li><a href="/juzgados/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
								<li><a href="/juzgados/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>

						
						
						<li><a href="#"><span class="glyphicon glyphicon-random"></span>Pagaduria</a>
							<ul>
								<li><a href="/pagadurias"><span class="glyphicon glyphicon-random"></span> Ver </a></li>
								<li><a href="/pagadurias/add"><span class="glyphicon glyphicon-plus"></span> Agregar</a></li>
								<li><a href="/pagadurias/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>

						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Tipos de Proceso</a>
									<ul>
										<li><a href="/tprocesos"><span class="glyphicon glyphicon-user"></span> Ver </a></li>
										<li><a href="/tprocesos/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
										<li><a href="/tprocesos/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
									</ul>
						</li>					
						
						
	 
						
						<li><a href="#"><span class="glyphicon glyphicon-transfer"></span>Sub/Etapas</a>
							<ul>
								<li><a href="/subestados"><span class="glyphicon glyphicon-transfer"></span> Ver </a></li>
								<li><a href="/subestados/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
								<li><a href="/subestados/exce"><span class="glyphicon glyphicon-open-file"></span> Agregar  Excel</a></li>
							</ul>
						</li>	
						
						<li><a href="#"><span class="glyphicon glyphicon-briefcase"></span> Procesos</a>
							<ul>
								<li><a href="/prejuridicos"><span class="glyphicon glyphicon-briefcase"></span> Ver </a></li>
								<li><a href="/prejuridicos/add"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
							
							</ul>
						</li>	


						
						<li><a href="/reportes"><span class="glyphicon glyphicon-random"></span>  Reportes</a></li>	
						
										
						
						<li><a href="/usuarios"><span class="glyphicon glyphicon-cog"></span> Configuracion</a>
							<ul>
								<?php if($user['role']=='sadmin'): ?>	
								<li><a href="/mmtos/index"><span class="glyphicon glyphicon-cog"></span> Empresas</a>
									<ul>
										<li><a href="/usuarios"><span class="glyphicon glyphicon-user"></span> Empresas</a></li>
										<li><a href="/usuarios/add"><span class="glyphicon glyphicon-plus"></span> Nueva</a></li>
										<li><a href="/mmtos/importar"><span class="glyphicon glyphicon-user"></span> Importar datos</a></li>
									</ul>								
								</li>
							<?php endif; ?>
								
								<li><a href="/perfils"><span class="glyphicon glyphicon-user"></span> usuarios</a>
								
									<ul>
										<li><a href="/users/index"><span class="glyphicon glyphicon-plus"></span> lista usuarios </a></li>
										<li><a href="/users/addx"><span class="glyphicon glyphicon-plus"></span> Agregar </a></li>
									</ul>								
								
								</li>
								
							</ul>
						</li>	
									
					<li><a href="/users/logout"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
			</ul>
	 
			</div>
		</div>
	</div>

 
        <!-- /.container -->
 

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
       
        <hr>
 <!-- aqui colocar el cuerpo de la pagina -->
   <img src="/img/fondo.png" alt="ACR" > -->
   
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p><!-- aqui colocar el pie de la pagina --> </p>
                </div>
            </div>
        </footer>

    </div>



	<style>
	</style>
	<script>
 
	</script>
	
	
	
</body>
</html>