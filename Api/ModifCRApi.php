<?php

require_once 'ConnAPI.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_cr_cp"])) {
        $idCrCp = $_POST["id_cr_cp"];
        $dateVisite = $_POST["date_de_la_visite"];
        $dateContreVisite = $_POST["date_de_contre_visite"];
        $motifVisite = $_POST["motif_de_la_visite"];
        $nomPraticien = $_POST["nom_du_praticien"];
        $produit = $_POST["produit"];
        $refus_produit = ($_POST['refus']);
        $quantiteDistribuee = $_POST["quantite_distribuee"];
        $remarques = $_POST["remarques"];

        $sql = "UPDATE compte_rendu_de_visite SET date_de_la_visite = ?, date_de_contre_visite = ?, motif_de_la_visite = ?, nom_du_praticien = ?, produit = ?, refus = ?, quantite_distribuee =?, remarques = ? WHERE id_cr_cp = ?";
        $requete = $pdo->prepare($sql);
        $requete->execute([$dateVisite, $dateContreVisite, $motifVisite, $nomPraticien, $produit, $refus_produit, $quantiteDistribuee, $remarques, $idCrCp]);

        $jsonResponse = array("status" => 200, 'message' => "Compte rendu modifié avec succès");
    } else {
        $jsonResponse = array("status" => 400, 'message' => "Paramètres manquants dans la requête.");
    }
} else {
    $jsonResponse = array("status" => 400, 'message' => "Méthode non autorisée, utilisez la méthode POST.");
}

echo json_encode($jsonResponse);
$pdo = null;