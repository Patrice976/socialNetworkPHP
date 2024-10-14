<?php
session_start();
"<pre>" . print_r('Into recog_session') . "</pre>";
"<pre>" . var_dump($_SESSION['connected_id']) . "</pre>";
global $USER;
 $userId = $_SESSION['connected_id'];
  $laQuestionEnSql = "SELECT * FROM users WHERE id= '$userId' ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    $USER = $lesInformations->fetch_assoc();
  

