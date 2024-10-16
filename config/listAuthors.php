<?php
    
    $listAuteurs = [];
    $laQuestionEnSql = "SELECT * FROM users";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    while ($user = $lesInformations->fetch_assoc()) {
      $listAuteurs[$user['alias']] = [
        'id' => $user['id'],
        'url' => 'wallAuthor.php?user_id=' . $user['id']
      ];
    }