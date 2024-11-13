<?php
session_start();
include_once('../front/header.html');
include_once('../front/connect_mysql.php');
$message="";

try{    
    //$bd = new PDO('mysql:host=localhost;dbname=casazanusso;charset=utf8;','root','');
    //$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    if(isset($_POST["btn-connection"])){
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
            //$token = bin2hex(random_bytes(32));
            $pseudo=htmlspecialchars($_POST['email']);
            $mdp=$_POST['password'];
            $recupUser = $bd->prepare('SELECT * FROM users WHERE mail = ? AND password = ?');
            $recupUser->execute(array($pseudo,$mdp));
            if($recupUser->rowcount()>0){ 
                $_SESSION['email']= $pseudo;
                $_SESSION['password']=$mdp;
                echo "<script>window.location.href='../admin/fond_admin.php';</script>";
                exit;
                //header("Location: ../admin/fond_admin.php");
                }else{
                $message= "Mail ou de Mot de passe incorrect...";}
        }else{
            $message= "Veuillez completez tous les champs...";
        }
        }
    }
catch(PDOException $e){
    echo "Erreur:".$e->getMessage();
    }   
?>

<div class="body">
  <form method="POST" action="">
    <div class="container">
        <div class="row justify-content-center mb-4 py-4">
            <div class="col-10 col-lg-6 couleur_form rounded-3 p-4 fw-bold">
                <label for="email" class="form-label">Votre e-mail:</label>
                <input type="email" class="form-control border-black mb-4" name="email" placeholder="Entrez l'email..." autocomplete="off">
                <label class="form-label" for="password">Votre mot de passe:</label>
                <input class="form-control border-black mb-5" type="password" id="password" name="password" placeholder="Entrez le mot de passe..." autocomplete="off">
                <div class="row justify-content-evenly text-center mt-5">
                    <div class="col-6">
                        <button type="submit" id="btnSignin" class="btn btn-outline-warning rounded-0" name="btn-connection" >Connection</button>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-outline-warning rounded-0" href="../front/accueil.php">Retour</a>
                    </div>
                    <div style="color:red"></br><?php echo $message ?></div>
                </div>        
            </div>
        </div>
    </div>
  </form>
</div>
<?php
include_once('../front/footer.html');
?>