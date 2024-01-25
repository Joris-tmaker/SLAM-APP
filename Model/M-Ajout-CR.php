<?php

session_start();

require_once "M-bdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer l'id de l'utilisateur depuis la session
    $id_user = $_SESSION['user']['id_user'];

    // Récupérer les valeurs du formulaire
    $date_visite = $_POST['dateVisite'];
    $date_contre_visite = $_POST['dateContreVisite'];
    $motif_visite = $_POST['motifVisite'];
    $remarques = $_POST['remarques'];
    $nom_praticien = $_POST['nomPraticien'];
    $produit = $_POST['produit'];
    $refus_produit = isset($_POST['refusProduit']) ? 1 : 0; // 1 si coché, 0 sinon
    $quantite_distribuee = $_POST['quantiteDistribuee'];

    // Requête SQL pour insérer le compte rendu avec l'id_user
    $requete = "INSERT INTO compte_rendu_de_visite (id_user, date_de_la_visite, date_de_contre_visite, motif_de_la_visite, remarques, nom_du_praticien, produit, refus, quantite_distribuee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([$id_user, $date_visite, $date_contre_visite, $motif_visite, $remarques, $nom_praticien, $produit, $refus_produit, $quantite_distribuee]);

    header("Location: ../index.php");
}
