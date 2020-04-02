<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO3V2</title>
    <?php
    include('fonctions.php');
    ?>
</head>

<body>
    <form action="" method="post">
        <div class="form-group">
            <label for="nbr">Donnez le nombre de mots</label>
            <input type="text" name="nbr" id="nbr" value="<?= @$_POST['nbr'] ?>">
            <button class="btn" name="valid">Valider</button>
            <button class="btn">Annuler</button>
        </div>
        <?php
        if (isset($_POST['nbr'])) {
            for ($i = 1; $i <= $_POST['nbr']; $i++) {
        ?>
                <label for="mot"><?= 'Mot N°' . $i ?></label>
                <input type="text" name="mot[]" value="<?= @$_POST['mot'][$i-1] ?>" placeholder="<?= 'entrer le mot' . $i ?>">
            <?php
            }
            ?>
            <button name="resultat">Résultat</button>
        <?php
        }
        ?>
    </form>
    <?php
    $errors = [];
    if (isset($_POST['valid'])) {
        if (!is_entier($_POST['nbr']) || $_POST['nbr'] <= 0) {
            echo 'Veuillez entrer un entier positif';
        }
    }
    if (isset($_POST['resultat'])) {
        foreach ($_POST['mot'] as $key => $mot) {
            $mot = deletespace($mot);
            if (my_strlen($mot) > 20) {
                $errors[] = 'Mot ' . ($key + 1) . ' a dépassé 20 caractères';
            } elseif (!is_valid($mot)) {
                $errors[] = 'Mot ' . ($key + 1) . ' est incorrecte (espaces, caractères non alphabétique, numérique ..';
            } elseif ($mot === "") {
                $errors[] = 'Mot ' . ($key + 1) . ' est vide';
            }
        }

        if (empty($errors)) {
            $nbr=0;
            foreach ($_POST['mot'] as $mot) {
                if (is_car_in_string($mot, 'm')) {
                    $nbr++;
                }
            }
            echo "</br> le nombre de mots qui contient 'm' est: $nbr";
        } else {
            foreach ($errors as $err) {
                echo "<h4>" . $err . "</h4>";
            }
        }
    }
    ?>

</body>

</html>