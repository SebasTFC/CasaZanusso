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
                    <p class="card-text">Envie de recevoir sans devoir galérer derrière les fourneaux. Restez à côté des vos convives, je m’occuperai du reste!</p>
                    <p class="card-text">Partez en Italie, tout en restant chez vous et découvrez les goûts et les saveurs de la « Dolce Vita » : bruschette, tagliatelle, ravioli, risotti, tiramisù ou pannecotte… Tous mes plats sont créés à partir de recettes de la tradition italienne élaborée en fonction des vos envies et d’une sélection de produits de qualité locaux et de saison.  
                    </p>
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
                    <p class="card-text">Envie de recevoir sans devoir galérer derrière les fourneaux. Restez à côté des vos convives, je m’occuperai du reste!</p>
                    <p class="card-text">Partez en Italie, tout en restant chez vous et découvrez les goûts et les saveurs de la « Dolce Vita » : bruschette, tagliatelle, ravioli, risotti, tiramisù ou pannecotte… Tous mes plats sont créés à partir de recettes de la tradition italiennes élaborées en fonction des vos envies et d’une sélection de produits de qualité locaux et de saison. Menu toujours personnalisé en fonction de vos envies et exigences, servi directement chez vous ou où vous le souhaitez. 
                    </p>
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