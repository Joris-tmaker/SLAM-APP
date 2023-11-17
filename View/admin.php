<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Administrateur de l'Application</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style-formulaire.css">
    <style>
        pre {
            background-color: #f8f9fa;
            padding: 10px;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center">Tableau de Bord de l'Administrateur de l'Application</h2>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Utilisateurs</h5>
                        <p class="card-text">Administrez les utilisateurs de l'application.</p>
                        <!-- Ajout d'un attribut data-toggle et data-target pour ouvrir la fenêtre modale -->
                        <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#myModal">Accéder</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Données</h5>
                        <p class="card-text">Administrez et gérez les données de l'application.</p>
                        <a href="#" class="btn btn-primary btn-block">Accéder</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Modifier le rôle de l'utilisateur</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $dbname = "compterendu";

                        $conn = new mysqli($servername, $username, $password, $dbname);
                        if ($conn->connect_error) {
                            die("La connexion a échoué : " . $conn->connect_error);
                        }

                        $sql = "SELECT nom, prenom, role FROM user";
                        $result = $conn->query($sql);
                        $conn->close();
                        $users = array();

                        if ($result->num_rows > 0) {
                            echo '<table class="table table-bordered">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>Nom</th>';
                            echo '<th>Prénom</th>';
                            echo '<th>Rôle</th>';
                            echo '<th>Action</th>'; // Nouvelle colonne pour les boutons Modifier
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row['nom'] . '</td>';
                                echo '<td>' . $row['prenom'] . '</td>';
                                echo '<td>' . $row['role'] . '</td>';
                                echo '<td><button class="btn btn-warning">Modifier</button></td>'; // Bouton Modifier
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        }
                    ?>
                    
                    <button type="button" class="btn btn-primary">Enregistrer</button>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
