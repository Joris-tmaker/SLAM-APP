<?php

session_start();

if (!empty($_SESSION['user'])) {
    header('Location: View/homepage.php');
} else {
    header('Location: View/connexion.php');
}
exit;