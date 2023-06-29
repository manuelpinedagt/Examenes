<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

	<title>Examen</title>

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

session_start();

$con = mysqli_connect("localhost","root","","examenes"); 

$codigo = $_GET["c"];
$contador = 1;

$sp = mysqli_query($con, "SELECT * FROM `preguntas` WHERE `codigo` = '$codigo'");

echo "<form action = 'resuelve.php' method = 'POST'>";

while ($mp = mysqli_fetch_array($sp))
{
	echo "Pregunta No. ".$contador.": $mp[2]<br>";
	echo "<br>";
	echo "<input type = 'radio' name = 'respuesta$contador' value = '$mp[3]' required>$mp[3]";
	echo "<br>";
	echo "<input type = 'radio' name = 'respuesta$contador' value = '$mp[4]' required>$mp[4]";
	echo "<br>";
	echo "<input type = 'radio' name = 'respuesta$contador' value = '$mp[5]' required>$mp[5]";
	echo "<br>";
	echo "<br>";
	echo "<br>";
	
	$_SESSION["ID".$contador] = $mp[0];
	$contador++;
	
}

$_SESSION["contador"] = $contador;

echo "<button>Enviar</button>
 </form>";
 


?>

 </center>
 </body>
 </html>
