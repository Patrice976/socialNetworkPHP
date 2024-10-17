<?php 
session_start();
include '../config/bdd.php';
"<pre>".var_dump($_GET)."</pre>";
$followId = $_GET['user_id'];
$userId = $_SESSION['connected_id'];
$BDDsub = "INSERT INTO followers (followed_user_id, following_user_id) VALUES ($followId, $userId)";
$querysub = $mysqli->query($BDDsub);
header('Location:'. $_SERVER['HTTP_REFERER']);
