<?php

class Usuario {
	private $idUsuario;
	private $nombre;
	private $email;
	private $password;
	private $fechaRegistro;
	private $activo;	

	public function __construct($idUsuario, $nombre, $email, $password, $fechaRegistro, $activo)
	{
		$this -> idUsuario = $idUsuario;
		$this -> nombre = $nombre;
		$this -> email = $email;
		$this -> password = $password;
		$this -> fechaRegistro = $fechaRegistro;
		$this -> activo = $activo;
	}

	public function getId(){ return $this -> idUsuario ; }
	public function getNombre(){ return $this -> nombre; }
	public function getEmail(){ return $this -> email; }
	public function getPassword(){ return $this -> password; }
	public function getFechaRegistro(){ return $this -> fechaRegistro; }
	public function estaActivo(){return $this -> activo ; }

	public function setNombre($nombre){ $this -> nombre = $nombre ;}
	public function setEmail($email){ $this -> email = $email; }
	public function setPassword($password){ $this -> password = $password; }
	public function setActivo($activo){ $this -> activo = $activo; }

}