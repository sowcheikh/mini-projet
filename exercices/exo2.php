<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EXO2</title>
</head>

<body>
    <form action="" method="post">
        <h2>veuillez faire votre choix</h2>
        <label for="">francais</label>
        <input type="radio" name="choix" value="francais">
        <label for="">english</label>
        <input type="radio" name="choix" value="anglais">
        <input type="submit" value="valider">
    </form>
    <table>
        <?php
        // $NbrLigne : le nombre de lignes
        $NbrLigne = 4;
        // $NbrCol : le nombre de colonnes
        $NbrCol = 3;
        $d = 0;
        ?>
        <?php

        $mois = [
            'francais' => [
                '1' => 'janvier', '2' => 'février', '3' => 'mars', '4' => 'avril', '5' => 'mai', '6' => 'juin', '7' => 'juillet',
                '8' => 'aout', '9' => 'septembre', '10' => 'octobre', '11' => 'novembre', '12' => 'decembre'
            ],
            'anglais' => [
                '1' => 'january', '2' => 'february', '3' => 'march', '4' => 'april', '5' => 'may', '6' => 'june', '7' => 'july',
                '8' => 'august', '9' => 'september', '10' => 'october', '11' => 'november', '12' => 'december'
            ]
        ];

        foreach ($mois as $langue => $table) {
            /* echo 'mois : ' .$langue. '<br>'; */
            foreach ($table as $key => $valeur) {
                /*  echo $key. ' : ' .$valeur. '<br>'; */
            }
            echo '<br>';
        }

        ?>

        <tbody>
            <?php
              if(isset($_POST['choix'])) {
            // pour chaque ligne
            for ($i = 1; $i <= $NbrLigne; $i++) {
            ?>
                <tr>
                    <?php
                    // pour chaque colonne (de la ligne)
                    for ($j = 1; $j <= $NbrCol; $j++) {
                        $d++;
                    ?>
                        <td>
                            <?php
                            echo $d; // CONTENU de la CELLULE i x j 
                            ?></td>
                        <td>
                            <?php

                            switch ($_POST["choix"]) {
                                case "francais":
                                    echo $mois['francais'][$d];
                                    break;
                                case "anglais":
                                    echo $mois['anglais'][$d];
                                    break;
                            }
                            ?>

                            <!-- <?php echo $_POST['choix']; // CONTENU de la CELLULE i x j 
                                    ?> -->
                        </td>
                    <?php
                    }
                    ?>
                </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>
</body>

</html>