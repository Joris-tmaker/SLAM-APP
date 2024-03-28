<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Compte-Rendu</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">


</head>
<body>
<section>
    <div id="gauche">
        <?php
        // Vérifier le type d'utilisateur
        if (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 8) {
            // Afficher les informations spécifiques au visiteur
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='#'>Echantillons</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-Modif-User.php'>Modification des Utilisateurs</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Inscription.php'>Créer des utilisateurs</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        } elseif (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 9) {
            // Afficher les informations spécifiques au responsable
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'>Nouveaux comptes rendus</a>";
            echo "</li>";
            echo "</ul>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        } elseif
        (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 10) {
            // Afficher les informations spécifiques au responsable
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR-Region.php'>Consulter les comptes rendus de régions</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'>Créer de Nouveaux Comptes-Rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Contre-Visite.php'>Consulter les Contre-Visites Prévues</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajouter-Medecin.php'>Ajouter un nouveau médecin</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Afficher-Medecin.php'>Afficher les médecins</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        }
        ?>
    </div>

    <div class="container">
        <h2>Ajouter un médecin</h2>
        <a href="../index.php">Page d'accueil</a>
        <form action="../Model/M-Ajouter-Medecin.php" method="post">
            <div class="form-group">
                <label for="nomMedecin">Nom du médecin</label>
                <input type="text" class="form-control" id="nomMedecin" name="nomMedecin" required>
            </div>
            <div class="form-group">
                <label for="specialite">Spécialité :</label>
                <input type="text" class="form-control" id="specialite" name="specialite" required>
            </div>
            <div class="form-group">
                <label for="coordonnee">Adresse physique :</label>
                <input type="text" class="form-control" id="coordonnee" name="coordonnee" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</section>

<!-- Inclure les fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
