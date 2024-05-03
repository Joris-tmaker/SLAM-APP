<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulaire de Compte-Rendu</title>
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section>
    <?php include 'gauche.php'; ?>
    <div id="droite">
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
                <button type="submit" class="btn btn-modif">Ajouter</button>
            </form>
        </div>
    </div>
</section>

<!-- Inclure les fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
