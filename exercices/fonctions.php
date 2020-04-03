<?php
//fonction caractère
$caracteres = [
    ['a', 'A'], ['b', 'B'], ['c', 'C'], ['d', 'D'], ['e', 'E'], ['f', 'F'], ['g', 'G'], ['h', 'H'],
    ['i', 'I'], ['j', 'J'], ['k', 'K'], ['l', 'L'], ['m', 'M'], ['n', 'N'], ['o', 'O'], ['p', 'P'],
    ['q', 'Q'], ['r', 'R'], ['s', 'S'], ['t', 'T'], ['u', 'V'], ['w', 'W'], ['x', 'X'], ['y', 'Y'],
    ['z', 'Z']
];
function est_caractere($car)
{
    return (($car >= 'a' && $car <= 'z') || ($car >= 'A' && $car <= 'Z'));
}
//fonction qui retourne seulement des miniscule
function car_to_lower($car)
{
    global $caracteres;
    foreach ($caracteres as $letter) {
        for ($i = 0; $i < my_strlen($letter); $i++) {
            if ($letter[$i] == $car) {
                return $letter[0];
            }
        }
    }
    return $car;
}
//fonction qui retourne seulement des majuscule
function car_to_upper($car)
{
    global $caracteres;
    foreach ($caracteres as $letter) {
        for ($i = 0; $i < my_strlen($letter); $i++) {
            if ($letter[$i] == $car) {
                return $letter[1];
            }
        }
    }
    return $car;
}
//fonction chiffre
function is_entier($car)
{
    return ($car >= '0' && $car <= '9');
}
//fonction qui supprime les espaces entre les caractères
function deletespace($mot)
{
    $i = 0;
    $val = '';
    while (!empty($mot[$i])) {
        if ($mot[$i] != ' ') {
            $val .= $mot[$i];
        }
        $i++;
    }
    return $val;
}
//fonction affichant la taille d'un tableau ou d'une chaîne de caractère
function my_strlen($mot)
{
    $i = 0;
    $compt = 0;
    while (!empty($mot[$i])) {
        $compt += 1;
        $i++;
    }
    return $compt;
}
//fonction qui dit si un mot est valide (contient que des lettres alphabétique)
function is_valid($mot)
{
    $i = 0;
    while (isset($mot[$i])) {
        if (!est_caractere($mot[$i])) {
            return FALSE;
        }
        $i++;
    }
    if ($i == 0) {
        return FALSE;
    }
    return TRUE;
}
//fonction qui vérifie si un caractère est dans une chaine(m ou M)
function is_car_in_string($chaine, $car)
{
    $resultat = false;
    for ($i = 0; $i < my_strlen($chaine); $i++) {
        if ($chaine[$i] === car_to_lower($car) || $chaine[$i] === car_to_upper($car)) {
            $resultat = true;
        } else {
            $resultat = false;
        }
    }
    return $resultat;
}
//fonction qui retourne une chaine en inverssant la casse
function inverse_casse($car)
{
    if (car_to_lower($car)) {
        return car_to_upper(($car));
    } else {
        return car_to_lower($car);
    }
}
// foncion phrase valide 
function is_valid_phrase($chaine)
{
    $n = my_strlen($chaine);
    if (preg_match('/^[A-Z|a-z]/', $chaine) && ($chaine[$n - 1] === '.' || $chaine[$n - 1] === '!' || $chaine[$n - 1] === '?')) {
        return true;
    }
    return false;
}
