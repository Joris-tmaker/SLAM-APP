<?php session_start();

require_once '../Model/M-bdd.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
<section>
    <?php include 'gauche.php'; ?>
    <div id="droite">
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

                    <br>

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
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>