<?php 
session_start();

$mysqli = new mysqli("localhost", "admin", "admin", "socialnetwork");

if ($mysqli->connect_errno) {
    echo ("Échec de la connexion : " . $mysqli->connect_error);
    exit();
}

// vérifier si user est connecté
if (isset($_SESSION['connected_id'])) {
    $userId = $_SESSION['connected_id']; // recupère ID de l'utilisateur

    // veriifie si le formulaire a été soumis
    if (isset($_POST['posts'])) {
        $message = $_POST['posts'];

        // évite injection SQL
        $message = $mysqli->real_escape_string($message);

        // prépare la requête pour insérer le message
        $lpostInstructionSql = "INSERT INTO posts (user_id, content, created, parent_id) VALUES (?, ?, NOW(), NULL)";

        // prapare la requête
        $stmt = $mysqli->prepare($postInstructionSql);
        $stmt->bind_param("is", $userId, $message); // LIE les paramètres

        // execute la requete d'insertion du message
        if ($stmt->execute()) {
            echo "Message posté avec succès.";
        } else {
            echo "Erreur lors de la publication du message : " . $stmt->error;
        }

        // arrête la requete
        $stmt->close();
    }
} else {
    echo "Utilisateur non connecté.";
}
