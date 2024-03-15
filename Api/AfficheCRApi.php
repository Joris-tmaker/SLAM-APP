<?php

require_once 'ConnAPI.php';

if (isset($_POST["id"])) {
    $idUser = $_POST["id"];

    $sql = "SELECT * FROM compte_rendu_de_visite WHERE id_user = ?";
    $requete = $pdo->prepare($sql);
    $requete->execute([$idUser]);
    $cr = $requete->fetchAll();

    if ($cr) {
        $jsonResponse = array("status" => 200, 'message' => "Success", "comptesRendus" => $cr);
    } else {
        $jsonResponse = array("status" => 400, 'message' => "Aucun compte rendu trouvé pour cet utilisateur.");
    }

    echo json_encode($jsonResponse);
    $pdo = null;
}