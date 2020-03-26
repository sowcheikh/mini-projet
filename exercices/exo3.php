<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ex03</title>
    <link rel="stylesheet" href="style.css">
    <?php
    session_start();
    include('fonction.php');

    // Supprimer les session
    if (isset($_SESSION['valeur'])) {
        for ($i = 1; $i <= (int) $_SESSION['valeur']; $i++) {
            $mot = "mot" . $i;
            $indice = "m" . $i;
            unset($_SESSION[$mot], $_SESSION[$indice]);
        }

        unset($_SESSION['bon']);
    }

    if (isset($_POST['valider'])) {
        if (verifnombre($_POST['nbrMots'])) {
            unset($_SESSION['error']);
            $_SESSION['ajoutMots'] = TRUE;
            $_SESSION['valeur'] = (int) $_POST['nbrMots'];
        } else {

            if (isset($_SESSION['bon'])) {
                unset($_SESSION['bon']);
            }
            $_SESSION['error'] = "Entrer un valeur exacte";
        }
    }

    if (isset($_POST['result'])) {
        $_SESSION['ajoutMots'] = TRUE;
        $verif_bon = 0;
        $comptem = 0;
        for ($i = 1; $i <= $_SESSION['valeur']; $i++) {
            $mot = "mot" . $i;
            $p = "p" . $i;
            $_SESSION[$mot] = $_POST[$p];

            if (verifmot($_POST[$p])) {
                if (verifcompteur($_POST[$p], 20)) {
                    $indice = "m" . $i;
                    unset($_SESSION[$indice]);
                    if (comptemots($_POST[$p], 'm')) {
                        $comptem++;
                    }
                } else {
                    $indice = "m" . $i;
                    $_SESSION[$indice] = " Plus 20 caracteres";
                    $verif_bon++;
                }
            } else {
                $indice = "m" . $i;
                $_SESSION[$indice] = " Des lettres seulement";
                $verif_bon++;
            }
        }

        $_SESSION['bon'] = $verif_bon;
        $_SESSION['mot_m'] = $comptem;
    }
    ?>
</head>

<body>
    <div class="page">
        <div class="form" align="center">
            <form action="" method="post">
                <label for="nbrMots">Combien de mots</label><br>
                <input type="text" name="nbrMots" id="nbrMots"><br>
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<span class='errortext'>" . $_SESSION['error'] . "</span> </br>";
                    unset($_SESSION['error']);
                }
                ?>
                <div id="submit">
                    <input class="submit" type="submit" value="Valider" name="valider">
                    <input class="reset" type="submit" value="Annuler">
                </div>
        </div>
    </div>
    <?php

    if (isset($_SESSION['ajoutMots']) && $_SESSION['ajoutMots'] == TRUE) {
        ?>
        <div class="generer">
            <?php

        for ($i = 1; $i <= $_SESSION['valeur']; $i++) {
            echo "<label> Mot " . $i . "</label>";
            $indice = "m" . $i;
            if (isset($_SESSION[$indice])) {
                echo "<span class='errortext'>" . $_SESSION[$indice] . "</span>";
            }
            echo "<br>";
            $mot = "mot" . $i;
            if (isset($_SESSION[$mot])) {
                $p = "p" . $i;
                echo "<input type='text' name=$p value=" . $_SESSION[$mot] . "></input>";
            } else {
                $p = "p" . $i;
                echo "<input type='text' name=$p></input></br>";
            }
        }

        echo "<input type='submit' value='Resultat' name='result' id='result'  />";
        ?>
        </div>
        <?php

        $_SESSION['ajoutMots'] = FALSE;
    }

    ?>
    </form>

    <?php

    if (isset($_SESSION['bon']) && $_SESSION['bon'] == 0) {
        echo "<div class='reponse'>";
        echo "<h1>";
        echo " Vous avez entré ", $_SESSION['valeur'], " Mots dont ";
        echo "<span>" . $_SESSION['mot_m'], " contenant la lettre M </span>";
        echo "</h1>";
        echo "</div>";
    }

    ?>
</body>

</html>