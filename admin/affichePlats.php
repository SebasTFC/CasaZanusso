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

$sql = "SELECT id_plat,nom_plat,image_plat,description_plat,detail_plat,prix_plat,nb_pers_plat FROM plats"; 

$result = $bd -> query($sql);
if($result->rowCount() > 0){
    $data = array();
    while($row = $result->fetch()){
        $data[] = $row;
    }
}
echo json_encode($data);
?>