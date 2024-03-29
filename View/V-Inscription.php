<?php session_start();

require_once '../Model/M-bdd.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <meta charset="UTF-8">
    <title>Inscription</title>
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
        <h2>Inscription</h2>
        <form action="../Model/M-Inscription.php" method="post">
            <div class="form-group">
                <label for="nom">Nom :</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="prenom">Prénom :</label>
                <input class="form-control" type="text" id="prenom" name="prenom" required>
            </div>
            <div class="form-group">
                <label for="email">Email :</label>
                <input class="form-control" type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="mot_de_passe">Mot de passe :</label>
                <input class="form-control" type="password" id="mot_de_passe" name="mot_de_passe" required>
            </div>
            <div class="form-group">
                <label for="praticien">Nom du Praticien :</label>
                <input type="text" class="form-control" id="nomPraticien" name="nomPraticien">
            </div>
            <div class="form-group">
                <label for="role">Rôle :</label>
                <input class="pass" placeholder="Role" type="text" id="role" name="role" required>

                <label style="padding-top: 20px; padding-bottom: 20px" for="region">Région :</label>
                <select id="region" name="region">
                    <?php

                    $query = "SELECT id_region, region FROM region";
                    $stmt = $connexion->query($query);

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . $row["id_region"] . "'>" . $row["region"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>