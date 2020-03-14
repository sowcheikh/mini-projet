<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EXO1</title>
</head>

<body>
    <form action="" method="post">
        <input type="text" name="n" placeholder="entrer un nombre superieur à 10000">
        <input type="submit" value="calculer" name="calculer">
    </form>
</body>

</html>

<?php
include('fonction.php');

if (isset($_POST['calculer'])) {
    $n = $_POST['n'];
    if (!empty($_POST['n']) && preg_match("/^[0-9 ]+$/", $n)) {
        if ($n > 50) {
            $T1 = array();
            for ($i = 2; $i < $n; $i++) {
                if (nbrPremier($i)) {
                    array_push($T1, $i);
                }
            }
            $taille1 = count($T1);
            echo "les nombres premiers sont: " . "</br>";
            foreach ($T1 as $valeur) {
                echo $valeur . " ";
            }
            $T = [
                'inferieur' => [],
                'superieur' => []
            ];
            $resultatMoyenne = moyenne($T1);
        }
        echo "</br>";
        echo "la moyenne est: " . "</br>";
        echo $resultatMoyenne;
        echo "</br>";
        for ($i = 0; $i < $taille1; $i++) {
            if ($T1[$i] > $resultatMoyenne) {
                array_push($T['superieur'], $T1[$i]);
            } else {
                array_push($T['inferieur'], $T1[$i]);
            }
        }
        echo "les nombres premiers inférieur à la moyenne sont: " . "</br>";
        foreach ($T['inferieur'] as $inferieur) {
            echo $inferieur ." ";
        }
        echo "</br>";
        echo "les nombres premiers supérieur à la moyenne sont: " . "</br>";
        foreach ($T['superieur'] as $superieur) {
            echo $superieur ." ";
        }
    }
}
?>