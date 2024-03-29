<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Compte-Rendu</title>
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">


</head>
<body>
<section>
    <div id="gauche">
        <?php
        if (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 8) {
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'><i class='fa-regular fa-file' style='color: #C56752;'></i>Mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='#'><i class='fa-solid fa-vials' style='color: #C56752;'></i>Echantillons</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-Modif-User.php'><i class='fa-regular fa-pen-to-square' style='color: #C56752;'></i>Modification utilisateurs</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Inscription.php'><i class='fa-solid fa-plus' style='color: #C56752;'></i>Créer utilisateurs</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
            echo "<p>© GSB 2024. Droits réservés.</p>";
        } elseif (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 9) {
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'><i class='fa-regular fa-file' style='color: #C56752;'></i>Mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'><i class='fa-solid fa-plus' style='color: #C56752;'></i>Nouveaux comptes-rendus</a>";
            echo "</li>";
            echo "</ul>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
            echo "<p>© GSB 2024. Droits réservés.</p>";
        } elseif
        (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 10) {
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'><i class='fa-regular fa-file' style='color: #C56752;'></i>Mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR-Region.php'><i class='fa-solid fa-file' style='color: #C56752;'></i>Comptes rendus de régions</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'><i class='fa-solid fa-plus' style='color: #C56752;'></i>Nouveaux comptes-rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Contre-Visite.php'><i class='fa-solid fa-eye' style='color: #C56752;'></i>Contre-Visites</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajouter-Medecin.php'><i class='fa-regular fa-plus' style='color: #C56752;'></i>Nouveau médecin</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Afficher-Medecin.php'><i class='fa-solid fa-head-side-mask' style='color: #C56752;'></i>Médecins</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
            echo "<p>© GSB 2024. Droits réservés.</p>";
        }
        ?>
    </div>

    <div class="container-fluid">
        <h2>Ajouter un médecin</h2>
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
