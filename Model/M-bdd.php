<?php

$host = 'localhost';
$bdname = 'compterendu';
$user = 'root';
$mdp = '';
$charset = 'utf8';

$database = "mysql:host=$host;dbname=$bdname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $connexion = new PDO($database, $user, $mdp, $options);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}