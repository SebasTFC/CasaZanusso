<?php
include("../front/connect_mysql.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM plats WHERE id_plat = {$id}";
    if($bd->query($sql) == TRUE){
        echo "La formule a été supprimée";
    }else{
        echo "Erreur de suppression!";
    }  
} else {
    echo "pas id";
}
?>