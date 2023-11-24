<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Accueil - Délégué Régional</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">
</head>
<body>
<div class="container">
    <h2 class="text-center">Tableau de Bord du Délégué Régional</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consulter vos Comptes-Rendus</h5>
                    <p class="card-text">Consultez vos propres comptes-rendus de visite.</p>
                    <a href="affiche-cr.php" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consulter les Comptes-Rendus de Votre Région</h5>
                    <p class="card-text">Consultez les comptes-rendus de visite de votre région.</p>
                    <a href="affiche-cr-region.php" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Créer de Nouveaux Comptes-Rendus</h5>
                    <p class="card-text">Créez de nouveaux comptes-rendus de visite.</p>
                    <a href="compte-rendu.php" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Modifier vos Comptes-Rendus</h5>
                    <p class="card-text">Modifiez vos comptes-rendus de visite existants.</p>
                    <a href="#" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Consulter les Contre-Visites Prévues</h5>
                    <p class="card-text">Consultez les contre-visites prévues pour votre région.</p>
                    <a href="#" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
    </div>
    <a class="btn-primary" href="../Model/logout.php">Déconnexion</a>
</div>

<!-- Inclure les fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>