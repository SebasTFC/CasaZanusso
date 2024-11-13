<!-- début de l'application -->
<?php
session_start();
include_once("../front/header.html");
if (isset($_GET['nb'])) {
?>
        <div class="alert alert-warning alert-dismissible fade show m-5" role="alert">
            <strong>Vous ètes notre <?php echo $_GET['nb'] ?>ème visiteur. Bonne consultation !!!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php
};
 ?>

<div class="container-fluid">
    <div class="mb-5 text-center">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <div class="text-center rounded-2">
                                <img src="/images/plat_italien.jpg" style="width: 100%; height: 25rem;" class="border border-5 border-warning rounded-4 opacity-75" alt="...">  
                                <div class="col-md-4 centered dancing-script-menu border border-2 border-warning fw-bold">
                                    <h2 style="font-size: 2.5rem; color:yellow;">Traiteur et Chef à domicile </h2>
                                </div>
                            </div>
                        </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <div class="text-center rounded-2" >
                            <img src="/images/cannelloni.jpg" style="width: 100%; height: 25rem;" class="border border border-5 border-warning rounded-4 opacity-75" alt="...">
                            <div class="col-md-4 centered dancing-script-menu border border-2 border-warning fw-bold">
                                    <h2 style="font-size: 2.5rem;color:yellow;">Traiteur et Chef à domicile </h2>
                            </div> 
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="5000">
                        <div class="text-center rounded-2" >
                            <img src="/images/pannacota.jpg" style="width: 100%; height: 25rem;" class="border border border-5 border-warning rounded-4 opacity-75" alt="...">
                            <div class="col-md-4 centered dancing-script-menu border border-2 border-warning fw-bold">
                                    <h2 style="font-size: 2.5rem;color:yellow;">Traiteur et Chef à domicile </h2>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="row mt-5 justify-content-center pb-3">
    <div class="col-10 col-lg-4 m-3 text-danger tourne_positif">
        <div class="card border border-5 border-white bg-success">
            <h5 class="card-title dancing-script-menu text-decoration-underline p-1" style="font-size: 2rem; color:red;">Traiteur</h5>
            <img src="/images/buffet.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="dancing-script-menu" style="font-size: 1.2rem; color:black;">
                    <p class="card-text">Vous organisez un séminaire, une fête de famille, un èvenement particulier ?</p>
                    <p class="card-text">Besoin d'un chef à domicile pour épater famille ou amis?</p>
                    <p class="card-text">N'hesitez pas à nous contacter.</p>
                </div>
                <a href="../front/chef_domicile.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Chef à domicile</a>
                <a href="../front/devis.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Devis</a>
            </div>
        </div>
    </div>

    <div class="col-10 col-lg-4 m-3 text-success tourne">
        <div class="card border border-5 border-white bg-danger">
            <h5 class="card-title dancing-script-menu text-decoration-underline p-1" style="font-size: 2rem; color:green;">Epicerie italienne</h5>
            <img src="/images/pannacota.jpg" class="card-img-top" alt="...">
            <div class="card-body">
            <div class="dancing-script-menu" style="font-size: 1.2rem; color:black;">
                    <p class="card-text">Tous nos plats et desserts sont faits maison avec des produits frais et de qualité.</p>
                    <p class="card-text">N'hesitez pas à nous demander vos propres envies si elles ne figuraient pas dans la liste !</p>
                </div>
                <a href="../front/plats_accueil.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Plats</a>
                <a href="../front/desserts_accueil.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Desserts</a>
            </div>
        </div>
    </div>

  <div class="row mt-5 justify-content-center pb-3">
        <div class="col-10 col-lg-4 m-3 text-success tourne">
            <div class="card  border border-5 border-white bg-danger">
                <h5 class="card-title dancing-script-menu text-decoration-underline p-1" style="font-size: 2rem; color:green;">Les marchés</h5>
                <img src="/images/marche.jpg" class="card-img-top" alt="...">
                
                <div class="card-body">
                    <div class="dancing-script-menu" style="font-size: 1.2rem; color:black;">
                        <p class="card-text">Nous serons présent sur quelques marchés votre région.</p>
                        <p class="card-text">Vous pourrez egalement nous suivre sur certains èvènements, comme les marchés de Noël ou les foires.</p>
                    </div>
                    <a href="../front/marche_accueil.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Liste</a>
                </div>
            </div>
        </div>

        <div class="col-10 col-lg-4 m-3 text-success tourne_positif">
            <div class="card border border-5 border-white bg-success">
                <h5 class="card-title dancing-script-menu text-decoration-underline p-1" style="font-size: 2rem; color:red;display: inline;">Qui sommes-nous?</h5>
                <img src="/images/logo_CasaZanusso.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="dancing-script-menu" style="font-size: 1.2rem; color:black;">
                        <p class="card-text">Amoureux de la cuisine et en particulier Italienne, j'ai toujours voulu lier le côté professionnel au côté plaisir en voulant faire découvrir la saveur culinaire d'une grande gastronomie.</p>
                    </div>
                    <a href="#" class="card-link btn btn-outline-warning rounded-0 mt-2">Historique</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- fin de l'application -->
<?php
include_once("../front/footer.html");
?>