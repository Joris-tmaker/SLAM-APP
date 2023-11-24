<?php
session_start();
require_once "bdd.php";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "compterendu";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $userId = $_GET["id"];

    // Récupération des informations de l'utilisateur
    $sql = "SELECT id_user, nom, prenom, role FROM user WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2 class="text-center">Modifier Utilisateur</h2>

    <form action="edit-user-process.php" method="post">
        <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">

        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="prenom">Prénom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $user['prenom']; ?>" required>
        </div>

        <div class="form-group">
            <label for="role">Rôle:</label>
            <select class="form-control" id="role" name="role" required>
                <option value="role_admin" <?php if ($user['role'] == 'role_admin') echo 'selected'; ?>>Administrateur</option>
                <option value="role_visiteur" <?php if ($user['role'] == 'role_visiteur') echo 'selected'; ?>>Visiteur</option>
                <option value="role_delegue" <?php if ($user['role'] == 'role_delegue') echo 'selected'; ?>>Délégué</option>
                <option value="role_responsable" <?php if ($user['role'] == 'role_responsable') echo 'selected'; ?>>Responsable</option>
                <option value="role_praticien" <?php if ($user['role'] == 'role_praticien') echo 'selected'; ?>>Praticien</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
