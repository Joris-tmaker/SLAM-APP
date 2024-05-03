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
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    </style>
</head>
<body>
<section>
    <?php include '../View/gaucheM.php'; ?>
    <div id="droite">
        <div class="container-fluid">
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
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
