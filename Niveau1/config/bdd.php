<?php
/* Etape 2: se connecter à la base de donnée */
$mysqli = new mysqli("localhost", "admin", "admin", "socialnetwork");

/* Connexion à la base de données*/

//verification
if ($mysqli->connect_errno) {
  echo ("Échec de la connexion : " . $mysqli->connect_error);
  exit();
}
