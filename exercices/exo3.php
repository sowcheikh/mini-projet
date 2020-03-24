<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EXO3</title>
</head>


<?php include("fonction.php")?>
<body>
             <form style="padding-top: 20px" action="" method="POST">
                <input type="text" placeholder="saisir des mots" name="mot">
                <input type="submit" name="submit" value="Envoi">
            </form>
 <?php
if(isset($_POST['submit'])){
    if(!empty($_POST['mot']) && preg_match("/^[A-Za-z'çéèêûîôâ]+/",$_POST['mot'])){
            $val= $_POST['mot'];
            $mot= CompteMot2(" ", $val);
            $N=[];
                foreach($mot as $value){
                    if(longueurMot($value)<=20){
                            $N[]=$value;    
                    } else {
                        echo "les mots ne doivent pas dépassé 20 caratères!!";
                    }
                }
    //appelle de la fonction Afficher
       AfficherTab($N);
       
       $nbrLettreMm= ContientlettreM($N);
      
       print "<br><br>le nombre de mot ayant la letre m ou M est ".$nbrLettreMm;
    }else{
    
      echo"saisir un mot";
       
    }
       
}
 ?>
 </body>
</html>  
