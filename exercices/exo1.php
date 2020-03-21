<?php
session_start();
?>

<!DOCTYPE html>
<html lang = 'en'>

<head>
<meta charset = 'UTF-8'>
<meta name = 'viewport' content = 'width=device-width, initial-scale=1.0'>
<link rel = 'stylesheet' href = 'style.css'>
<title>EXO1</title>
</head>

<body>
<form action = '' method = 'post'>
<input type = 'text' name = 'n' placeholder = 'entrer un nombre superieur à 10000'>
<input type = 'submit' value = 'calculer' name = 'calculer'>
</form>
</body>
</html>

<?php
include( 'fonction.php' );

if ( isset( $_POST['calculer'] ) ) {
    $n = $_POST['n'];
    $_SESSION['nombre']=$n;
    if ( !empty( $_POST['n'] ) && preg_match( "/^[0-9 ]+$/", $n ) ) {
        if ( $n > 10000 ) {
            $T1 = array();
            for ( $i = 2; $i < $n; $i++ ) {
                if ( nbrPremier( $i ) ) {
                    array_push( $T1, $i );
                }
            }
            $_SESSION['premier'] = $T1;
            $T = [
                'inferieur' => [],
                'superieur' => []
            ];
            $_SESSION['supinf'] = $T;
            $resultatMoyenne = moyenne( $T1 );
            $_SESSION['moyenne']=$resultatMoyenne;
        }
        echo '</br>';
    }
}
?>

<h2>la liste des nombres de 1 à <?php echo $_SESSION['nombre'] ?></h2>
            <table border = '1'>
            <?php
            $taille1 = count($_SESSION['premier']);
            $d = $taille1/100;
            $tailleTab = $_GET['p']*100;
            $diff = $tailleTab-100;
            while ( $diff <= $tailleTab ) {

                for ( $i = 0; $i < 10; $i++ ) {
                    echo '<tr>';
                    for ( $j = 0; $j < 10; $j++ ) {
                        if ( array_key_exists( $diff, $_SESSION['premier'] ) ) {
                            echo '<td>'.$_SESSION['premier'][$diff].'</td>';
                        }
                        $diff++;
                    }
                    echo '</tr>';
                }
            }
            for ( $i = 1; $i < $d; $i++ ) {

                echo "<a href='exo1.php?p=$i'>$i</a>";
            }
            ?>
            </table>
            <?php
            echo 'la moyenne est: ' . '</br>';
            echo $_SESSION['moyenne'];
            echo '</br>';
            ?>
            <?php
             for ( $i = 0; $i < $taille1; $i++ ) {
                if ( $_SESSION['premier'][$i] > $_SESSION['moyenne'] ) {
                    array_push( $_SESSION['supinf']['superieur'], $_SESSION['premier'][$i] );
                } else {
                    array_push( $_SESSION['supinf']['inferieur'], $_SESSION['premier'][$i] );
                }
            }
            echo 'les nombres premiers inférieur à la moyenne sont: ' . '</br>';
            foreach ( $_SESSION['supinf']['inferieur'] as $inferieur ) {
                echo $inferieur. ' ';
            }
            ?>
            <table>
            </table>
            <?php
            echo '</br>';
            echo 'les nombres premiers supérieur à la moyenne sont: ' . '</br>';
            foreach ( $_SESSION['supinf']['superieur'] as $superieur ) {
                echo $superieur. ' ';
            }
            ?>