<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/dataTables.bootstrap4.min.css">

	<title>Gestor de Exámenes</title>

<style>

Body
{
	background-color: #E1F8F6;
}

#intex
{
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
<br>
<br>
<hr>

<div id = "div">

<form action = "editor_examen.php" method = "POST">
Título Exámen: <input type = "text" name = "titulo" class = "form-control" id = "intex"><br><br>
Cantidad de Preguntas: <br>
<input type = "radio" name = "preguntas" value = "1">1<br>
<input type = "radio" name = "preguntas" value = "2">2<br>
<input type = "radio" name = "preguntas" value = "3">3<br>
<input type = "radio" name = "preguntas" value = "4">4<br>
<input type = "radio" name = "preguntas" value = "5">5<br><br>
 </div>
 <button>Aceptar</button>
 
 </form>



<br>
<br>
<h3>LISTADO DE EXAMENES</h3>
<br>
<hr>

 <?php

$con = mysqli_connect("localhost","root","","examenes"); 

$sp = mysqli_query($con, "SELECT * FROM `listado_examenes`");

while ($mp = mysqli_fetch_array($sp))
{
	echo "Título: $mp[1] - <a href = 'visor_examen.php?c=$mp[2]'>Abrir</a><br>"; 
}


?>

 </center>
 </body>
 </html>
