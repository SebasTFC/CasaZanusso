<?php
include("../front/connect_mysql.php");

    $id=$_POST['id_marche'];
    $ville=htmlspecialchars($_POST['ville_marche']);
    $adresse=htmlspecialchars(html_entity_decode($_POST['adresse_marche'], ENT_QUOTES));
    $jour=htmlspecialchars($_POST['jour_marche']);
    $frequence=htmlspecialchars($_POST['frequence_marche']);
    $date=htmlspecialchars($_POST['date_marche']);
    $evenement=htmlspecialchars($_POST['evenement_marche']);
                
            if ($id > 0){
                $sql = $bd->prepare(" UPDATE marches SET ville_marche=?,adresse_marche=?,jour_marche=?,frequence_marche=?,date_marche=?,evenement_marche=? WHERE id_marche=?");
                $sql->execute(array($ville, $adresse, $jour, $frequence, $date, $evenement,$id));
                if($sql == TRUE){
                    echo "Marché modifié !";
                    }else{
                        echo "Erreur de modification!";
                        }
                        }else{
                        $sql = $bd->prepare("INSERT INTO marches(ville_marche,adresse_marche,jour_marche,frequence_marche,date_marche,evenement_marche) VALUES (?,?,?,?,?,?)");
                        $sql->execute(array($ville, $adresse, $jour, $frequence, $date, $evenement));         
                        if($sql == TRUE){
                            echo "Marché enregistré !";
                            }else{
                            echo "Erreur d'enregistrement";
                            }
            }         
?>

