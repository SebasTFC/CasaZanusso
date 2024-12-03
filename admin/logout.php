<?php
//session_start();
//$_SESSION=array();
//session_destroy();
//session_unset();
setcookie('email','',time() + 3600);
setcookie('token','',time() + 3600);
header('location: ../front/accueil.php');
?>
