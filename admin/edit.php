<?php
$password = getenv("PSWD");
$username = 'root';
$database = 'casazanusso';
$hostname = 'localhost';

try {
 $bd = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
 $bd ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

 }catch (Exception $e){
     echo "Erreur de connexion.Base de donnée pas trouvée.".$e->getMessage();
 }
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

$sql = "SELECT * FROM plats WHERE id_plat = {$id}";
$result = $bd->query($sql);
$row = $result->fetch();
echo json_encode($row);
?>