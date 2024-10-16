<?php 
session_start();
include '../config/bdd.php';
"<pre>".var_dump($_GET)."</pre>";
$followId = $_GET['user_id'];
$userId = $_SESSION['connected_id'];
$BDDsub = "DELETE FROM followers WHERE followed_user_id= $followId AND following_user_id = $userId";
$querysub = $mysqli->query($BDDsub);
header('Location:'. $_SERVER['HTTP_REFERER']);
