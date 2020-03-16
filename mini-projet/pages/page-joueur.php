<?php
session_start();  // démarrage d'une session

// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="page-joueur.css">
</head>
<body>
<div class="header">
        <?php
        if (isset($_SESSION['firstname']) && isset($_SESSION['lastname'])) {
            echo 'Bienvenue ' .$lastname . " ". $firstname . " sur la plateforme de réponse aux QCM";
        }
        ?>
    </div>
    <div class="milieu">
    <form action="" method="post">
    <label for="">QUESTION</label>
    <textarea name="" id="" cols="30" rows="10">
        <?php
        if (isset($_SESSION['tableu'])) {
            echo $qcm;
        }
        ?>
    </textarea>
    </form>
    </div>
</body>
</html>