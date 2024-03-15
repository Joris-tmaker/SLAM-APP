<?php

require_once 'ConnAPI.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["id_cr_cp"])) {
        $idCrCp = $_POST["id_cr_cp"];

        $sql = "DELETE FROM compte_rendu_de_visite WHERE id_cr_cp = ?";
        $requete = $pdo->prepare($sql);
        $requete->execute([$idCrCp]);

        $jsonResponse = array("status" => 200, 'message' => "Compte rendu supprimé avec succès");
    } else {
        $jsonResponse = array("status" => 400, 'message' => "Paramètres manquants dans la requête.");
    }
} else {
    $jsonResponse = array("status" => 400, 'message' => "Méthode non autorisée, utilisez la méthode POST.");
}

echo json_encode($jsonResponse);
$pdo = null;


//require_once 'ConnAPI.php';
//
//// Fonction pour vérifier la validité d'un token
//function isValidToken($pdo, $token)
//{
//    $sql = "SELECT * FROM user WHERE token = ?";
//    $requete = $pdo->prepare($sql);
//    return $requete->execute([$token]);
//}

//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    if (isset($_POST["id_cr_cp"]) && isset($_SERVER['HTTP_AUTHORIZATION'])) {
//        $idCrCp = $_POST["id_cr_cp"];
//        $token = $_SERVER['HTTP_AUTHORIZATION'];
//
//        // Vérifie si le token est valide
//        if (isValidToken($pdo, $token)) {
//            $sql = "DELETE FROM compte_rendu_de_visite WHERE id_cr_cp = ?";
//            $requete = $pdo->prepare($sql);
//            $requete->execute([$idCrCp]);
//
//            $jsonResponse = array("status" => 200, 'message' => "Compte rendu supprimé avec succès");
//        } else {
//            $jsonResponse = array("status" => 400, 'message' => "Accès non autorisé. Token invalide.");
//        }
//    } else {
//        $jsonResponse = array("status" => 400, 'message' => "Paramètres manquants dans la requête.");
//    }
//} else {
//    $jsonResponse = array("status" => 400, 'message' => "Méthode non autorisée, utilisez la méthode POST.");
//}
//
//echo json_encode($jsonResponse);
//$pdo = null;
//
