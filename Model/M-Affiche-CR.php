<?php
require_once "M-bdd.php"; // Assurez-vous que ce fichier contient la connexion à votre base de données

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user'])) {
    $idUser = $_SESSION['user']['id_user']; // Supposons que l'ID de l'utilisateur est stocké dans $_SESSION['user']['id']

    // Requête pour sélectionner les comptes rendus de l'utilisateur connecté
    $sql = "SELECT * FROM compte_rendu_de_visite WHERE id_user = :idUser";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();

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
            echo '<a href="../Model/M-Affiche-Modif-CR.php?id=' . $row['id_cr_cp'] . '" class="btn-modif">Modifier</a>';

            echo '</div>'; // Fin d'un élément carré
        }

        echo '</div>'; // Fin de la grille
    } else {
        echo "Aucun compte rendu trouvé pour cet utilisateur.";
    }
} else {
    echo "Vous devez être connecté pour accéder à cette page.";
}
