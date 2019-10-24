<?php
class Conexion 
{
	private static $conexion;
	
	public static function abrirConexion()
	{
		if(!isset(self::$conexion))//preguntar si existe la conexion osea si se esta iniciada la operacion
		{
			try{
				//include intenra obtener el archivo y si no lo tiene lanza advertencia
				//require pide el archivo y si no la encuentre lanza error grave
				//*_once incluye solo una ves para que no se repite 

				include_once 'config.inc.php';// incluye el codigo de config.inc.php 
				//pdo mas lento que mysql phpero es mas adaptable en otras bases de datos
				self::$conexion = new PDO("mysql:host=$nombre_servidor; dbname=$nombre_base_datos",$nombre_usuario,$password);
				//solo para pdo para que nos muestre el error de la base de datos
				self::$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				//
				self::$conexion -> exec("SET CHARACTER SET utf8");
			} catch(PDOException $ex){
				print "ERROR" . $ex -> getMessage() . "<br>";
				die();
			}	
		}
	}

	public static function cerrarConexion()
	{
		if(isset(self::$conexion))
		{
			self::$conexion = null;
		}
	}

	public static function obtenerConexion()
	{
		return self::$conexion;
	}

}