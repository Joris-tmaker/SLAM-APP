<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les CR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <link rel="stylesheet" href="../assets/responsive.css">
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
    <?php include 'gauche.php'; ?>
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