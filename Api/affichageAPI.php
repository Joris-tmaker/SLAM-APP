<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $url = 'http://localhost/Slam-app/GestionCompteRendu/Api/loginAPI.php';
    $data = array(
        'email' => $_POST['email'],
        'password' => $_POST['password']
    );
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    $response = curl_exec($ch);
    curl_close($ch);
    if ($response === false) {
        echo "Erreur lors de l'appel à l'API";
    } else {
        $responseData = json_decode($response, true);

        if (isset($responseData['status']) && isset($responseData['message'])) {
            echo 'Status: ' . $responseData['status'] . ', Message: ' . $responseData['message'];
        } else {
            // Gérez le cas où les clés 'status' et 'message' ne sont pas présentes dans la réponse
            echo "Réponse de l'API invalide.";
        }
    }
} else {
    echo "Méthode de requête non autorisée";
}