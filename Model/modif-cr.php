<?php
session_start();
require_once "bdd.php"; // Assurez-vous que ce fichier contient la connexion à votre base de données

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $idCR = $_POST['idCR']; // Champ caché contenant l'ID du compte rendu à modifier
    $date_visite = $_POST['dateVisite'];
    $date_contre_visite = $_POST['dateContreVisite'];
    $motif_visite = $_POST['motifVisite'];
    $remarques = $_POST['remarques'];
    $nom_praticien = $_POST['nomPraticien'];
    $produit = $_POST['produit'];
    $refus_produit = isset($_POST['refusProduit']) ? 1 : 0; // 1 si coché, 0 sinon
    $quantite_distribuee = $_POST['quantiteDistribuee'];

    // Requête pour mettre à jour le compte rendu dans la base de données
    $requete = "UPDATE compte_rendu_de_visite SET date_de_la_visite = ?, date_de_contre_visite = ?, motif_de_la_visite = ?, remarques = ?, nom_du_praticien = ?, produit = ?, refus = ?, quantite_distribuee = ? WHERE id_cr_cp = ?";
    $stmt = $connexion->prepare($requete);
    $stmt->execute([$date_visite, $date_contre_visite, $motif_visite, $remarques, $nom_praticien, $produit, $refus_produit, $quantite_distribuee, $idCR]);

    // Redirection vers une page après la modification
    header("Location: chemin_vers_page_apres_modification.php");
    exit();
}

// Affichage du formulaire de modification
if (isset($_GET['id'])) {
    $idCR = $_GET['id']; // Récupérer l'ID du compte rendu à modifier depuis l'URL

    // Requête pour obtenir les informations du compte rendu à modifier
    $sql = "SELECT * FROM compte_rendu_de_visite WHERE id_cr_cp = :idCR";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':idCR', $idCR);
    $stmt->execute();

    // Vérifier s'il y a des résultats
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Affichage du formulaire pré-rempli avec les données du compte rendu
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Modifier Compte Rendu</title>
            <!-- Inclure les fichiers CSS de Bootstrap -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <!-- Lier votre fichier CSS personnel -->
            <link rel="stylesheet" href="../assets/style-formulaire.css">
        </head>
        <body>
        <div class="container">
            <h2>Modifier Compte-Rendu de Visite</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="idCR" value="<?php echo $row['id_cr_cp']; ?>">
                <!-- Les champs à modifier -->
                <!-- Exemple : -->
                <div class="form-group">
                    <label for="date_visite">Date de la Visite :</label>
                    <input type="date" class="form-control" id="dateVisite" name="dateVisite" value="<?php echo $row['date_de_la_visite']; ?>">
                </div>
                <!-- ... Autres champs à modifier ... -->
                <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            </form>
        </div>

        <!-- Inclure les fichiers JavaScript de Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Aucun compte rendu trouvé avec cet ID.";
    }
} else {
    echo "ID du compte rendu non spécifié.";
}
?>
