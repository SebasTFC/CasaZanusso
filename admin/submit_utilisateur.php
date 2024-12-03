<?php
include('../front/connect_mysql.php');

$email = $_POST['email_utilisateur'];
$password = password_hash($_POST['password_utilisateur'], PASSWORD_BCRYPT);


    
    $sql = "SELECT mail FROM users WHERE mail='$email'";
    $exist = $bd->query($sql);
    if (!$exist->rowCount()>0){
            $sql = $bd->prepare("INSERT INTO users(mail, password,token) VALUES (?,?,?)");
            $sql->execute(array($email,$password,''));
            if($sql == TRUE){
                echo "$email a été enregistré";
            }else{
                echo "Erreur d'enregistrement";
            }
    }else{
        echo"Cette adresse mail existe déjà !";
    } ; 

    
?>