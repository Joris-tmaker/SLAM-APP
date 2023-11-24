<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Administrateur de l'Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <style>
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            overflow: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Tableau de Bord de l'Administrateur de l'Application</h2>
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gestion des Utilisateurs</h5>
                    <p class="card-text">Administrez les utilisateurs de l'application.</p>
                    <a href="save-user.php" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
<!--        <div class="col-md-6 col-lg-4 mb-4">-->
<!--            <div class="card">-->
<!--                <div class="card-body">-->
<!--                    <h5 class="card-title">Gestion des Données</h5>-->
<!--                    <p class="card-text">Administrez et gérez les données de l'application.</p>-->
<!--                    <a href="#" class="btn btn-primary btn-block">Accéder</a>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Créer des utilisateurs</h5>
                    <p class="card-text">Créez des comptes Utilisateurs, Administrateurs, Délégués, Responsables et
                        Praticiens.</p>
                    <a href="inscription.php" class="btn btn-primary btn-block">Accéder</a>
                </div>
            </div>
        </div>
    </div>
    <a class="btn-primary" href="../Model/logout.php">Déconnexion</a>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</div>
</body>
</html>