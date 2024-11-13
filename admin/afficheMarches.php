<?php
include("../front/connect_mysql.php");

$sql = "SELECT id_marche,ville_marche,adresse_marche,jour_marche,frequence_marche,date_marche,evenement_marche FROM marches"; 

$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>