<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les CR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        /* Style pour chaque élément carré */
        .grid-item {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
            overflow: hidden; /* Limiter le débordement */
            word-wrap: break-word; /* Couper les mots longs */
        }
    </style>
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
        <h2 class="text-center">Tous les comptes rendus</h2>
        <a href="../index.php">Page d'accueil</a>
        <br>
        <?php
        require_once "../Model/M-Affiche-Tout-CR.php";
        ?>
    </div>
</section>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>