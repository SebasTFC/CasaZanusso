<?php
//session_start();
include_once('../front/header.html');
include_once('../front/connect_mysql.php');
$message="";

try{    
    
    if(isset($_POST["btn-connection"])){
        if(empty($_POST['email']) AND empty($_POST['password'])){
            $message= "Veuillez complètez tous les champs...";}
        else {
            //CREATION DU TOKEN
            $token = bin2hex(random_bytes(32));
            $pseudo=htmlspecialchars($_POST['email']);
            $mdp=$_POST['password'];
            $recupUser = $bd->prepare('SELECT * FROM users WHERE mail = ?');
            $recupUser->execute(array($pseudo));
            $data = $recupUser->fetch(PDO::FETCH_ASSOC);
                if($recupUser->rowcount()<1){ 
                    $message= "L'E-mail n'existe pas...";}
                else{
                    if(!password_verify($mdp,$data['password'])){
                        $message= "Mot de passe incorrect...";}
                    else{
                        //MISE A JOUR DU TOKEN DANS LA BASE DE DONNEE
                        $bd->exec("UPDATE users set token = '$token' WHERE mail = '$pseudo'");
                        //CREATION DES COOKIES DANS LE NAVIGATEUR CLIENT
                        setcookie('email',$pseudo,time() + 3600);
                        setcookie('token',$token,time() + 3600);
                        header("Location: ../admin/fond_admin.php");
                        exit;
                    }
                }
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
                <input type="email" class="form-control border-black mb-4" name="email" id="email" placeholder="Entrez l'email...">
                <script>
                    document.getElementById('email').addEventListener('change', function(e) {
                        let emaile = document.getElementById('email').value;
                        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if(!emaile.match(emailRegex)){
                            regexError.innerHTML="L'adresse n'est pas valide";
                            document.getElementById('email').addEventListener('focus',function(e){
                                regexError.innerHTML="";
                            });
                        }    
                });
                </script>
                <label class="form-label" for="password">Votre mot de passe:</label>
                <input class="form-control border-black mb-5" type="password" id="password" name="password" placeholder="Entrez le mot de passe...">
                <div class="row justify-content-evenly text-center mt-3">
                    <div class="col-6">
                        <button type="submit" id="btnSignin" class="btn btn-outline-warning rounded-0" name="btn-connection" >Connection</button>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-outline-warning rounded-0" href="../front/accueil.php">Retour</a>
                    </div>
                    <div id="regexError" class="mt-2" style="color:red"><?php echo $message ?></div>
                </div>        
            </div>
        </div>
    </div>
  </form>
</div>
<?php
include_once('../front/footer.html');
?>