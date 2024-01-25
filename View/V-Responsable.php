    <?php session_start(); ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Accueil - Responsable de Secteur</title>
        <!-- Inclure les fichiers CSS de Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Lier votre fichier CSS personnel -->
        <link rel="stylesheet" href="../assets/style-formulaire.css">
    </head>
    <body>
    <img src="../img/logo.png" alt="">
    <div class="container">
        <h2 class="text-center">Tableau de Bord du Responsable de Secteur</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Consulter tous les Comptes-Rendus</h5>
                        <p class="card-text">Consultez les comptes-rendus de visite.</p>
                        <a href="V-Affiche-Tout-CR.php" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
    <!--        <div class="col-md-6 col-lg-4 mb-4">-->
    <!--            <div class="card">-->
    <!--                <div class="card-body">-->
    <!--                    <h5 class="card-title">Consultation des Statistiques</h5>-->
    <!--                    <p class="card-text">Accédez aux statistiques et données de performance.</p>-->
    <!--                    <a href="#" class="btn btn-primary btn-block">Accéder</a>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Suivi des Échantillons</h5>
                        <p class="card-text">Suivez les échantillons de produits médicaux.</p>
                        <a href="#" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Modification des Utilisateurs</h5>
                        <p class="card-text">Administrez les utilisateurs de l'application.</p>
                        <a href="V-Affiche-Modif-User.php" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Créer des utilisateurs</h5>
                        <p class="card-text">Créez des comptes Utilisateurs, Administrateurs, Délégués, Responsables et
                            Praticiens.</p>
                        <a href="V-Inscription.php" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
        <a class="btn-primary" href="../Model/M-Logout.php">Déconnexion</a>
    </div>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
    </html>