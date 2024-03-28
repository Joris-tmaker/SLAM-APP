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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Contre-Visites</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <style>
        h1, h2 {
            text-align:left;
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
    <div id="gauche">
        <?php
        // Vérifier le type d'utilisateur
        if (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 8) {
            // Afficher les informations spécifiques au visiteur
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='#'>Echantillons</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-Modif-User.php'>Modification des Utilisateurs</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Inscription.php'>Créer des utilisateurs</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        } elseif (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 9) {
            // Afficher les informations spécifiques au responsable
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'>Nouveaux comptes rendus</a>";
            echo "</li>";
            echo "</ul>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        } elseif
        (isset($_SESSION['user']['id_user']) && $_SESSION['user']['id_user'] === 10) {
            // Afficher les informations spécifiques au responsable
            echo "<div class='head-gauche'>";
            echo "<img src='../img/logo.png' alt='Logo'>";
            echo "<h5>Application de gestion de compte rendu</h5>";
            echo "</div>";
            echo "<ul class='nav flex-column'>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Affiche-CR-Region.php'>Consulter les comptes rendus de régions</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajout-CR.php'>Créer de Nouveaux Comptes-Rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Contre-Visite.php'>Consulter les Contre-Visites Prévues</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Ajouter-Medecin.php'>Ajouter un nouveau médecin</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='V-Afficher-Medecin.php'>Afficher les médecins</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        }
        ?>
    </div>
    <h1>Liste des Contre-Visites</h1>
    <a href="../index.php">Page d'accueil</a>

    <!-- Formulaire pour filtrer par région -->
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

    <!-- Affichage des contre-visites par défaut -->
    <?php if (!$filterApplied) : ?>
        <h2>Toutes les contre-visites :</h2>
        <div class="grid-container">
            <?php foreach ($contreVisitesAll as $contreVisite) : ?>
                <div class="grid-item">
                    <h3><?= $contreVisite['nom_du_praticien']; ?></h3>
                    <p><strong>Date de la Visite:</strong> <?= $contreVisite['date_de_la_visite']; ?></p>
                    <p><strong>Date de Contre-Visite:</strong> <?= $contreVisite['date_de_contre_visite']; ?></p>
                    <p><strong>Motif:</strong> <?= $contreVisite['motif_de_la_visite']; ?></p>
                    <p><strong>Nom de l'Utilisateur:</strong> <?= $contreVisite['nom_utilisateur'] . ' ' . $contreVisite['prenom_utilisateur']; ?></p>
                    <p><strong>Région:</strong> <?= $contreVisite['region']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Affichage des contre-visites filtrées par région -->
    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && $contreVisitesFiltered) : ?>
        <h2>Contre-visites filtrées par région :</h2>
        <div class="cards-container">
            <?php foreach ($contreVisitesFiltered as $contreVisite) : ?>
                <div class="card">
                    <h3><?= $contreVisite['nom_du_praticien']; ?></h3>
                    <p><strong>Date de la Visite:</strong> <?= $contreVisite['date_de_la_visite']; ?></p>
                    <p><strong>Date de Contre-Visite:</strong> <?= $contreVisite['date_de_contre_visite']; ?></p>
                    <p><strong>Motif:</strong> <?= $contreVisite['motif_de_la_visite']; ?></p>
                    <p><strong>Nom de l'Utilisateur:</strong> <?= $contreVisite['nom_utilisateur'] . ' ' . $contreVisite['prenom_utilisateur']; ?></p>
                    <p><strong>Région:</strong> <?= $contreVisite['region']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
