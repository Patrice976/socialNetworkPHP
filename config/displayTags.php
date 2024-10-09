<?php
    $listTags = [];
    $laQuestionEnSql = "SELECT * FROM `tags` ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    $tag = $lesInformations->fetch_assoc();
    while ($tag = $lesInformations->fetch_assoc()) {
      $listTags[$tag['label']] = [
        'id' => $tag['id'],
        'url' => 'tags.php?tag_id=' . $tag['label']
      ];
    }
    
