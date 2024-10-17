<?php

include '../config/bdd.php';
session_start();
//récupérer l'ID utilistaure et récupérer l'ID du poste 

$tags = $_POST['tags'];

$tagarray=explode(',',$tags);

$BDDtags = "INSERT INTO tags (label) VALUES $tag WHERE si il existe pas";
$BDDidpost = "SELECT id FROM posts ORDER BY id DESC LIMIT 1 ";
$queryidpost = $mysqli ->query($BDDidpost);
$idpost = $queryidpost -> fetch_assoc();
"<pre>" . print_r('contenu idpost' ) . "</pre>";
"<pre>" . var_dump($idpost) . "</pre>";
"<pre>" . print_r('liste de tag du post' ) . "</pre>";
"<pre>" . var_dump($tagarray). "</pre>";

// foreach ($tag as $tagarray) { //pour chaque élément de tagarray applique la requête sql
// $querytags = $mysqli ->query($BDDtags);
// }

//Récupère le dernier post réalisé et concerve le dans une variable $myPostId
//Injecter dans posts_tags $myPostId et $tag 





// header('Location:'. $_SERVER['HTTP_REFERER']);
