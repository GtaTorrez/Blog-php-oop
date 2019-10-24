<?php
class RepositorioUsuario{

	public static function obtener_todos($conexion){

		$usuarios = array();
		if(isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios";//se escribe la sentencia de sql
				$sentencia = $conexion -> prepare($sql); //prepare es una funcion que hace que caracteres especiales de sqpl no funcionen como tal o se puede poner \ antes de algun caracter especial
				$sentencia -> execute();//ejecuta la sentencia de sql , necesario al usas PDO
				$resultado = $sentencia ->fetchAll(); //fetchAll devuelve todos los resultados 

				if(count($resultado)){
					foreach ($resultado as $fila) {
						$usuarios[]=new Usuario(
							$fila['idUsuario'],$fila['nombre'],$fila['email'],$fila['password'],$fila['fechaRegistro'],$fila['activo']
							);
					}
				}else{
					print 'no hay usuarios';
				}
			}catch(PDOExceotion $ex){
				print "Error".$ex -> getMessage();
			}
		}
		return $usuarios;
	}

	public static function obtenerNumeroUsuarios($conexion){
		
		$totalUsuarios=null;

		if(isset($conexion)){
			try {
				$sql="SELECT COUNT(*) as total FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();
				
				$totalUsuarios=$resultado['total'];
				
			} catch (PDOException $ex) {
				print "error".$ex->getMessage();
			}
		}
		return $totalUsuarios;
	}

	public static function insertar_usuario(){
		$UsuarioInsertado=false;
		if (isset($conexion)) {
			try{
			$sql="insert into usuario (nombre,email,password,fechaRegistro,activo) values(:nombre,:email,:password,now(),0)";
			$sentencia=$conexion->prepare($sql);
			$sentencia->bindParam(':nombre',$usuario->getNombre(),PDO::PARAM_STR);
			$sentencia->bindParam(':email',$usuario->getEmail(),PDO::PARAM_STR);
			$sentencia->bindParam(':password',$usuario->getPassword(),PDO::PARAM_STR);
			$UsuarioInsertado=$sentencia->execute();
			}catch(PDOException $ex ){
				print("Error".$ex->getMessage());
			}
		}
		return 	$UsuarioInsertado;
	}
}
