<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Visiteur Médical</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">
</head>
<body>
<section>
    <div id="gauche">
        <div class="head-gauche">
            <img src="../img/logo.png" alt="Logo">
            <h5>Application de gestion de compte rendu</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="V-Affiche-CR.php">Consulter mes comptes rendus</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="V-Ajout-CR.php">Nouveaux comptes rendus</a>
            </li>
        </ul>
        <a class="btn btn-primary" href="../Model/M-Logout.php">Déconnexion</a>
    </div>
    <div class="container" id="droite">
        <h2 class="text-center">Tableau de Bord du Visiteur Médical</h2>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consulter vos Comptes-Rendus</h5>
                        <p class="card-text">Consultez vos propres comptes-rendus de visite.</p>
                        <a href="V-Affiche-CR.php" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Créer de nouveaux Comptes-Rendus</h5>
                        <p class="card-text">Créez de nouveaux comptes-rendus de visite.</p>
                        <a href="V-Ajout-CR.php" class="btn btn-primary btn-block">Créer</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn-primary" href="../Model/M-Logout.php">Déconnexion</a>
    </div>
</section>

<!-- Inclure les fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>