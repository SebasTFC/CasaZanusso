<?php
include("../front/connect_mysql.php");

    $id=$_POST['id_plat'];
    $nom=htmlspecialchars($_POST['nom_plat']);
    $detail=htmlspecialchars($_POST['detail_plat']);
    $prix=htmlspecialchars($_POST['prix_plat']);
    $description=htmlspecialchars($_POST['description_plat']);
    $nb_pers_plat=htmlspecialchars($_POST['pers_min_plat']);
    $sorte=htmlspecialchars($_POST['sorte']);
    $target=$_FILES['image_plat']['name'];
    $ext=pathinfo($target,PATHINFO_EXTENSION);
    $imgData = $_FILES['image_plat']['tmp_name'];
   
        if(empty($target)){
            echo "Complétez tous les champs!";
             }else{
                if($ext!="jpg" && $ext!="JPG" && $ext!="jpeg"&& $ext!="JPEG" && $ext!="png" && $ext!="PNG"){
                echo("Format exigé: jpg,jpeg ou png!!!");
                }else{
                     if($_FILES['image_plat']['size']>6000000){
                        echo 'Fichier trop volumineux!!';
                      } else{
                        move_uploaded_file($imgData,"/casazanusso/images/".$target);
                         
                                if ($id > 0){
                                    $sql = $bd->prepare(" UPDATE plats SET nom_plat=?,image_plat=?,description_plat=?,detail_plat=?,prix_plat=?,nb_pers_plat=?,id_sorteplat=? WHERE id_plat=?");
                                    $sql->execute(array($nom, $target, $description, $detail, $prix, $nb_pers_plat,$sorte,$id));
                                    if($sql == TRUE){
                                        echo "Formule modifiée !";
                                         
                                    }else{
                                        echo "Erreur de modification!";
                                    }
                                }else{
                                        $sql = $bd->prepare("INSERT INTO plats(nom_plat,image_plat,description_plat,detail_plat,prix_plat,nb_pers_plat,id_sorteplat) VALUES (?,?,?,?,?,?,?)");
                                        $sql->bindParam(1, $nom);
                                        $sql->bindParam(2, $target);
                                        $sql->bindParam(3, $description);
                                        $sql->bindParam(4, $detail);
                                        $sql->bindParam(5, $prix);
                                        $sql->bindParam(6, $nb_pers_plat);
                                        $sql->bindParam(7, $sorte);
                                        $sql->execute();
                                        if($sql == TRUE){
                                            echo "Formule enregistrée !";
                                        }else{
                                            echo "Erreur d'enregistrement";
                                        }
                                }
                            }
                      }
                      
            }    
           
?>

