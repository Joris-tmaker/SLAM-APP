<?php

session_start();

if (!empty($_SESSION['user'])) {
    $role = $_SESSION['user']['role'];
//    var_dump($role);die();

    switch ($role) {
        case 'role_delegue':
            header('Location: Controller/DelegueController.php');
            exit;
        case 'role_responsable':
            header('Location: Controller/ResponsableController.php');
            exit;
        case 'role_visiteur':
            header('Location: Controller/VisiteurController.php');
            exit;
        default:
            header('Location: View/M-V-Connexion.php'); // Redirection par défaut si le rôle n'est pas géré
            exit;
    }
} else {
    header('Location: View/V-Connexion.php');
    exit;
}