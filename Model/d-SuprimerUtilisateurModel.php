<?php
require_once "bdd.php";

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    try {
        $sql = "DELETE FROM user WHERE id_user = ?";
        $stmt = $connexion->prepare($sql);
        
        $stmt->execute([$userId]);

        header("Location: ../View/d-ModificationUtilisateursView.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la suppression de l'utilisateur : " . $e->getMessage();
    }
    
}

echo "ID de l'utilisateur à supprimer non spécifié.";
?>
