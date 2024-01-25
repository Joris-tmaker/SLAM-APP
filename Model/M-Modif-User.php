<?php
require_once 'M-bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_user"])) {
    $userId = $_POST["id_user"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];
    $region = $_POST["region"];

    try {
        $sql = "UPDATE user SET nom = ?, prenom = ?, role = ?, id_region = ? WHERE id_user = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$nom, $prenom, $role,$region, $userId]);
        header('Location: ../View/V-Affiche-Modif-User.php');
        exit;
    } catch (PDOException $e) {
        echo "Erreur lors de l'enregistrement des modifications : " . $e->getMessage();
    }
}
