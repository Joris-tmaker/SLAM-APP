<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/9a8c46dc52.js" crossorigin="anonymous"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Compte-Rendu</title>
    <!-- Inclure les fichiers CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Lier votre fichier CSS personnel -->
    <link rel="stylesheet" href="../assets/style-formulaire.css">
    <link rel="stylesheet" href="../assets/responsive.css">
    

</head>
<body>
<section>
    <?php include 'gauche.php'; ?>
    <div id="droite">
        <div class="container-fluid">
            <h2>Compte-Rendu de Visite</h2>
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
                <button type="submit" class="btn btn-modif">Enregistrer</button>
            </form>
        </div>
    </div>
</section>

    <!-- Inclure les fichiers JavaScript de Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
