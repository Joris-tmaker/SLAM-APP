<div id="gauche">
    <?php

    if (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'role_responsable') {
        echo "<div class='head-gauche'>";
        echo "<img src='../img/logo.png' alt='Logo'>";
        echo "</div>";
        echo "<ul class='nav flex-column'>";
        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='V-Affiche-CR-Region-Resp.php'><i class='fa-regular fa-file' style='color: #C56752;'></i>Comptes rendus par régions</a>";
        echo "</li>";
        echo "<li class='nav-item'>";
        echo "<a class='nav-link' href='V-Statistiques.php'><i class='fa-solid fa-chart-column' style='color: #c56752;'></i>Statistiques</a>";
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
    } elseif (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'role_visiteur') {
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
    (isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'role_delegue') {
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