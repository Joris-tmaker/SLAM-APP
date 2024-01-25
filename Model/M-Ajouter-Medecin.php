<?php

session_start();

require_once "M-bdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_user = $_SESSION['user']['id_user'];

    // Récupérer les valeurs du formulaire
    $nomMedecin = $_POST['nomMedecin'];
    $specialite = $_POST['specialite'];
    $coordonnee = $_POST['coordonnee'];

    // Requête SQL pour insérer le compte rendu avec l'id_user
    $requete = "INSERT INTO praticien (id_user, nom_du_praticien, specialite, coordonnees) VALUES (?, ?, ?, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([$id_user, $nomMedecin, $specialite, $coordonnee]);

    header("Location: ../View/V-Afficher-Medecin.php");
}
