<?php
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/validadorRegistro.inc.php';
conexion::abrirConexion();

if (isset($_POST['enviar'])){
	$validador=new validadorRegistro($_POST['nombre'],$_POST['email'],$_POST['clave1'],$_POST['clave2']);

	if ($validador->registro_valido()) {
		$usuario =new Usuario('',$validador->obtener_nombre(),$	validador->obtener_email(),$validador->obtener_clave(),'','');
		$usuarioInsertado=RepositorioUsuario::insertarUsuario(conexion::obtener_conexion(),$usuario);
		if ($usuarioInsertado) {
			# code...
		}
	}else
	{
		echo "Registro INCorrecto";
	}
}

$titulo='Principal	';

include_once 'plantillas/documento-declaracion.inc.php';
include_once 'plantillas/navbar.inc.php'
?>
<div class="container">
	<div class="jumbotron">
	<h1> formulario de registro</h1>	
	</div>
</div>
<div class="container">
	<div class="row" >
		<div class="col-md-6 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Instrucciones
					</h3>
					<div class="panel-body">
						<br>
						<p>
							Para
						</p>
						<br>
						<a href="">Ya tienes cuenta? </a>
						<br>
						<a href="">Olvidaste tu contrasenia?</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 text-center">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						Introduce tus datos
					</h3>
					<div class="panel-body">
						<br>
						<form role="form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
							<?php 
								if(isset($_POST['enviar'])){
									include_once "plantillas/registro_validado.inc.php";
								}else{
									include_once "plantillas/registro_vacio.inc.php";
								}
							?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
include_once 'plantillas/documento-final.inc.php'
?>