<?php

require_once "M-bdd.php"; // Assurez-vous que ce fichier contient la connexion à votre base de données

if (isset($_SESSION['user'])) {

    $id_user = $_SESSION['user']['id_user'];
    $id_region = $_SESSION['user']['id_region'];

    // Requête pour sélectionner les comptes rendus de l'utilisateur pour sa région
    $sql = "SELECT * FROM user u INNER JOIN compte_rendu_de_visite cr ON u.id_user = cr.id_user WHERE id_region = :id_region;";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':id_region', $id_region);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<div class="grid-container">';

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
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo "Aucun compte rendu trouvé pour cette région.";
    }
} else {
    echo "Veuillez vous connecter pour voir les comptes rendus.";
}

