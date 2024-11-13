<?php
include("../front/connect_mysql.php");

$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

$sql = "SELECT * FROM marches WHERE id_marche = {$id}";
$result = $bd->query($sql);
$row = $result->fetch();
echo json_encode($row);
?>