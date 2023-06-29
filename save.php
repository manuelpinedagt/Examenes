<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

	<title>Inventario</title>

<style>

Body
{
	background-color: #E1F8F6;
}

#intex
{
	width: 75%;
}

#intexd
{
	width: 50%;
}

#div
{
	width: 50%;
	text-align: left;
}

</style>

</head>

<body>

<center>
<br>

<div id = "div">

<?php

$con = mysqli_connect("localhost","root","","examenes"); 

session_start();

$preguntas = $_SESSION["preguntas"];
$codigo = $_SESSION["codigo"];
$contador = 1;

while($contador <= $preguntas)
{
	
	$pregunta = $_POST["pregunta".$contador];
	$respuesta1 = $_POST["respuesta1".$contador];
	$respuesta2 = $_POST["respuesta2".$contador];
	$respuesta3 = $_POST["respuesta3".$contador];
	$correcta = $_POST["correcta".$contador];
	
	if($correcta == 1){$correcta = $respuesta1;}
	if($correcta == 2){$correcta = $respuesta2;}
	if($correcta == 3){$correcta = $respuesta3;}
		
	
	$ip = mysqli_query($con, "INSERT INTO `preguntas` VALUES ('','$codigo','$pregunta','$respuesta1','$respuesta2','$respuesta3','$correcta')");
	
	$contador++;
}

echo "Exámen $codigo creado con éxito";

echo "<a href = 'visor_examen.php?c=$codigo'><br><br><button>Abrir Examen</button></a>";


?>

 </center>
 </body>
 </html>
