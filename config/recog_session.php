<?php
session_start();
global $USER;
if (isset($_SESSION['connected_id'])) {
  $userId = $_SESSION['connected_id'];
}

if (isset($_SESSION['connected_id'])) {
  $laQuestionEnSql = "SELECT * FROM users WHERE id= '$userId' ";
  $lesInformations = $mysqli->query($laQuestionEnSql);
  $USER = $lesInformations->fetch_assoc();
}
 
  

