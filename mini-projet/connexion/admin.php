<?php
// Definition des constantes et variables
define('USERNAME', 'admin');
define('PASSWORD', 'admin');
$errorUsername = $errorPasssword = $errorMessage = '';

// Test de l'envoi du formulaire
if (!empty($_POST)) {
    // Les identifiants sont transmis ?
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Sont-ils les mêmes que les constantes ?
        if ($_POST['username'] !== USERNAME) {
            $errorUsername = 'Mauvais login !';
        } elseif ($_POST['password'] !== PASSWORD) {
            $errorPasssword = 'Mauvais password !';
        } else {
            // On ouvre la session
            session_start();
            // On enregistre le login en session
            $_SESSION['login'] = USERNAME;
            // On redirige vers le fichier admin.php
            header('Location: ../pages/page-admin.php');
            exit();
        }
    } else {
        $errorMessage = 'Veuillez inscrire vos identifiants svp !';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <title>Connexion Admin</title>
    <style>
        .error {
            color: #FF0000;
        }
    </style>
</head>

<body>
    <h1 class="titre">Se connecter en Admin</h2>
        <div class="formulaire">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <div class="user">
                    <img src="../img/icone-user.png" alt="user"> <input type="text" name="username" placeholder="Utilisateur">
                    <span class="error"><?php echo $errorUsername; ?> </Span>
                    <br>
                </div>
                <div class="password">
                    <img src="../img/icone-password.png" alt="password"> <input type="password" name="password" placeholder="Mot de passe">
                    <span class="error"><?php echo $errorPasssword; ?> </Span>
                    <br>
                </div>
                <div class="connexion">
                    <input type="submit" value="Connexion">
                </div>
                
            </form>
        </div>
</body>

</html>