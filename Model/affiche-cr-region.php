<?php

session_start();
require_once "bdd.php"; // Assurez-vous que ce fichier contient la connexion à votre base de données

// Requête pour sélectionner tous les comptes rendus
$sql = "SELECT * FROM compte_rendu_de_visite";
$stmt = $connexion->query($sql);

// Vérifier s'il y a des résultats
if ($stmt->rowCount() > 0) {
    echo '<div class="grid-container">'; // Commencer la grille

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo '<div class="grid-item">'; // Début d'un élément carré
        echo "<p><strong>Date Visite:</strong> " . $row['date_de_la_visite'] . "</p>";
        echo "<p><strong>Date Contre-Visite:</strong> " . $row['date_de_contre_visite'] . "</p>";
        echo "<p><strong>Motif:</strong> " . $row['motif_de_la_visite'] . "</p>";
        echo "<p><strong>Remarques:</strong> " . $row['remarques'] . "</p>";
        echo "<p><strong>Nom Praticien:</strong> " . $row['nom_du_praticien'] . "</p>";
        echo "<p><strong>Produit:</strong> " . $row['produit'] . "</p>";
        echo "<p><strong>Refus:</strong> " . ($row['refus'] ? 'Oui' : 'Non') . "</p>";
        echo "<p><strong>Quantité Distribuée:</strong> " . $row['quantite_distribuee'] . "</p>";
        echo '</div>'; // Fin d'un élément carré
    }

    echo '</div>'; // Fin de la grille
} else {
    echo "Aucun compte rendu trouvé dans la base de données.";
}