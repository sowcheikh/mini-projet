<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>serie d'exo</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
<ul id="menu-demo2">
	<li><a href="index.php?page=exo1">EXO1</a>
	</li>
	<li><a href="index.php?page=exo2">EXO2</a>
	</li>
	<li><a href="index.php?page=exo3">EXO3</a>
    </li>
    <li><a href="index.php?page=exo4">EXO4</a>
	</li>
    <li><a href="index.php?page=exo5">EXO5</a>
	</li>
</ul>
</body>
</html>
<?php
// Si la super globale $_GET['page'] existe et elle n'est pas vide
 
if (isset($_GET['page']))
{
   
       include($_GET['page'] . '.php');
}
else{
    include('exo1.php');
}

?>