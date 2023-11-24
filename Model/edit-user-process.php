<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "compterendu";

// Connexion à la base de données
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_user"])) {
    $userId = $_POST["id_user"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $role = $_POST["role"];

    // Mettre à jour les informations de l'utilisateur
    $sql = "UPDATE user SET nom = ?, prenom = ?, role = ? WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $nom, $prenom, $role, $userId);

    if ($stmt->execute()) {
        header('Location: ../View/admin.php');
        exit;
    } else {
        echo "Erreur lors de l'enregistrement des modifications : " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
