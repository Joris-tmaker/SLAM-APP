<?php
require_once "../Model/M-bdd.php";
try {
    $sql = "SELECT r.region, COUNT(crv.id_cr_cp) AS nombre_de_comptes_rendus
            FROM region r
            LEFT JOIN user u ON r.id_region = u.id_region
            LEFT JOIN compte_rendu_de_visite crv ON u.id_user = crv.id_user
            GROUP BY r.region";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $data = array();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = array(
            "region" => $row["region"],
            "nombre_de_comptes_rendus" => intval($row["nombre_de_comptes_rendus"])
        );
    }
    header('Content-Type: application/json');
    echo json_encode($data);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(array("message" => "Une erreur s'est produite lors de la récupération des données: " . $e->getMessage()));
}
$connexion = null;