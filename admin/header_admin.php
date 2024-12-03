<?php 
/*session_start();
require_once ('../vendor/autoload.php');
if((!$_SESSION['email']) AND (!$_SESSION['password'])){
    header('location: ../front/connexion.php');
}*/
$email = $_COOKIE['email'];
$token = $_COOKIE['token'];
include_once('../front/connect_mysql.php');
$recupUser = $bd->prepare('SELECT * FROM users WHERE mail = ? AND token = ?');
$recupUser->execute(array($email,$token));
$data = $recupUser->fetch(PDO::FETCH_ASSOC);
if($data['mail'] != false){
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../node_modules\bootstrap\dist\css\bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/scss/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <title>Administrateur</title>
</head>
<body>
<div class="container-fluid text-center sticky-top pt-4 gradient mb-4">   
        <img src="../images/logo_CasaZanusso.png"  style="width: 350px;" class="rounded-5" alt="Logo entreprise">
        <nav class="navbar navbar-expand-md justify-content-center">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-center flex-column" id="navbarNavDropdown">
            <ul class="navbar-nav dancing-script-menu">
                <li class="nav-item px-3">
                  <a class="nav-link active text-success" href="../admin/plats.php">Les formules</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link text-black" href="../admin/marches.php">Les marchés</a>
                </li>
                <li class="nav-item px-3">
                  <a class="nav-link text-black" href="../admin/utilisateurs.php">Les utilisateurs</a>
                </li>
                <li class="nav-item px-3"></li>
                  <a class="nav-link text-danger" href="../admin/logout.php">Deconnexion</a>
                </li>
            </ul>
            </div>
        </nav>
        
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script> 
    <script src="../node_modules\bootstrap\dist\js\bootstrap.bundle.min.js"></script>
  <?php
  }else{
    header('location: ../admin/connexion.php');
  }
  ?>