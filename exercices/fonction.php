<?php

function nbrPremier( $n ) {
    $premier = false;
    $i = 2;
    while( $n%$i != 0 ) {
        $i++;
    }
    if ( $n == $i ) {
        $premier = true;
    }
    return $premier;
}

function moyenne( $T1 ) {
    $moy = 0;
    for ( $i = 0; $i < count( $T1 );
    $i++ ) {

        $moy += $T1[$i];
    }
    return $moy/count( $T1 );
}

function phrases( $mots ) {
    $phrase = false;
    if ( strlen( $mots <= 20 ) ) {
        $phrase = true;
    }
    return $phrase;
}

function compter( $texte ) {
    $i = 0;
    while( !empty( $texte[$i] ) ) {
        $i++;
    }
    return $i;
}

function deletespace( $valeur ) {
    $i = 0;
    $val = '';
    while( !empty( $valeur[$i] ) ) {
        if ( $valeur[$i] != ' ' ) {
            $val .= $valeur[$i];

        }
        $i++;
    }
    return $val;
}

function poucentageOperateur( $nbrcont, $nbrtotal ) {
    $pourcent = 0;
    $pourcent = ( $nbrcont/$nbrtotal)*100;
    return $pourcent;

}
// function qui test si une variable est vide
function EstVide($chaine){
    if($chaine!=""){
        return true;
    }else{
        return false;
    }
}
 //function qui compte le nmobre de lettre dans un mot ou chaine
 function longueurMot($chaine){
    $i=0;
    $compt=0;
     while(@EstVide($chaine[$i])){
             $compt+=1;
          $i++;
     }
        return $compt;
    }

//function qui compt le nombre de mot dans un tab ou chaine
function CompteMot($delime,$chaine){
    $i=0;
    $chaine.=" ";
    $mots=[];
    $mot='';
     while(@EstVide($chaine[$i])){
             if($chaine[$i]!=$delime){
               $mot.=$chaine[$i];
             }elseif($chaine[$i]==$delime){
                 $mots[]=$mot;
                 $mot="";
             }
           $i++;
     }
      return $mots;
 }

//function qui compt le nombre de mot dans un tab ou chaine
function CompteMot2($delime,$chaine){
    $i=0;
    $mots=[];
    $mot='';
     while(!empty($chaine[$i])){
             if($chaine[$i]!=$delime){
               $mot.=$chaine[$i];
             }elseif($chaine[$i]==$delime){
                 $mots[]=$mot;
                 $mot="";
             }
           $i++;
           if(empty($chaine[$i]))
           {
            $mots[]=$mot;
           }
     }
      return $mots;
 }
 //verifie si la lettre m se trouve dans le mot
        function ContientlettreM(array $t){
            $nbreMotLettreMm=0;
                foreach($t as $value){
                    if(preg_match("/[m|M]+/",$value)){
                         $nbreMotLettreMm++;
                    }
                }
                return $nbreMotLettreMm;
        }

//permet de remplir un tableau
        function RemplirTab($t,$tab){
            $i=0;
            while($i<longueurMot($t)){
                if($t[$i]!= " "){
                   $tab[]= $t[$i];
                }
            }
        }
//permet d'afficher un tableau
        function AfficherTab($tab){
            foreach($tab as $value){
                print $value." "; 
                }
            }

//function poucentage
function Pourcent($N,$n){
    $pourcent= ($n/$N)*100;

    return $pourcent;
}

?>