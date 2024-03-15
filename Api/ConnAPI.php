<?php

header("Content-Type: application/json");

$host = "localhost";
$dbname = "compterendu";
$username = "root";
$password = "";
$bdd = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($bdd, $username, $password, $options);
} catch (PDOException $e) {
    $err = $e->getMessage();
    echo json_encode(array("statut" => 500, "message" => $err));
    die();
}
