<?php
Conexion:: abrirConexion();
$totalUsuarios=RepositorioUsuario:: obtenerNumeroUsuarios(Conexion::obtenerConexion());
Conexion::cerrarConexion();
?>
<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#pnavbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only" >Este boton despliega la barra de navegacion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>	
				</button>
				<a class="navbar-brand" href="#">JavaDevOne</a>
			</div>
			<div id="pnavbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav ">
					<li><a href="#"><span class="glyphicon glyphicon-list" aria-hidden="true"></span>Entradas</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>Favorito</a></li>
					<li><a href="#"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>Autores</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="#">
							<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							Usuarios registrados:
							<?php
							echo $totalUsuarios;
							?>
						</a>
					</li>
					<li><a href="#">
						<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
						Iniciar sesión</a></li>
					<li><a href="registro.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Registro</a></li>
				</ul>
			</div>
		</div>
	</nav>--