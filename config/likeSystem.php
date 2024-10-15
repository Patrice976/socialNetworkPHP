<?php 
include '../config/bdd.php';
session_start();
//récupérer l'ID utilistaure et récupérer l'ID du poste 

$postId = $_GET['id'];
 "<pre>" . print_r('id du poste' ) . "</pre>";
"<pre>" . var_dump($postId) . "</pre>";
$userId = $_SESSION['connected_id'];
"<pre>" . print_r('id utilisateur' ) . "</pre>";
"<pre>" . var_dump($userId) . "</pre>";


// Comparer l'id user et l'id post récupérer et vérifier si il sont présent dans la bdd 
$BDDLike = "SELECT * FROM likes WHERE user_id = $userId AND post_ID = $postId";
$queryLike = $mysqli->query($BDDLike);
$liked = $queryLike->fetch_assoc();
"<pre>" . print_r('La requête ' ) . "</pre>";
"<pre>" . var_dump($liked) . "</pre>";

$BDDinjectLike = "INSERT INTO likes (user_id, post_id) VALUES ($userId, $postId)";
$queryinjectLike = $mysqli->query($BDDinjectLike);

header('Location:'. $_SERVER['HTTP_REFERER']);
