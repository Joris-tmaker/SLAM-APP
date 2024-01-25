<?php session_start();

require_once '../Model/M-bdd.php' ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../assets/style.css">
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<div id="utilisateur" class="main">
    <img src="../img/cadenas%20(1).png" alt="" class="locker">
    <h1>Ajout utilisateur</h1>
    <form action="../Model/M-Inscription.php" method="post">

        <input class="pass" placeholder="Nom" type="text" id="nom" name="nom" required><br><br>

        <input class="pass" placeholder="Prénom" type="text" id="prenom" name="prenom" required><br><br>

        <input class="pass" placeholder="Adresse Email" type="email" id="email" name="email" required><br><br>

        <input class="pass" placeholder="Mot de passe" type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <input class="pass" placeholder="Role" type="text" id="role" name="role" required><br><br>

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


        <input class="btn" type="submit" value="S'inscrire">

        <a href="../index.php">Page d'accueil</a>
    </form>
</div>

</body>
</html>