<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Compte-Rendu</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    

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
    <div class="container">
        <h2>Compte-Rendu de Visite</h2>
        <a href="../index.php">Page d'accueil</a>
        <form action="../Model/M-Ajout-CR.php" method="post">
            <div class="form-group">
                <label for="date_visite">Date de la Visite :</label>
                <input type="date" class="form-control" id="dateVisite" name="dateVisite">
            </div>
            <div class="form-group">
                <label for="date_contre_visite">Date de Contre-Visite :</label>
                <input type="date" class="form-control" id="dateContreVisite" name="dateContreVisite">
            </div>
            <div class="form-group">
                <label for="motif_visite">Motif de la Visite :</label>
                <input type="text" class="form-control" id="motifVisite" name="motifVisite">
            </div>
            <div class="form-group">
                <label for="remarques">Remarques :</label>
                <textarea class="form-control" id="remarques" name="remarques" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="praticien">Nom du Praticien :</label>
                <input type="text" class="form-control" id="nomPraticien" name="nomPraticien">
            </div>
            <div class="form-group">
                <label>Produit :</label>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="refusProduit" name="refusProduit">
                    <label class="form-check-label" for="refusProduit">Refus</label>
                </div>
                <select class="form-control" id="produit" name="produit">
                    <option value="A">Produit A</option>
                    <option value="B">Produit B</option>
                    <!-- Ajoutez d'autres options ici -->
                </select>
            </div>
            <div class="form-group">
                <label for="quantiteDistribuee">Quantité distribuée :</label>
                <input type="number" class="form-control" id="quantiteDistribuee" name="quantiteDistribuee">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</section>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
