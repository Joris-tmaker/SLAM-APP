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
<div class="container">
    <h2>Ajouter un médecin</h2>
    <form action="../Model/ajouter-medecin.php" method="post">
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

<!-- Inclure les fichiers JavaScript de Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
