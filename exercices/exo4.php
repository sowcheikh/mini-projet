<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EXO4</title>
    <?php
    include('fonctions.php');
    ?>
</head>

<body>
    <div class="form-style-2">
        <div class="form-style-2-heading">Entrer une phrase</div>
        <form action="" method="post">
            <textarea name="texte" cols="30" rows="10" class="textarea-field"></textarea>
            <input class="valider" type="submit" name="valider" value="valider">
        </form>
    </div>
</body>

</html>
<?php

if (isset($_POST['valider'])) {
    if (is_valid_phrase($_POST['texte'])) {
        echo 'cest une phrase';
    } else {
        echo "ce n'est pas une phrase";
    }
}






?>