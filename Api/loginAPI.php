<?php

require_once 'ConnAPI.php';
require_once 'GenerateToken.php';

$email = $_POST["email"];
$password = $_POST["password"];
$requete = "SELECT * FROM user WHERE email = ?";
$stmt = $pdo->prepare($requete);
$stmt->execute([$email]);
$utilisateur = $stmt->fetch();
if ($utilisateur && password_verify($password, $utilisateur['mot_de_passe'])) {

    $requete2 = "UPDATE user SET token = ? WHERE id_user = ?";
    $stmt2 = $pdo->prepare($requete2);
    $stmt2->execute([$token, $utilisateur['id_user']]);

    unset($utilisateur['mot_de_passe'], $utilisateur['token']);
    $json = array("status" => 200, 'message' => "Success", "user" => $utilisateur);
} else {
    $json = array("status" => 400, 'message' => "Error");
}

echo json_encode($json);
$pdo = null;