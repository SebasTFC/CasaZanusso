<!-- début de l'application -->

<?php

session_start();
include('front/mongodb.php');

// initialisqation la bdd NoSQL
$document = [
    "name" => "visite",
    "nbClick" => 1
  ];
// incrementation de 1 pour la bdd NoSQL
$result = $Compteur_connection->updateOne(
  ["name"=> "visite"],
   ['$inc'=>["nbClick"=>1]],
  ["upsert"=> true]   
);
$cursor = $Compteur_connection->findone(['name'=>'visite']
);
$visite = json_encode($cursor['nbClick']);
//header("location: front/accueil.php?nb=$visite"); 

echo "<script>window.location.href='front/accueil.php?nb=$visite';</script>";
exit;

?>

