<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Informations de connexion à la base de données
$host = 'localhost';
$bdname = 'compterendu';
$user = 'root';
$mdp = '';
$charset = 'utf8';

$database = "mysql:host=$host;dbname=$bdname;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $conn = new PDO($database, $user, $mdp, $options);
} catch (Exception $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Récupérer les valeurs du formulaire
$date_visite = $_POST['dateVisite'];
$date_contre_visite = $_POST['dateContreVisite'];
$motif_visite = $_POST['motifVisite'];
$remarques = $_POST['remarques'];
$nom_praticien = $_POST['nomPraticien'];
$produit = $_POST['produit'];
$refus_produit = isset($_POST['refusProduit']) ? 1 : 0; // 1 si coché, 0 sinon
$quantite_distribuee = $_POST['quantiteDistribuee'];

// Préparer la requête SQL avec des paramètres
$sql = "INSERT INTO compte_rendu_de_visite (date_de_la_visite, date_de_contre_visite, motif_de_la_visite, remarques, nom_du_praticien, produit, refus, quantite_distribuee) 
        VALUES (:date_visite, :date_contre_visite, :motif_visite, :remarques, :nom_praticien, :produit, :refus_produit, :quantite_distribuee)";

// Préparer la requête avec des paramètres nommés
$stmt = $conn->prepare($sql);

// Binder les paramètres
$stmt->bindParam(':date_visite', $date_visite);
$stmt->bindParam(':date_contre_visite', $date_contre_visite);
$stmt->bindParam(':motif_visite', $motif_visite);
$stmt->bindParam(':remarques', $remarques);
$stmt->bindParam(':nom_praticien', $nom_praticien);
$stmt->bindParam(':produit', $produit);
$stmt->bindParam(':refus_produit', $refus_produit);
$stmt->bindParam(':quantite_distribuee', $quantite_distribuee);

// Exécuter la requête SQL
try {
    $stmt->execute();
    echo "Compte rendu ajouté avec succès";
} catch (PDOException $e) {
    echo "Erreur lors de l'ajout du compte rendu : " . $e->getMessage();
}

// Fermer la connexion à la base de données
$conn = null;
}
?>
