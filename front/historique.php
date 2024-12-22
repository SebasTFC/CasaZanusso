<?php
session_start();
include_once('../front/header.html');
include("../front/connect_mysql.php");
?>
<div class="container-fluid">
    <div class="mt-5 text-center">
        <div class="row mt-3 justify-content-center">
            <div class="col-12 col-lg-4">
            <h1 class="dancing-script-menu bg-success p-2" style="font-size: 3rem;color:yellow;">Qui sommes-nous?</h1>
        </div>
    </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-3 m-3">
                <img src="../images/alex.JPG" alt="Alexandre" class="rounded-circle" style="width: 90%;">
            </div>
            <div class="col-12 col-lg-3 m-3 align-self-center">
                <h1 class="dancing-script-menu p-2 " style="font-size: 1.6rem;color:yellow;">Alexandre, autoditacte dans le domaine de la cuisine.<br><br>"J'ai toujours conçu, depuis ma plus tendre enfance, des plats qui sortent de l'ordinaire. La cuisine est un art"</h1>
            </div>
        </div>
        <div class="row mt-5 justify-content-center">
            <div class="col-12 col-lg-3 m-3 align-self-center">
                <h1 class="dancing-script-menu p-2" style="font-size: 1.6rem;color:yellow;">Amoureux de la cuisine et en particulier Italienne, j'ai toujours voulu lier le côté professionnel au côté plaisir en voulant faire découvrir la saveur culinaire d'une grande gastronomie.</h1>
            </div>
            <div class="col-12 col-lg-3 m-3">
                <img src="../images/table_plat.JPG" alt="Table"  style="width: 70%;">
            </div>
            
        </div>
        <div class="row my-5 justify-content-center">
            <div class="col-12 col-lg-3 p-3">
                <img src="../images/camion_barbecue2.JPG" alt="Camion traiteur" class="rounded-circle" style="width: 100%;">
                
            </div>
            <div class="col-12 col-lg-3 p-3 align-self-center">
                <h1 class="dancing-script-menu p-2" style="font-size: 1.6rem;color:yellow;">L'entreprise est situé dans la région Toulousaine.N'hésitez pas à me contacter pour la réalisation de vos projets de réception.</h1>
            </div>
        </div>
    

</div>
<?php
include_once("../front/footer.html");
?>