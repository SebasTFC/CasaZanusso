
<?php

include_once('../front/header.html');
require_once ('../vendor/autoload.php');

$reponse="";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['mail'])){
    extract($_POST);
    if(!empty($subject) AND !empty($from) AND !empty($message)){
    
    $from=$_POST['from'];
    $subject=$_POST['subject'];
    $content=$_POST['message'];

    require '../vendor/autoload.php';
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    
    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__.'/../');
    $dotenv->load();
    // Configure SMTP
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->SMTPAuth = true;
    $phpmailer->Host = 'smtp.gmail.com';
    $phpmailer->Port = 587;
    $phpmailer->Username = getenv('ADDRESS_MAIL');
    $phpmailer->Password = getenv('PASSWORD_MAIL');
    $phpmailer->SMTPSecure ="tls";
    
    // Mail Headers
    //$phpmailer->setFrom('');
    $phpmailer->addAddress(getenv('ADDRESS_MAIL'), 'Casa Zanusso');
    $phpmailer->isHTML(true);
    // Message
    $phpmailer->FromName = $from;
    $phpmailer->Subject = $subject;
    $phpmailer->Body    = $content;
  
    
    // Send the Email
    try{
        $phpmailer->send();
        $reponse = "Votre message a bien été envoyé";

    }catch(Exception $e){
        echo "Mailer Error:" .$e->getMessage();
    }
} else{
    $reponse = "Tous les champs ne sont pas remplis !!!";
    }

};

?>

  <div class="body">
  <form method="POST" action="">
    <div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-10 col-lg-6 couleur_form rounded-3 px-5 py-2 fw-bold">
                <label for="subject" class="form-label">Sujet:</label>
                <input type="text" class="form-control border-black" name="subject">
                <label for="message" class="form-label">Votre message:</label>
                <textarea class="form-control border-black" name="message" rows="5"></textarea>
                <label for="from" class="form-label">Votre e-mail:</label>
                <input type="email" class="form-control border-black" name="from" placeholder="name@example.com">
                <div class="row justify-content-evenly text-center mt-4">
                    <div class="col-2">
                        <button  type="submit" name="mail" class="btn btn-outline-warning rounded-0">Envoyer</button>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-outline-warning rounded-0" href="../front/accueil.php">Retour</a>
                    </div>
                </div>
                <div style='color:red' class='text-center mt-2'><?= $reponse ?> </div>
        </div>        
    </div>
    </div>
  </form>
</div>

<?php
include_once('../front/footer.html');
?>