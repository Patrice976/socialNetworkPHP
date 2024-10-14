<?php
session_start();
global $USER;
 $userId = $_SESSION['connected_id'];
  $laQuestionEnSql = "SELECT * FROM users WHERE id= '$userId' ";
    $lesInformations = $mysqli->query($laQuestionEnSql);
    $USER = $lesInformations->fetch_assoc();
  

