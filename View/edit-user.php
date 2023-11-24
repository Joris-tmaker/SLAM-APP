<?php
require_once ('../Model/edit-user-form.php');
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

    <form action="../Model/edit-user-process.php" method="post">
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
                <option value="role_admin" <?php if ($user['role'] == 'role_admin') echo 'selected'; ?>>role_admin</option>
                <option value="role_visiteur" <?php if ($user['role'] == 'role_visiteur') echo 'selected'; ?>>role_visiteur</option>
                <option value="role_delegue" <?php if ($user['role'] == 'role_delegue') echo 'selected'; ?>>role_delegue</option>
                <option value="role_responsable" <?php if ($user['role'] == 'role_responsable') echo 'selected'; ?>>role_responsable</option>
                <option value="role_praticien" <?php if ($user['role'] == 'role_praticien') echo 'selected'; ?>>role_praticien</option>
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
