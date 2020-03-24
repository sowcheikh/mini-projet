<?php
session_start();  // démarrage d'une session
//session_destroy();

// on vérifie que les variables de session identifiant l'utilisateur existent
if (isset($_SESSION['login'])) {
    $username = $_SESSION['login'];
    if (isset($_POST['valider'])) {
        $qcm = $_POST['qcm'];
        $nbrep = $_POST['nbrep'];
        $score = $_POST['score'];
        $type = $_POST['choixquest'];
        $reponse = array();
        $bonnereponse = array();

        for ($i = 1; $i <= $nbrep; $i++) {
            $reponse = $_POST['reponse' . $i];
            if (in_array(('rep' . $i), $_POST['check'])) {
                $bonnereponse[] = $_POST['reponse' . $i];
            }
        }
        $question = [
            'question' => $qcm,
            'nbrep' => $nbrep,
            'reponse' => $reponse,
            'score' => $score,
            'type' => $type,
            'bonnereponse' => $bonnereponse
        ];

        $_SESSION['tableau'][] = $question;
        var_dump($_SESSION['tableau']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page admin</title>
    <link rel="stylesheet" href="page-admin.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">

    <script>
        window.addEventListener('load', function() {


            var element = document.getElementById('cmult');
            element.style.display = "none";
            var element1 = document.getElementById('csimple');
            element1.style.display = "none";
            var element2 = document.getElementById('ctexte');
            element2.style.display = "none";
        });

        function changement() {
            var x = document.getElementById('choixquest').value;
            if (x == "multiple") {
                var element = document.getElementById('cmult');
                element.style.display = "block";
                var element1 = document.getElementById('csimple');
                element1.style.display = "none";
                var element2 = document.getElementById('ctexte');
                element2.style.display = "none";
            }
            if (x == "simple") {
                var element = document.getElementById('cmult');
                element.style.display = "none";
                var element1 = document.getElementById('csimple');
                element1.style.display = "block";
                var element2 = document.getElementById('ctexte');
                element2.style.display = "none";
            }
            if (x == "text") {
                var element = document.getElementById('cmult');
                element.style.display = "none";
                var element1 = document.getElementById('csimple');
                element1.style.display = "none";
                var element2 = document.getElementById('ctexte');
                element2.style.display = "block";
            }
        }

        function recuperer() {
            var id_nbrep = document.getElementById('nbrep');
            if (id_nbrep.value == "") {
                alert("Donner le nombre de reponses svp");
            } else {
                var element = document.getElementById('cmult');
                element.style.display = "block";
                temp = "";
                for (let index = 0; index < parseInt(id_nbrep.value); index++) {

                    temp += "<div cla><label> Reponse " + (index + 1) + "</label> <input type='text' name='reponse" + (index + 1) + "'/> <input type='checkbox' name='check[]' value='rep" + (index + 1) + "'/></div>";
                }
                element.innerHTML = temp;
            }
        }
    </script>
</head>

<body>
    <div class="header">
        <?php
        if (isset($_SESSION['login'])) {
            echo 'Bienvenue ' . $username . " sur la plateforme d'édition des questionnaire";
        }
        ?>
    </div>
    <div class="formulaire">
        <form action="" method="post">
            <div class="menu">
            <h2>Questions</h2>
            <textarea name="qcm" id="" cols="50" rows="8"></textarea><br><br>
            <label>Score</label>
            <input type="text" name="score"><br><br>
            <label>Type</label>
            <select name="choixquest" id="choixquest" onchange="changement()" id="choix">
                <option value="multiple" id="">choix multiple</option>
                <option value="simple">choix simple</option>
                <option value="text">choix texte</option>
            </select><br><br>
            <div class="container2">
                <label for="nbrep">Nb réponse</label>
                <input type="text" name="nbrep" id="nbrep" onfocusout="recuperer()">
            </div>
            <div class="container" id="cmult">
                <input type="text"><input type="checkbox" name="" id="">
            </div>
            <div class="container" id="csimple">
                <input type="text"><input type="radio" name="" id="">
            </div>
            <div class="container" id="ctexte">
                <input type="text">
            </div>
            </div>
            <div class="valider">
                <input type="submit" name="valider" value="Valider">
            </div>
        </form>
    </div>
</body>

</html>