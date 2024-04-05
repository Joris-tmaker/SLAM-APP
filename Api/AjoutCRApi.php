<?php

require_once 'ConnAPI.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_user"])) {
        $idUser = $_POST["id_user"];
        $dateVisite = $_POST["date_de_la_visite"];
        $dateContreVisite = $_POST["date_de_contre_visite"];
        $motifVisite = $_POST["motif_de_la_visite"];
        $remarques = $_POST["remarques"];
        $nomPraticien = $_POST["nom_du_praticien"];
        $produit = $_POST["produit"];
        $refus_produit = isset($_POST['refusProduit']) ? 1 : 0;
        $quantiteDistribuee = $_POST["quantite_distribuee"];

        //var_dump($_POST);

        $sql = "INSERT INTO compte_rendu_de_visite (id_user, date_de_la_visite, date_de_contre_visite, motif_de_la_visite, remarques, nom_du_praticien, produit, refus, quantite_distribuee) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $requete = $pdo->prepare($sql);
        $requete->execute([$idUser, $dateVisite, date($dateContreVisite), $motifVisite, $remarques, $nomPraticien, $produit, $refus_produit, $quantiteDistribuee]);

        $jsonResponse = array("status" => 200, 'message' => "Compte rendu ajouté avec succès");
    } else {
        $jsonResponse = array("status" => 400, 'message' => "Paramètres manquants dans la requête.");
    }
} else {
    $jsonResponse = array("status" => 400, 'message' => "Méthode non autorisée, utilisez la méthode POST.");
}

echo json_encode($jsonResponse);
$pdo = null;