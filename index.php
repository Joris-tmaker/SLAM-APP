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
    echo '<div id="btn-index">';
    echo '<img src="img/logo.png">';
    echo '<a href="View/V-Connexion.php" class="btn-index">Connexion</a>';
    echo '<a href="app-gsb.apk" class="apk">Download APK mobile</a>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Index</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/style-formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
