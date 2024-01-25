<?php
session_start();
require_once "M-bdd.php";

if (isset($_SESSION['user'])) {
    if (isset($_GET['id'])) {
        $id_cr_cp = $_GET['id'];

        // Requête pour récupérer les données du compte rendu à modifier
        $sql = "SELECT * FROM compte_rendu_de_visite WHERE id_cr_cp = :id_cr_cp AND id_user = :id_user";
        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':id_cr_cp', $id_cr_cp);
        $stmt->bindParam(':id_user', $_SESSION['user']['id_user']);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            // Récupérer les données du compte rendu
            $compteRendu = $stmt->fetch(PDO::FETCH_ASSOC);

            // Afficher le formulaire prérempli avec les données du compte rendu
            include "../View/V-Modif-CR.php";
            ?>
            <script>
                // Pré-remplir le formulaire avec les données récupérées
                document.getElementById('dateVisite').value = '<?php echo $compteRendu['date_de_la_visite']; ?>';
                document.getElementById('dateContreVisite').value = '<?php echo $compteRendu['date_de_contre_visite']; ?>';
                document.getElementById('motifVisite').value = '<?php echo $compteRendu['motif_de_la_visite']; ?>';
                document.getElementById('remarques').value = '<?php echo $compteRendu['remarques']; ?>';
                document.getElementById('nomPraticien').value = '<?php echo $compteRendu['nom_du_praticien']; ?>';
                // ... Autres champs à pré-remplir

                // Ajoutez le code pour gérer la logique spécifique au formulaire, si nécessaire
            </script>
            <?php
        } else {
            echo "Vous n'avez pas la permission de modifier ce compte rendu.";
        }
    } else {
        echo "L'identifiant du compte rendu à modifier n'est pas spécifié.";
    }
} else {
    echo "Vous devez être connecté pour accéder à cette page.";
}
