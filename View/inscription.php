<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../style.css">
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<div class="main">
    <img src="../img/cadenas%20(1).png" alt="" class="locker">
    <h1>Inscription</h1>
    <form action="inscription.php" method="post">

        <input class="pass" placeholder="Nom" type="text" id="nom" name="nom" required><br><br>

        <input class="pass" placeholder="Prénom" type="text" id="prenom" name="prenom" required><br><br>

        <input class="pass" placeholder="Adresse Email" type="email" id="email" name="email" required><br><br>

        <input class="pass" placeholder="Mot de passe" type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <input class="btn" type="submit" value="S'inscrire">
    </form>
</div>

</body>
<?php

require_once 'Model/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    $hashmotdepasse = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Vérifier que tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($email) ||  empty($mot_de_passe)) {
        echo "Tous les champs doivent être remplis.";
    } else {
        // Insérer les données de l'utilisateur dans la table contact
        $requete = "INSERT INTO user (nom, prenom, email, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $connexion->prepare($requete);
        $stmt->execute([$nom, $prenom, $email, $hashmotdepasse]);
        echo "Inscription réussie !";
        header("Location: connexion.php");
        exit();
    }
}

?>
</html>