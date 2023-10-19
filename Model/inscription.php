<?php

require_once 'config.php';

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
        header("Location: ../View/connexion.php");
        exit();
    }
}