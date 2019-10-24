<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8" >
	<meta http-equiv="x-ua-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php
	if(!isset($titulo) || empty($titulo)){
		$titulo='Blog de Juan';
	}
		echo "<title>$titulo</title>";
	?>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/estilo.css" rel="stylesheet">
	
</head>
<body>