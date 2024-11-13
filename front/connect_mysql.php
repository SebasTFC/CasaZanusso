<?php
 /*
 $password = 'pass';
 $username = 'test';
 $database = 'casazanusso';
 $hostname = 'db';
*/

 $database = 'casazanusso';
 $password = getenv('PSWD');
 $username = 'root';
 $hostname = 'localhost';
 
 try {
  $bd = new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
  $bd ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  }catch (Exception $e){
    
      echo "Erreur de connexion.Base de donnée pas trouvée.".$e->getMessage();
  }
  ?>