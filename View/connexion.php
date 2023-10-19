<?php session_start();?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../style.css">
    <title>Page de Connexion</title>
</head>
<body>
<div class="main">
    <img src="../img/cadenas%20(1).png" alt="" class="locker">
    <h1>Connexion</h1>
    <form method="post" action="connexion.php">
        <input class="user" placeholder="Adresse Email" type="email" id="email" name="email" required><br><br>

        <input class="pass" placeholder="Mot de passe" type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <input class="btn" type="submit" name="submit" value="Login">
    </form>
</div>
</body>


<?php

require_once "Model/config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    // Vérifier que tous les champs sont remplis
    if (empty($email) || empty($mot_de_passe)) {
        echo "Tous les champs doivent être remplis.";
    } else {
        // Rechercher l'utilisateur dans la table contact
        $requete = "SELECT * FROM user WHERE email = ?";
        $stmt = $connexion->prepare($requete);
        $stmt->execute([$email]);
        $utilisateur = $stmt->fetch();

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            echo "Vous êtes authentifié !";
            header("Location: index.php");
            exit();
        } else {
            echo "<script type='text/javascript' >window.alert('Pseudo ou mot de passe incorrect') </script>";
        }
    }
}
?>


</html>


