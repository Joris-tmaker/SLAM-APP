<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
</head>
<body>
<section><?php include('gauche.php'); ?>
    <div id="droite">
        <div class="container-fluid"><h2>Graphique à Barres</h2>
            <canvas id="barChart" width="200" height="100"></canvas>
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/script.js"></script>
</body>
</html>