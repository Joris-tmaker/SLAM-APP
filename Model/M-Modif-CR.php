<?php
session_start();
require_once "M-bdd.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user'])) {
    // Récupérer les valeurs du formulaiid_cr_cpre
    $id_cr_cp = $_POST['id_cr_cp'];
    $date_visite = $_POST['dateVisite'];
    $date_contre_visite = $_POST['dateContreVisite'];
    $motif_visite = $_POST['motifVisite'];
    $remarques = $_POST['remarques'];
    $nom_praticien = $_POST['nomPraticien'];
    $produit = $_POST['produit'];
    $refus_produit = isset($_POST['refusProduit']) ? 1 : 0;
    $quantite_distribuee = $_POST['quantiteDistribuee'];

    // Requête SQL pour mettre à jour le compte rendu
    $sql = "UPDATE compte_rendu_de_visite SET
            date_de_la_visite = :date_visite,
            date_de_contre_visite = :date_contre_visite,
            motif_de_la_visite = :motif_visite,
            remarques = :remarques,
            nom_du_praticien = :nom_praticien,
            produit = :produit,
            refus = :refus_produit,
            quantite_distribuee = :quantite_distribuee
            WHERE id_cr_cp = :id_cr_cp AND id_user = :id_user";

    $stmt = $connexion->prepare($sql);
    
    // Liaison des paramètres
    $stmt->bindParam(':id_cr_cp', $id_cr_cp);
    $stmt->bindParam(':id_user', $_SESSION['user']['id_user']);
    $stmt->bindParam(':date_visite', $date_visite);
    $stmt->bindParam(':date_contre_visite', $date_contre_visite);
    $stmt->bindParam(':motif_visite', $motif_visite);
    $stmt->bindParam(':remarques', $remarques);
    $stmt->bindParam(':nom_praticien', $nom_praticien);
    $stmt->bindParam(':produit', $produit);
    $stmt->bindParam(':refus_produit', $refus_produit, PDO::PARAM_INT);
    $stmt->bindParam(':quantite_distribuee', $quantite_distribuee);

    // Exécution de la requête
    if ($stmt->execute()) {
        echo "Les modifications ont été enregistrées avec succès.";
        header("Location: ../View/V-Affiche-CR.php");
    } else {
        echo "Erreur lors de l'enregistrement des modifications : " . $stmt->errorInfo()[2];
    }

} else {
    echo "Une erreur s'est produite lors du traitement du formulaire.";
}
