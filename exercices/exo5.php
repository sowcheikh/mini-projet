<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>EXO5</title>
</head>

<body>
    <form action="" method="post">
        <textarea name="texte" cols="30" rows="10"></textarea>
        <input type="submit" name="valider" value="valider">
    </form>
</body>

</html>
<?php
include('fonction.php');
$orange="";
$expresso="";
$tigo="";
$invalid="";
$nbrCont="";
if (isset($_POST['valider'])) {
    $texte = $_POST['texte'];
$operateur = [
    'orange' => [],
    'tigo' => [],
    'expresso' => [],
    'invalide'=>[]
];
$orange=$tigo=$expresso=$invalid=$nbrCont=0;
$numTel = preg_split('/;| ;/', $texte,);
foreach ($numTel as $valeur) {
    $valeur = deletespace($valeur);
    /*  echo $valeur, " "; */
    /*     echo compter($valeur), " ";
 */
/* $somme=0;
for ($i=0; $i < $texte; $i++) { 
    $somme+=$i;
}
echo $somme; */
    if (compter($valeur) == 9) {
        if (preg_match('/^[0-9]*$/', $valeur)) {
            if (preg_match('/^7[6|0|8|7]/', $valeur)) {
                switch ($valeur[1]) {
                    case '0':
                        echo"expresso";
                        array_push($operateur['expresso'], $valeur);
                        $expresso+=1;
                        break;
                    case '6':
                        array_push($operateur['tigo'], $valeur);
                        $tigo+=1;
                        break;
                    default:
                        array_push($operateur['orange'], $valeur);
                        $orange+=1;
                        break;
                }
            }
        }
        
    }
    else {
        array_push($operateur['invalide'], $valeur);
        $invalid+=1;
    }
}
echo"numéro orange" ."</br>";
foreach ($operateur['orange'] as $valeurorange) {
    echo $valeurorange, " ";
}
echo "</br>";
echo"numéro tigo" ."</br>";
foreach ($operateur['tigo'] as $valeurtigo) {
    echo $valeurtigo, " ";

}
echo "</br>";
echo"numéro expresso" ."</br>";
foreach ($operateur['expresso'] as $valeurexpresso) {
    echo $valeurexpresso, " ";
    echo "</br";
}
echo "</br>";
echo "numero invalide: ". "</br>";
foreach ($operateur['invalide'] as $valeurinvalide) {
    echo $valeurinvalide;
}
//$tigo=poucentageOperateur($tigo, $nbrCont);
/* $expresso=poucentageOperateur($nbrCont, $expresso); */
//$invalid=poucentageOperateur($invalid, $nbrCont);
//echo $orange;
echo "
<table>
    <thead>
        <tr>
            <thead>Série des nombres saisis</thead>
            <thead>nombre de numéro valide</thead>
            <thead>% de numéro valide</thead>
            <thead>nombre de numéo invalide</thead>
            <thead>% des numéros invalides</thead>
            <thead>nombre de numéro orange</thead>
            <thead>% de numero orange</thead>
            <thead>nombre de numéro tigo</thead>
            <thead>% de numéro tigo</thead>
            <thead>nombre de numéro expresso</thead>
            <thead>% de numéro expresso</thead>
        </tr>
    </thead>
    <tbody>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
    </tbody>
</table>";

}
?>
