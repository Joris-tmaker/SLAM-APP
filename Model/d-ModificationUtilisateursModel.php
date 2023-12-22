<?php
session_start();
require_once 'bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    try {
        $sql = "SELECT id_user, nom, prenom, role FROM user WHERE id_user = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage();
    }
}
?>
