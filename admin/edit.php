<?php
include("../front/connect_mysql.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

$sql = "SELECT id_plat,nom_plat,image_plat,description_plat,detail_plat,prix_plat,nb_pers_plat,id_sorteplat,nom_sorte,id_sorte FROM `plats`INNER JOIN `sorte` ON id_sorteplat = id_sorte 
WHERE id_plat = {$id}";
$result = $bd->query($sql);
$row = $result->fetch();
echo json_encode($row);
?>