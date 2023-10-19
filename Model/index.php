<?php
if (!isset($_SESSION['user'])) {
    echo 'Vous êtes correctement connecter';
    exit;

    if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
        header('Location: connexion.php');
        exit;
    }
}