<?php
session_start();
require_once 'M-bdd.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    try {
        $sql = "SELECT id_user, nom, prenom, role, id_region FROM user WHERE id_user = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des informations de l'utilisateur : " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <style>
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
            echo "<a class='nav-link' href='../View/V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='#'>Echantillons</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Affiche-Modif-User.php'>Modification des Utilisateurs</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Inscription.php'>Créer des utilisateurs</a>";
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
            echo "<a class='nav-link' href='../View/V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Ajout-CR.php'>Nouveaux comptes rendus</a>";
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
            echo "<a class='nav-link' href='../View/V-Affiche-CR.php'>Consulter mes comptes rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Affiche-CR-Region.php'>Consulter les comptes rendus de régions</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Ajout-CR.php'>Créer de Nouveaux Comptes-Rendus</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Contre-Visite.php'>Consulter les Contre-Visites Prévues</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Ajouter-Medecin.php'>Ajouter un nouveau médecin</a>";
            echo "</li>";
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='../View/V-Afficher-Medecin.php'>Afficher les médecins</a>";
            echo "</li>";
            echo "</ul>";
            echo "<a class='btn btn-primary' href='../Model/M-Logout.php'>Déconnexion</a>";
        }
        ?>
    </div>
    <div class="container">
        <h2 class="text-center">Modifier Utilisateur</h2>

        <form action="M-Modif-User.php" method="post">
            <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">

            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>"
                       required>
            </div>

            <div class="form-group">
                <label for="role">Région:</label>
                <select class="form-control" id="region" name="region" required>
                    <option value="1" <?php if ($user['id_region'] == 'Nord') echo 'selected'; ?>>Nord</option>
                    <option value="2" <?php if ($user['id_region'] == 'Sud') echo 'selected'; ?>>Sud</option>
                    <option value="3" <?php if ($user['id_region'] == 'Est') echo 'selected'; ?>>Est</option>
                    <option value="4" <?php if ($user['id_region'] == 'Ouest') echo 'selected'; ?>>Ouest</option>
                    <option value="5" <?php if ($user['id_region'] == 'Paris Centre') echo 'selected'; ?>>Paris Centre
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="role">Rôle:</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="role_visiteur" <?php if ($user['role'] == 'role_visiteur') echo 'selected'; ?>>
                        role_visiteur
                    </option>
                    <option value="role_delegue" <?php if ($user['role'] == 'role_delegue') echo 'selected'; ?>>
                        role_delegue
                    </option>
                    <option value="role_responsable" <?php if ($user['role'] == 'role_responsable') echo 'selected'; ?>>
                        role_responsable
                    </option>
                    <option value="role_praticien" <?php if ($user['role'] == 'role_praticien') echo 'selected'; ?>>
                        role_praticien
                    </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
