<?php

session_start();

require_once "bdd.php";

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

        $_SESSION['user'] = $utilisateur;

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
            echo "Vous êtes authentifié !";
            header("Location: ../View/homepage.php");
            exit();
        } else {
            echo "<script type='text/javascript' >window.alert('Pseudo ou mot de passe incorrect') </script>";
        }
    }
}