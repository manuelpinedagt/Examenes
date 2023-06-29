<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

	<title>Resultados</title>

<style>

Body
{
	background-color: #E1F8F6;
}

#intex
{
	color: green;
}

#intexd
{
	color: red;
}

#div
{
	width: 100%;
	text-align: center;
}

</style>

</head>

<body>

<center>
<br>
<br>
<br>
<h3>RESULTADOS</h3>
<br>
<hr>
<div id = "div">
<?php

$con = mysqli_connect("localhost","root","","examenes"); 

session_start();

$preguntas = $_SESSION["contador"];
$contador = 1;

while($contador < $preguntas)
{
	
	$respuesta = $_POST["respuesta".$contador];
	$ID = $_SESSION["ID".$contador];
	
	$cr = mysqli_query($con, "SELECT * FROM `preguntas` WHERE `ID` = '$ID' AND `respuesta_correcta` = '$respuesta'");
	$crd = mysqli_query($con, "SELECT * FROM `preguntas` WHERE `ID` = '$ID'");
	$rr = mysqli_num_rows($cr);
	
	if($rr == 0)
	{
		echo "Pregunta No.$contador - <span class='material-symbols-outlined' id = 'intexd'>cancel</span>";
		
		while($mr = mysqli_fetch_array($crd))
		{
			echo " Respuesta Correcta: $mr[6]<br>";
		}
	}
	
	if($rr == 1)
	{
		echo "Pregunta No.$contador - <span class='material-symbols-outlined' id = 'intex'>check_circle</span><br>";
	}
	
	$contador++;
}



?>

 </center>
 </body>
 </html>
