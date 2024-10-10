<?php
    $listPost = [];
    $laQuestionEnSql = "SELECT * FROM `posts` ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    $post = $lesInformations->fetch_assoc();
    while ($post = $lesInformations->fetch_assoc()) {
      $list[$post['label']] = [
        'id' => $post['id'],
        'url' => 'tags.php?tag_id=' . $post['id']
      ]; 
    }

   