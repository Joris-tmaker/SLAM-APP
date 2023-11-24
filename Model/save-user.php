<?php
session_start();
require_once "bdd.php";

// Récupération des utilisateurs depuis la base de données
$sql = "SELECT id_user, nom, prenom, role FROM user";
if (isset($connexion)){
    $result = $connexion->query($sql);
}
//var_dump($result);die();
if ($result->rowCount() > 0) {
    echo '<table class="table table-striped table-bordered table-responsive">';
    echo '<thead class="thead-dark">';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nom</th>';
    echo '<th>Prénom</th>';
    echo '<th>Rôle</th>';
    echo '<th>Action</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($row = $result->fetch()) {
        echo '<tr>';
        echo '<td>' . $row['id_user'] . '</td>';
        echo '<td>' . $row['nom'] . '</td>';
        echo '<td>' . $row['prenom'] . '</td>';
        echo '<td>' . $row['role'] . '</td>';
        echo '<td><a class="btn btn-warning" href="../Model/edit-user-form.php?id=' . $row['id_user'] . '">Modifier</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} else {
    echo '<div class="alert alert-info" role="alert">Aucun utilisateur trouvé.</div>';
}

$connexion = null;
