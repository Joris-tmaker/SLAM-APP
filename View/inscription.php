<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="../assets/style.css">
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<div class="main">
    <img src="../img/cadenas%20(1).png" alt="" class="locker">
    <h1>Inscription</h1>
    <form action="../Model/inscription.php" method="post">

        <input class="pass" placeholder="Nom" type="text" id="nom" name="nom" required><br><br>

        <input class="pass" placeholder="Prénom" type="text" id="prenom" name="prenom" required><br><br>

        <input class="pass" placeholder="Adresse Email" type="email" id="email" name="email" required><br><br>

        <input class="pass" placeholder="Mot de passe" type="password" id="mot_de_passe" name="mot_de_passe" required><br><br>

        <input class="btn" type="submit" value="S'inscrire">
    </form>
</div>

</body>
</html>