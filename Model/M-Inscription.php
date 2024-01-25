<?php

session_start();

require_once 'M-bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];
    $role = $_POST["role"];
    $region = $_POST["region"];

    $hashmotdepasse = password_hash($mot_de_passe, PASSWORD_DEFAULT);

    // Vérifier que tous les champs sont remplis
    if (empty($nom) || empty($prenom) || empty($email) ||  empty($mot_de_passe) ||  empty($role) ||  empty($region)) {
        echo "Tous les champs doivent être remplis.";
    } else {
        // Insérer les données de l'utilisateur dans la table contact
        $requete = "INSERT INTO user (nom, prenom, email, mot_de_passe, role, id_region) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($requete);
        $stmt->execute([$nom, $prenom, $email, $hashmotdepasse, $role, $region]);
        $utilisateur = $stmt->fetch();

        $_SESSION['user'] = $utilisateur;

        header("Location: ../index.php");
        exit();
    }
}