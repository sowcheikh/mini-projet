<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagination</title>
</head>
<body>
    
</body>
</html>
<?php

$tab=[
    10,20,30,40,50,60,70,80,90,100
];
$_SESSION['tab']=$tab;
$totalValeur =count($_SESSION['tab']);
$nbrParPage=2;
$nbreDePage=ceil($totalValeur/$nbrParPage);
var_dump($_SESSION['tab']);
//affichons les numéros des pages à l'aide des balises href
for ( $i = 1; $i <= $nbreDePage; $i++ ) {
    echo "<a href='pagination.php?p=$i'>$i</a>";
}
?>
<table border="1">
    <?php
    $tailleTab = $_GET['p']*2;
    $indiceDep = $tailleTab-2;
    $page=1;
    $indiceFin=($page)*$nbrParPage;
    while($indiceDep<=$tailleTab) {
        for ( $i = 0; $i < 2; $i++ ) {
            echo '<tr>';
            for ( $j = 0; $j < 2; $j++ ) {
                if ( array_key_exists( $indiceDep, $_SESSION['tab'] ) ) {
                    echo "<td>".$_SESSION['tab'][$indiceDep]."</td>";
                }
                $indiceDep++;
            }
            echo '</tr>';
        }
    }
            ?>
           </table>
