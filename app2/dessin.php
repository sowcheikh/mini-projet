<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dessin.css">
    <title>DESSIN</title>
</head>

<body>
    <?php
    $couleur = ['red', 'blue', 'gray', 'yellow'];
    ?>
    <div id="menu">
        <h1>SONATEL ACADEMIE</h1>
        <form action="" method="post">
            <div class="i1">
                <h2>Taille de la martice</h2><img src="img/icone1.png" alt="icone1"><input type="text" name="taille">
            </div>
            <div class="i2">
                <h2>Select C1</h2>
                <img src="img/icone2_3.png" alt="icone2">
                <select name="c1" id="">
                    <?php
                    foreach ($couleur as $valeur) {
                        echo "<option value=" . $valeur . ">" . $valeur . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="i3">
                <h2>Select C2</h2>
                <img src="img/icone2_3.png" alt="icone3">
                <select name="c2" id="">
                    <?php
                    foreach ($couleur as $valeur) {
                        echo "<option value=" . $valeur . ">" . $valeur . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="i4">
                <h2>Select C3</h2>
                <img src="img/icone2_3.png" alt="icone3">
                <select name="c3" id="">
                    <?php
                    foreach ($couleur as $valeur) {
                        echo "<option value=" . $valeur . ">" . $valeur . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="boutton">
                <input class="annuler" type="submit" value="ANNULER">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input class="dessiner" type="submit" value="DESSINER" name="dessiner">
            </div>
            <table style="width: 300px; height:300px; border: 1px">
                <?php
                if (isset($_POST['dessiner'])) {
                    $val = (int) $_POST['taille'];
                    $c1 = $_POST['c1'];
                    $c2 = $_POST['c2'];
                    $c3 = $_POST['c3'];
                    for ($i = 0; $i < $val; $i++) {
                        echo '<tr>';
                        for ($j = 0; $j < $val; $j++) {
                            if ($j >= $i && $j<= ($val - $i - 1)) {
                                echo "<td bgcolor='$c1'></td>";
                            }elseif ($j==$i) {
                                echo "<td bgcolor='$c1'></td>";
                            }
                             elseif ($j == ($val - $i - 1 )) {
                                echo "<td bgcolor='$c1'></td>";
                            } elseif ($j > $i || $j < ($val - $i - 1)) {
                                echo "<td bgcolor='$c3'></td>";
                            } else {
                                echo "<td bgcolor='$c2'></td>";
                            }
                        }
                        echo "</tr>";
                    }
                }
                ?>

            </table>
        </form>
    </div>
</body>

</html>