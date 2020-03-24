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
    $_SESSION['nombre'] = $n;
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
            //$_SESSION['supinf'] = $T;
            $_SESSION['tabInf'] = $T['inferieur'];
            $_SESSION['tabSup'] = $T['superieur'];
            $resultatMoyenne = moyenne( $T1 );
            $_SESSION['moyenne'] = $resultatMoyenne;
        }
        echo '</br>';
    } else echo'veuillez entrer un nombre';
}
?>
<h4>la moyenne des nombres premiers est : <?php echo $_SESSION['moyenne'];
?></h4>
<?php
$taille1 = count( $_SESSION['premier'] );
$tailleinf = count( $_SESSION['tabInf'] );
$_SESSION['inf'] = $tailleinf;
$taillesup = count( $_SESSION['tabSup'] );
$_SESSION['sup'] = $taillesup;
$d = ceil( $taille1/100 );

//$tailleTab = $_GET['p']*100;

$tailletabInf = $_GET['p']*100;
$tailleTabSup = $_GET['p']*100;

$diffInf = $tailletabInf-100;
$diffSup = $tailleTabSup-100;
?>
<?php
for ( $i = 0; $i < $taille1; $i++ ) {
    if ( $_SESSION['premier'][$i] > $_SESSION['moyenne'] ) {
        array_push( $_SESSION['tabSup'], $_SESSION['premier'][$i] );
    } else {
        array_push( $_SESSION['tabInf'], $_SESSION['premier'][$i] );
    }
}
echo 'les nombres premiers inférieur à la moyenne sont: ' . '</br>';
?>
<div class = 'tableau'>
<div class = 'inf'>
<table border = '1'>
<?php
while ( $diffInf <= $tailletabInf ) {
    for ( $i = 0; $i < 10; $i++ ) {
        echo '<tr>';
        for ( $j = 0; $j < 10; $j++ ) {
            if ( array_key_exists( $diffInf, $_SESSION['tabInf'] ) ) {
                echo '<td>'.$_SESSION['tabInf'][$diffInf].'</td>';
            }
            $diffInf++;
        }
        echo '</tr>';
    }
}
?>
</table>
</div>

<?php
echo 'les nombres premiers supérieur à la moyenne sont: ' . '</br>';
?>
<div class = 'sup'>
<table border = '1'>
<?php
while ( $diffSup <= $tailleTabSup ) {
    for ( $i = 0; $i < 10; $i++ ) {
        echo '<tr>';
        for ( $j = 0; $j < 10; $j++ ) {
            if ( array_key_exists( $diffSup, $_SESSION['tabSup'] ) ) {
                echo '<td>'.$_SESSION['tabSup'][$diffSup].'</td>';
            }
            $diffSup++;
        }
        echo '</tr>';
    }
}
?>
</table>
</div>
</div>
<?php
echo'<div class="paginaation">';
echo "<a href='index.php'>&laquo;</a>";
for ( $i = 1; $i < $d/2; $i++ ) {

    echo"<a href='exo1.php?p=$i'>$i</a>";
}
echo"<a href='#'>&raquo;</a>";
echo'</div>';
?>