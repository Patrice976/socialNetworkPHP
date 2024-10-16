<?php
//page qui permet la deconnexion avec redirection vers la page index
session_start();
session_destroy();
header('Location:login.php');
/* exit; */
