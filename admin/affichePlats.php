<?php
include("../front/connect_mysql.php");

$sql = "SELECT id_plat,nom_plat,image_plat,description_plat,detail_plat,prix_plat,nb_pers_plat,id_sorteplat,nom_sorte FROM `plats`
INNER JOIN `sorte`
WHERE id_sorteplat = id_sorte"; 

$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>