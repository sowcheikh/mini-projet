<?php
$errorfirstname = $errorlastname = '';
$firstname = $lastname = $connexion = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["connexion"]) || preg_match("/^[A-Za-z '-]+$/", $connexion)) {
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        // On ouvre la session
        session_start();
        // On enregistre le login en session
        $_SESSION['firstname'] = $firstname;
        $_SESSION['lastname'] = $lastname;
        // On redirige vers le fichier admin.php
        header('Location: ../pages/page-joueur.php');
        exit();
    } elseif (empty($_POST["firstname"])) {
        $errorfirstname = "nom est obligatoire";
    } elseif (empty($_POST["lastname"])) {
        $errorlastname = "prénom est obligatoire";
    }
}
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="joueur.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <title>Joeur</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <h1 class="titre">Se connecter en Joueur</h2>
        <div class="formulaire">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="user">
                    <img src="../img/icone-user.png" alt="user"> <input type="text" name="firstname" placeholder="Nom">
                    <span class="error"><?php echo $errorfirstname; ?> </Span>
                    <br>
                </div>
                <div class="user">
                    <img src="../img/icone-user.png" alt="user"> <input type="text" name="lastname" placeholder="Prénom">
                    <span class="error"><?php echo $errorlastname; ?> </Span>
                    <br>
                </div>
                <div class="connexion">
                    <input type="submit" name="connexion" value="Connexion">
                </div>
            </form>
        </div>
</body>

</html>