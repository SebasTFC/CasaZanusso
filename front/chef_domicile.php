<?php
session_start();
include_once('../front/header.html');
?>
<div class="container-fluid">
    <div class="mb-5 text-center">
    <div class="row mt-5 justify-content-center pb-3">
    <div class="col-10 col-lg-5 m-3 text-danger">
        <div class="card border border-5 border-danger bg-success tourne_positif">
            <h5 class="card-title dancing-script-menu text-decoration-underline p-3" style="font-size: 3rem; color:red;">Chef à domicile</h5>
            <img src="../images/domicile.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="dancing-script-menu p-3" style="font-size: 1.3rem; color:black;">
                    <p class="card-text">Envie de recevoir des convives sans devoir galérer derrière les fourneaux.<br>Restez à côté de vos proches, je m’occuperai du reste! </p>
                    <p class="card-text">Partez en Italie, tout en restant chez vous et découvrez les goûts et les saveurs de la « Dolce Vita ».</p>
                    <p class="card-text">Contactez- moi pour un devis personnalisé !</p>
                </div>
                <a href="../front/accueil.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Retour</a>
                <a href="../front/devis.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Devis</a>
            </div>
        </div>
    </div>
        <div class="col-10 col-lg-5 m-3 text-danger">
        <div class="card border border-5 border-danger bg-success tourne">
            <h5 class="card-title dancing-script-menu text-decoration-underline p-3" style="font-size: 3rem; color:red;">Atelier de cuisine italienne</h5>
            <img src="../images/cours_cuisine.jpeg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="dancing-script-menu p-3" style="font-size: 1.3rem; color:black;">
                    <p class="card-text">Envie de perfectionner votre façon de cuisiner, seul ou en groupe, l'atelier de cuisine est fait pour vous.</p>
                    <p class="card-text">Personnalisez vos menus en fonction de vos envies et exigences.</p>
                    <p class="card-text">Contactez- moi pour un devis personnalisé !</p>
                </div>
                <a href="../front/accueil.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Retour</a>
                <a href="../front/devis.php" class="card-link btn btn-outline-warning rounded-0 mt-2">Devis</a>
            </div>
        </div>
    </div>
    </div>
</div>
<?php
include_once('../front/footer.html');
?>