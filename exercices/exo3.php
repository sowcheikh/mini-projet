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
        if(@EstVide($_POST['mot'])){
            $val= $_POST['mot'];
            $mot= CompteMot(" ", $val);
                foreach($mot as $value){
                    if(longueurMot($value)<=20){
                            $correcte[]=$value;    
                    }
                }
        } 
    //appelle de la fonction Afficher
       AfficherTab($correcte);
       
       $nbrLettreMm= ContientlettreM($correcte);
      
       print "<br><br>le nombre de mot ayant la letre m ou M est ".$nbrLettreMm;
    }else{
    
      echo"saisir un mot";
       
    }
    
     
}
 ?>
 </body>
</html>  
