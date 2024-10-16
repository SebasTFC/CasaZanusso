<!-- début de l'application -->

<?php
session_start();
include('front/mongodb.php');

// incrementation de 1 pour la bdd NoSQL

$document = [
    "name" => "visite",
    "nbClick" => 1
  ];


$result = $Compteur_connection->updateOne(
  ["name"=> "visite"],
   ['$inc'=>["nbClick"=>1]],
  ["upsert"=> true]   
);
$cursor = $Compteur_connection->findone(['name'=>'visite']
);
$_SESSION['nb'] = json_encode($cursor['nbClick']);

header("location: front/accueil.php");    
?>

