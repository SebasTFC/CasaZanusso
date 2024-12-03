<?php
include("../front/connect_mysql.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

if(!empty($id)){
    $sql = "DELETE FROM users WHERE id_user = {$id}";
    if($bd->query($sql) == TRUE){
        echo "L'utilisateur a été supprimé";
    }else{
        echo "Erreur de suppression!";
    }  
} else {
    echo "pas id";
}
?>