<?php 
class ValidadorRegistro{

	private $aviso_inicio;
	private $aviso_cierre;
 
	private $nombre;
	private $email;
	private $clave;
//ERRORES POR CADA CAMPO EN EL FORMULARIO 
	private $errornombre;
	private $erroremail;
	private $errorclave1;
	private $errorclave2;

//constructor del metodo 
	public function __construct($nombre,$email,$clave1,$clave2){
	$this-> aviso_inicio="<br> <div class='alert alert-danger' role='alert'>";
	$this-> aviso_cierre="</div>";

	$this -> nombre="";
	$this -> email ="";	
	$this-> clave="";	
	$this->errornombre = $this -> validar_nombre($nombre);
	$this->erroremail = $this -> validar_email($email);
	$this->errorclave1 = $this -> validar_clave1($clave1);
	$this->errorclave2 = $this -> validar_clave2($clave1,$clave2);
	if ($this->errorclave1==="" && $this->errorclave2==="") {
		$this->clave=$clave1;
	}
	} 
// validador de campos vacios , osea si tiene contenido
	private function variable_iniciada($variable){
//si la variable esta iniciada y no esta vacia 
		if(isset($variable)&&!empty($variable)){
			return true;
		}else{
			return false;
		}
	}
 
	private function validar_nombre($nombre){
		//comprueba si no esta el nombre iniciada
		if(!$this -> variable_iniciada($nombre)){
			return "Debes Escribir un nombre de usuario.";
		}else{
			$this -> nombre =$nombre;
		}
		//comprueba la longitud de la cadena
		 if(strlen($nombre)<6){
		 	return "El nombre debe ser mas largo";
		 } 
		 if(strlen($nombre)>24){
		 	return "El nombre no debe ocupar mas de 24 caracteres";
		 }
		 return "";
	}

	private function validar_email($email){

		if(!$this-> variable_iniciada($email)){
			return "Debes proporcionar un email";
		}else {
			$this -> email=$email;
		}
		return "";
	}
	private function validar_clave1($clave1){

		if(!$this-> variable_iniciada($clave1)){
			return "Debes proporcionar una contrasenhia";
		}
		return "";
	}

	private function validar_clave2($clave1,$clave2){
		if(!$this-> variable_iniciada($clave1)){
			return "primero debes llenar tu contrase;a";
		}

		if(!$this-> variable_iniciada($clave2)){
			return "Debes repetir tu contrasenhia";
		}
		if($clave1!==$clave2)
		return "Ambas contrasenhia deben ser iguales";
	
	return "";
	}

	public function obtener_nombre(){
		return $this -> nombre;
	}

	public function obtener_email(){
		return $this -> email;
	}
	public function obtener_clave(){
		return $this->clave;
	}

	public function obtener_error_nombre(){
		return $this -> errornombre;
	}


	public function obtener_error_email(){
		return $this -> erroremail;
	}

	public function obtener_error_clave1(){
		return $this -> errorclave1;
	}

	public function obtener_error_clave2(){
		return $this -> errorclave2;
	}

	public function mostrar_nombre(){
		if ($this->nombre !== "") {
			echo 'value="'.$this->nombre.'"';	
		}
	}
	public function mostrar_error_nombre(){
		if($this->errornombre!==""){
			echo $this->aviso_inicio.$this->errornombre.$this->aviso_cierre;
		}
	}

	public function mostrar_email(){
		if ($this->email !== "") {
			echo 'value="'.$this->email.'"';	
		}
	}
	public function mostrar_error_email(){
		if($this->erroremail!==""){
			echo $this->aviso_inicio.$this->erroremail.$this->aviso_cierre;
		}
	}

	public function mostrar_error_clave1(){
		if($this->errorclave1!==""){
			echo $this->aviso_inicio.$this->errorclave1.$this->aviso_cierre;
		}
	}
	public function mostrar_error_clave2(){
		if($this->errorclave2!==""){
			echo $this->aviso_inicio.$this->errorclave2.$this->aviso_cierre;
		}
	}

	public function registro_valido(){
		if ($this->errornombre==="" &&
			$this->erroremail==="" &&
			$this->errorclave1==="" &&
			$this->errorclave2==="" ) {
				return true;
			}else{
				return false;
			}	
	}
}