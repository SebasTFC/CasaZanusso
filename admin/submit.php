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
    $id=$_POST['id_plat'];
    $nom=htmlspecialchars($_POST['nom_plat']);
    $detail=htmlspecialchars($_POST['detail_plat']);
    $prix=htmlspecialchars($_POST['prix_plat']);
    $description=htmlspecialchars($_POST['description_plat']);
    $nb_pers_plat=htmlspecialchars($_POST['pers_min_plat']);
    $target=$_FILES['image_plat']['name'];
    $ext=pathinfo($target,PATHINFO_EXTENSION);
    $imgData = $_FILES['image_plat']['tmp_name'];
   
        if(empty($target)){
            echo "Complétez tous les champs!";
             }else{
                if($ext!="jpg" && $ext!="JPG" && $ext!="jpeg"&& $ext!="JPEG" && $ext!="png" && $ext!="PNG"){
                echo("Format exigé: jpg,jpeg ou png!!!");
                }else{
                     if($_FILES['image_plat']['size']>5000000){
                        echo 'Fichier trop volumineux!!';
                      } else{
                        move_uploaded_file($imgData,"/casazanusso/images/".$target);
                         
                                if ($id > 0){
                                    $sql = $bd->prepare(" UPDATE plats SET nom_plat=?,image_plat=?,description_plat=?,detail_plat=?,prix_plat=? WHERE id_plat=?");
                                    $sql->execute(array($nom, $target, $description, $detail, $prix, $nb_pers_plat,$id));
                                    if($sql == TRUE){
                                        echo "Plat modifié !";
                                         
                                    }else{
                                        echo "Erreur de modification!";
                                    }
                                }else{
                                        $sql = $bd->prepare("INSERT INTO plats(nom_plat,image_plat,description_plat,detail_plat,prix_plat,nb_pers_plat) VALUES (?,?,?,?,?,?)");
                                        $sql->execute(array($nom,$target,$description,$detail,$prix,$nb_pers_plat));
                                    
                                        if($sql == TRUE){
                                            echo "Plat enregistré !";
                                        }else{
                                            echo "Erreur d'enregistrement";
                                        }
                                }
                            }
                      }
                      
            }    
           
?>

