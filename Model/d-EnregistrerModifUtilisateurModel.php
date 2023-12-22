<?php

require_once 'bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_user"])) {
    $userId = $_POST["id_user"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];

    try {
        $sql = "UPDATE user SET nom = ?, prenom = ?, role = ? WHERE id_user = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$nom, $prenom, $role, $userId]);
        header('Location: ../View/d-UtilisateursView.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement des modifications : " . $e->getMessage();
    }
}
