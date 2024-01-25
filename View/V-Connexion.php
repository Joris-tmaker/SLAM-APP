<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../assets/style.css">
    <title>Page de Connexion</title>
</head>
<body>
<div class="main">
    <img src="../img/cadenas%20(1).png" alt="" class="locker">
    <h1>Connexion</h1>
    <form method="post" action="../Model/M-connexion.php">
        <input class="user" placeholder="Adresse Email" type="email" id="email" name="email" required><br><br>

        <input class="pass" placeholder="Mot de passe" type="password" id="mot_de_passe" name="mot_de_passe"
               required><br><br>

        <input class="btn" type="submit" name="submit" value="Connexion">
    </form>
    <a href="../Model/M-Logout.php">Déconnexion</a>
</div>
</body>
</html>


