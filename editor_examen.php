<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

	<title>Editor de Exámenes</title>

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

date_default_timezone_set("America/Guatemala");

$fh = date("Y-m-d H:i:s");

$_SESSION["preguntas"] = $_POST["preguntas"];

$titulo = $_POST["titulo"];
$preguntas = $_SESSION["preguntas"];
$contador = 1;
$cc = 1;

while($cc > 0)
{
	$codigo = rand(2376773,999999);
	$rc = mysqli_query($con, "SELECT * FROM `listado_examenes` WHERE `codigo` = '$codigo'");
	$cc = mysqli_num_rows($rc);
}

$_SESSION["codigo"] = $codigo;

$rc = mysqli_query($con, "INSERT INTO `listado_examenes` VALUES ('','$titulo','$codigo','$fh')");

echo "<form action = 'save.php' method = 'POST'>";

while($contador <= $preguntas)
{
	echo "Pregunta No. ".$contador.": <input type = 'text' name = 'pregunta$contador' required  class = 'form-control' id = 'intex'><br>";
	echo "<br>";
	echo "Respuesta 1: <input type = 'text' name = 'respuesta1$contador'   id = 'intexd' required><input type = 'radio' name = 'correcta$contador' value = '1'>Correcta";
	echo "<br>";
	echo "Respuesta 2: <input type = 'text' name = 'respuesta2$contador'   id = 'intexd' required><input type = 'radio' name = 'correcta$contador' value = '2'>Correcta";
	echo "<br>";
	echo "Respuesta 3: <input type = 'text' name = 'respuesta3$contador'   id = 'intexd' required><input type = 'radio' name = 'correcta$contador' value = '3'>Correcta";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	$contador++;
}

echo "<button>Aceptar</button>
 </form>";

?>

 </center>
 </body>
 </html>
