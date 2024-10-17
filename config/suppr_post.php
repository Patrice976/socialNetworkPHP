<?php

if (isset($_POST['delete_post_id'])) { // vérifie si le formulaire de suppression a été soumis

    $postId = intval($_POST['delete_post_id']); // recup l'ID du post à supprimer //intval force la valeur en entier


    $supprSql = "DELETE FROM posts WHERE id = ? AND user_id = ?"; // seul l'utilisateur connecté peut supprimer ses messages
    // les "?" sont la parcequ'ils prennent les id !!git

    // Prépare la requête sql
    $stmt = $mysqli->prepare($supprSql);

    $stmt->bind_param("ii", $postId, $userId); // s'assurer que l'id du post et celle de l'user sont liées 
    // + "ii" veut dire integer integer / type les variables pour ne pas produire d'erreurs 

    // exec la requête
    if ($stmt->execute()) {
        echo "Ton post a été supprimé avec succès !"; // renvoie si bon 
    } else {
        echo "Erreur lors de la suppression de ton post... : " . $stmt->error; //renvoie une erreur
    }
    // renvoie les messages en haut a gauche de la page entre le header et la photo du profil

    // Ferme la requête
    $stmt->close();
}