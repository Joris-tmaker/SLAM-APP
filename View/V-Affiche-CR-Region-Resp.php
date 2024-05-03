<?php
session_start();
require_once('../Model/M-bdd.php');

// Récupérer la liste des régions
$queryRegions = "SELECT * FROM region";
$resultRegions = $connexion->query($queryRegions);
$regions = $resultRegions->fetchAll(PDO::FETCH_ASSOC);

// Initialiser la variable pour déterminer si le filtre a été appliqué
$filterApplied = false;

// Requête SQL pour récupérer toutes les contre-visites (en excluant celles avec la date '0000-00-00')
$queryAll = "SELECT c.*, u.nom AS nom_utilisateur, u.prenom AS prenom_utilisateur, r.region
             FROM compte_rendu_de_visite c
             INNER JOIN user u ON c.id_user = u.id_user
             LEFT JOIN region r ON u.id_region = r.id_region
             WHERE r.id_region = :userRegion
             AND c.date_de_contre_visite != '0000-00-00'";
$stmtAll = $connexion->prepare($queryAll);
$stmtAll->bindParam(':userRegion', $userRegion['id_region'], PDO::PARAM_INT);
$stmtAll->execute();
$contreVisitesAll = $stmtAll->fetchAll(PDO::FETCH_ASSOC);

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer la région sélectionnée
    $selectedRegion = isset($_POST['region']) ? $_POST['region'] : null;

    // Requête SQL pour récupérer les contre-visites de la région sélectionnée (en excluant celles avec la date '0000-00-00')
    $query = "SELECT c.*, u.nom AS nom_utilisateur, u.prenom AS prenom_utilisateur, r.region
              FROM compte_rendu_de_visite c
              INNER JOIN user u ON c.id_user = u.id_user
              LEFT JOIN region r ON u.id_region = r.id_region
              WHERE r.id_region = :selectedRegion
              AND c.date_de_contre_visite != '0000-00-00'";

    $stmt = $connexion->prepare($query);
    $stmt->bindParam(':selectedRegion', $selectedRegion, PDO::PARAM_INT);
    $stmt->execute();

    $contreVisitesFiltered = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Mettre à jour la variable pour indiquer que le filtre a été appliqué
    $filterApplied = true;
} else {
    $contreVisitesFiltered = []; // Aucune région sélectionnée par défaut
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contre-Visites</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        h1, h2 {
            text-align: left;
        }

        .cards-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 10px;
            width: 300px;
        }

        .card h3 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
<section>
    <?php include 'gauche.php'; ?>
    <div id="droite">
        <div class="container-fluid">
            <h1>Liste des Comptes Rendus par Région</h1>

            <form method="post">
                <label for="region">Filtrer par région :</label>
                <select name="region" id="region">
                    <option value="">Toutes les régions</option>
                    <?php foreach ($regions as $region) : ?>
                        <option value="<?= $region['id_region']; ?>"><?= $region['region']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit">Filtrer</button>
            </form>

            <!-- Affichage des contre-visites filtrées par région -->
            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $contreVisitesFiltered) : ?>
                <h2>Comptes Rendus par région :</h2>
                <div class="cards-container">
                    <?php foreach ($contreVisitesFiltered as $contreVisite) : ?>
                        <div class="card">
                            <h3><?= $contreVisite['nom_du_praticien']; ?></h3>
                            <p><strong>Date de la Visite:</strong> <?= $contreVisite['date_de_la_visite']; ?></p>
                            <p><strong>Date de Contre-Visite:</strong> <?= $contreVisite['date_de_contre_visite']; ?>
                            </p>
                            <p><strong>Motif:</strong> <?= $contreVisite['motif_de_la_visite']; ?></p>
                            <p><strong>Nom de
                                    l'Utilisateur:</strong> <?= $contreVisite['nom_utilisateur'] . ' ' . $contreVisite['prenom_utilisateur']; ?>
                            </p>
                            <p><strong>Région:</strong> <?= $contreVisite['region']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>