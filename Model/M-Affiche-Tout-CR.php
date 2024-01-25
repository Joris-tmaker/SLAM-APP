<?php
session_start();
require_once "M-bdd.php"; // Assurez-vous que ce fichier contient la connexion à votre base de données

// Fonction pour afficher tous les comptes rendus
function afficherTousComptesRendus($connexion)
{
    // Requête pour sélectionner tous les comptes rendus
    $sql = "SELECT * FROM compte_rendu_de_visite";
    $stmt = $connexion->query($sql);

    if ($stmt->rowCount() > 0) {
        echo '<div class="grid-container">';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="grid-item">';
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
        echo "Aucun compte rendu trouvé.";
    }
}

// Vérification du tri par région
if (isset($_SESSION['user'])) {
    $id_user = $_SESSION['user']['id_user'];
    $id_region = $_SESSION['user']['id_region'];
    // Récupération des régions depuis la base de données pour le select
    $sqlRegions = "SELECT * FROM region";
    $stmtRegions = $connexion->query($sqlRegions);

    echo '<form method="GET">';
    echo '<label for="region" style="margin-right: 20px">Choisissez une région :</label>';
    echo '<select name="region" id="region">';
    echo '<option value="">Toutes les régions</option>';

    while ($row = $stmtRegions->fetch(PDO::FETCH_ASSOC)) {
        $selected = ($row['id_region'] == $_GET['region']) ? 'selected' : '';
        echo '<option value="' . $row['id_region'] . '" ' . $selected . '>' . $row['region'] . '</option>';
    }

    echo '</select>';
    echo '<input type="submit" value="Filtrer">';
    echo '</form>';

    if (isset($_GET['region']) && $_GET['region'] != '') {
        $id_region = $_GET['region'];

        // Requête pour sélectionner les comptes rendus de l'utilisateur pour une région spécifique
        $sql = "SELECT * FROM user u INNER JOIN compte_rendu_de_visite cr ON u.id_user = cr.id_user WHERE id_region = :id_region";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':id_region', $id_region, PDO::PARAM_INT); // Assurez-vous que l'ID de région est un entier
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo '<h2>Comptes Rendus pour la Région ' . $id_region . '</h2>';
            echo '<div class="grid-container">';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="grid-item">';
                echo "<p><strong>Date Visite:</strong> " . $row['date_de_la_visite'] . "</p>";
                echo "<p><strong>Date Contre-Visite:</strong> " . $row['date_de_contre_visite'] . "</p>";
                echo "<p><strong>Motif:</strong> " . $row['motif_de_la_visite'] . "</p>";
                echo "<p><strong>Remarques:</strong> " . $row['remarques'] . "</p>";
                echo "<p><strong>Nom Praticien:</strong> " . $row['nom_du_praticien'] . "</p>";
                echo "<p><strong>Produit:</strong> " . $row['produit'] . "</p>";
                echo "<p><strong>Refus:</strong> " . ($row['refus'] ? 'Oui' : 'Non') . "</p>";
                echo "<p><strong>Quantité Distribuée :</strong> " . $row['quantite_distribuee'] . "</p>";
                echo '</div>';
            }
            echo '</div>';
        } else {
            echo "Aucun compte rendu trouvé pour cette région .";
        }
    } else {
        echo '<h2>Tous les Comptes Rendus</h2>';
        afficherTousComptesRendus($connexion); // Affichage de tous les comptes rendus
    }
} else {
    echo "Veuillez vous connecter pour voir les comptes rendus.";
}
?>
