
<?php
include_once('../front/header.html');
include_once('../front/connect_mysql.php');
require_once ('../vendor/autoload.php');

$reponse="";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['mail'])){
    extract($_POST);
    if(!empty($subject) AND !empty($from) AND !empty($date) AND !empty($dessert) AND !empty($plat) AND !empty($nb_total)){
    $nb_total=$_POST['nb_total'];
    $plat=$_POST['plat'];
    $dessert=$_POST['dessert'];
    $date=$_POST['date'];
    $from=$_POST['from'];
    $subject=$_POST['subject'];
    $content=$_POST['message'];
    $nb_plat=$_POST['nb_plat'];
    $nb_plat_2=$_POST['nb_plat_2'];
    $nb_plat_3=$_POST['nb_plat_3'];
    $nb_dessert=$_POST['nb_dessert'];
    $nb_dessert_2=$_POST['nb_dessert_2'];
    $nb_dessert_3=$_POST['nb_dessert_3'];

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
    $phpmailer->Body    = '<b>Un devis est arrivé</b></br>'
        .'Projet: '.$subject.'</br>'
        .'Date: '.$date.'</br>'
        .'Nb de personne au total: '.$nb_total.'</br>'
        .'Plat1: '.$plat.' pour '.$nb_plat.' personnes </br>'
        .'Plat2: '.$plat_2.' pour '.$nb_plat_2.' personnes </br>'
        .'Plat3: '.$plat_3.' pour '.$nb_plat_3.' personnes </br>'
        .'Dessert1: '.$dessert.' pour '.$nb_dessert.' personnes </br>'
        .'Dessert2: '.$dessert_2.' pour '.$nb_dessert_2.' personnes </br>'
        .'Dessert3: '.$dessert_3.' pour '.$nb_dessert_3.' personnes </br>'
        .'Precision: '.$content.'</br>'
        .'Adresse mail du client: '.$from;
    
  
    
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
            <h1 class="text-center p-3 text-decoration-underline">Devis</h1>

                <label for="subject" class="form-label">Type de projet:</label>
                    <select class="form-select border-black mb-2" name="subject">
                        <option value="Réunion familiale, séminaire, ...">Réunion familiale, séminaire, ...</option>
                        <option value="Chef à domicile">Chef à domicile</option>
                        <option value="Atelier cuisine">Atelier cuisine</option>
                        <option value="Autre">Autre (à préciser)</option>
                    </select>

                <label for="date" class="form-label">Date souhaitée:</label>
                <input type="date" class="form-control border-black mb-2" name="date">

                <label for="nb_total" class="form-label">Nombre de personnes au total:</label>
                <input type="number" class="form-control border-black mb-4" name="nb_total" min="0" value="0">

                <div class="border border-black rounded-2 p-2">
                <p class="text-center text-decoration-underline">Choix des plats avec le nombre de personnes:</p>
                <div class="row justify-content-between text-start mt-4">

                <div class="col-8">
                    <label for="plat" class="form-label">Choix 1:</label>
                    <select class="form-select border-black mb-2" name="plat">
                    <option value="Aucun" >Aucun</option>
                        <?php
                        $recupPlat = $bd->query('SELECT * FROM plats where id_sorteplat=1');
                        while($plat = $recupPlat->fetch()){
                        ?>
                        <option  value="<?= $plat['nom_plat'] ?>"><?= $plat['nom_plat']?></option>
                        <?php 
                        }
                        ?>
                        <option value="Autre">Autre (à préciser)</option>
                </select>
            </div>
                    <div class="col-4">
                        <label for="nb_plat" class="form-label">Nb:</label>
                        <input type="number" class="form-control border-black mb-2" name="nb_plat" min="0" value="0">
                    </div>
                </div>
                <div class="row justify-content-between text-start mt-4">
                    <div class="col-8">
                        <label for="plat_2" class="form-label">Choix 2:</label>
                        <select class="form-select border-black mb-2" name="plat_2">
                             <option value="Aucun" >Aucun</option>
                                <?php
                                $recupPlat = $bd->query('SELECT * FROM plats where id_sorteplat=1');
                                while($plat = $recupPlat->fetch()){
                                ?>
                                <option  value="<?= $plat['nom_plat'] ?>"><?= $plat['nom_plat']?></option>
                                <?php 
                                }
                                ?>
                                <option value="Autre">Autre (à préciser)</option>
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="nb_plat_2" class="form-label">Nb:</label>
                        <input type="number" class="form-control border-black mb-2" name="nb_plat_2" min="0" value="0">
                    </div>
                </div>
                <div class="row justify-content-between text-start mt-4">
                    <div class="col-8">
                    <label for="plat_3" class="form-label">Choix 3:</label>
                    <select class="form-select border-black mb-2" name="plat_3">
                        <option value="Aucun" >Aucun</option>
                        <?php
                        $recupPlat = $bd->query('SELECT * FROM plats where id_sorteplat=1');
                        while($plat = $recupPlat->fetch()){
                        ?>
                        <option  value="<?= $plat['nom_plat'] ?>"><?= $plat['nom_plat']?></option>
                        <?php 
                        }
                        ?>
                        <option value="Autre">Autre (à préciser)</option>
                </select>
                    </div>
                    <div class="col-4">
                    <label for="nb_plat_3" class="form-label">Nb:</label>
                    <input type="number" class="form-control border-black mb-2" name="nb_plat_3" min="0" value="0">
                    </div>
                </div>
                </div>
                <div class="border border-black rounded-2 mt-4 p-2">
                <p class="text-center text-decoration-underline">Choix des desserts avec le nombre de personnes:</p>
                <div class="row justify-content-between text-start mt-4">
                    <div class="col-8">
                    <label for="dessert" class="form-label">Choix 1:</label>
                    <select class="form-select border-black mb-2" name="dessert">
                        <option value="Aucun" >Aucun</option>
                            <?php
                            $recupDessert = $bd->query('SELECT * FROM plats where id_sorteplat=2');
                            while($dessert = $recupDessert->fetch()){
                            ?>
                            <option  value="<?= $dessert['nom_plat'] ?>"><?= $dessert['nom_plat']?></option>
                            <?php 
                            }
                            ?>
                        <option value="Autre">Autre (à préciser)</option>
                    </select>
                    </div>

                    <div class="col-4">
                    <label for="nb_dessert" class="form-label">Nb:</label>
                    <input type="number" class="form-control border-black mb-2" name="nb_dessert" min="0" value="0">
                    </div>
                </div>
                <div class="row justify-content-between text-start mt-4">
                    <div class="col-8">
                    <label for="dessert_2" class="form-label">Choix 2:</label>
                    <select class="form-select border-black mb-2" name="dessert_2">
                        <option value="Aucun" >Aucun</option>
                            <?php
                            $recupDessert = $bd->query('SELECT * FROM plats where id_sorteplat=2');
                            while($dessert = $recupDessert->fetch()){
                            ?>
                            <option  value="<?= $dessert['nom_plat'] ?>"><?= $dessert['nom_plat']?></option>
                            <?php 
                            }
                            ?>
                        <option value="Autre">Autre (à préciser)</option>
                    </select>
                    </div>
                    <div class="col-4">
                    <label for="nb_dessert_2" class="form-label">Nb:</label>
                    <input type="number" class="form-control border-black mb-2" name="nb_dessert_2" min="0" value="0">
                    </div>
                </div>
                <div class="row justify-content-between text-start mt-4">
                    <div class="col-8">
                    <label for="dessert_3" class="form-label">Choix 3:</label>
                    <select class="form-select border-black mb-2" name="dessert_3">
                        <option value="Aucun" >Aucun</option>
                            <?php
                            $recupDessert = $bd->query('SELECT * FROM plats where id_sorteplat=2');
                            while($dessert = $recupDessert->fetch()){
                            ?>
                            <option  value="<?= $dessert['nom_plat'] ?>"><?= $dessert['nom_plat']?></option>
                            <?php 
                            }
                            ?>
                        <option value="Autre">Autre (à préciser)</option>
                    </select>
                    </div>

                    <div class="col-4">
                    <label for="nb_dessert_3" class="form-label">Nb:</label>
                    <input type="number" class="form-control border-black mb-2" name="nb_dessert_3" min="0" value="0">
                    </div>
                </div>
                </div>

                <label for="message" class="form-label mt-4">Précisions(facultatif):</label>
                <textarea class="form-control border-black" name="message" rows="5"></textarea>

                <label for="from" class="form-label mt-4">Votre e-mail:</label>
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