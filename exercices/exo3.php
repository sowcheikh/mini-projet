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
                <?php
                if(!empty($_POST['mot']) && preg_match("/^[A-Za-z'çéèêûîôâ]+/",$_POST['mot'])){
                    ?>
                    Saisir un autre mot: <input type="text" name="mot"> <br><br>
                <?php   
                }else{
                    ?>
                    Le mot ne doit pas exceder 20 caracteres: <input type="text" name="mot"> <br><br>
                    <?php
                }
                ?>
                <input type="submit" name="submit" value="Envoi">
                
            </form>
 <?php
if(isset($_POST['submit'])){
    
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
  // $afficher= 
   AfficherTab($correcte);
   
   $nbrLettreMm= ContientlettreM($correcte);
  
   print "<br><br>le nombre de mot ayant la letre m ou M est ".$nbrLettreMm;
}
 ?>
 </body>
</html>  