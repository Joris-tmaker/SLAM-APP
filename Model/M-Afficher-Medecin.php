<?php
require_once "M-bdd.php";

if (isset($_SESSION['user'])) {
    $idUser = $_SESSION['user']['id_user'];

    $requete = "SELECT * FROM praticien WHERE id_user = :idUser";
    $stmt = $connexion->prepare($requete);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<div class="grid-container">';

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<div class="grid-item">';
            echo "<p><strong>Nom :</strong> " . $row['nom_du_praticien'] . "</p>";
            echo "<p><strong>Spécialité :</strong> " . $row['specialite'] . "</p>";
            echo "<p><strong>Adresse :</strong> " . $row['coordonnees'] . "</p>";
            echo '</div>';
        }

        echo '</div>';
    } else {
        echo "Aucun compte rendu trouvé pour cet utilisateur.";
    }
} else {
    echo "Vous devez être connecté pour accéder à cette page.";
}
