<?php
// Démarrer la session (si ce n'est pas déjà fait)
session_start();

// Détruire la session
session_destroy();

// Rediriger vers la page de connexion
header("Location: ../index.php");
exit();