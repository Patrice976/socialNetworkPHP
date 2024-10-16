<?php

if (isset($_SESSION['connected_id'])) {
    $userId = $_SESSION['connected_id']; // Récupérer l'ID de l'utilisateur

    if (isset($_POST['posts'])) {
        $message = $_POST['posts'];
        $message = $mysqli->real_escape_string($message);

        // Préparer la requête SQL pour insérer le message
        $lInstructionSql = "INSERT INTO posts (user_id, content, created, parent_id) VALUES (?, ?, NOW(), NULL)";

        // Préparer la requête
        $stmt = $mysqli->prepare($lInstructionSql);
        $stmt->bind_param("is", $userId, $message); // Lier user_id et content

        // Exécuter la requête d'insertion
        if ($stmt->execute()) {
            echo "Message posté avec succès.";
        } else {
            echo "Erreur lors de la publication du message : " . $stmt->error;
        }

        // Fermer la requête
        $stmt->close();
    }
} else {
    echo "Utilisateur non connecté.";
}
?>


              