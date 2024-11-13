<?php
session_start();
include_once('../front/header.html');
include("../front/connect_mysql.php");
?>
<div class="container-fluid">
    <div class="mb-5 text-center">
        <div class="row mt-3 justify-content-center">
            <div class="col-12 col-lg-4">
            <h1 class="dancing-script-menu bg-success p-2" style="font-size: 3rem;color:yellow;">Liste de nos plats:</h1>
        </div>
    </div>

    <?php
        $recupPlats = $bd->query("SELECT * FROM plats WHERE id_sorteplat= 1");
        while($plat = $recupPlats->fetch()){
            
            ?>
                <div class="row mt-3 justify-content-center">
                    <div class="col-12 col-lg-6">
                        <a href="#myModal"  class="text-white fs-5" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $plat['id_plat']?>">
                        <?php echo $plat['nom_plat'] ?></a>
                    </div>
                </div>
                <div class="modal fade" id="myModal<?php echo $plat['id_plat']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body bg-danger border border-4">
                                <div class="container-fluid p-2">
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <h1 class="fs-2 bg-success p-2 dancing-script-menu" ><?php echo $plat['nom_plat']?></h1>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center pb-2">
                                            <img  style="width: 360px;"src="../images/<?php echo $plat['image_plat']?>" alt="">
                                    </div>
                                    <div class="row justify-content-center pb-3">
                                        <div class="col-md-10">
                                            <h1 class="fs-5 p-2 border border-black dancing-script-menu bg-white" >" <?php echo $plat['description_plat']?>"</h1>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="col-md-10">
                                            <h4 class="fs-6">Prix : <?php echo $plat['prix_plat']?> EUR.</h4>
                                            <h4 class="fs-6"><?php echo $plat['detail_plat']?>.</h4>
                                            <h4 class="fs-6"><?php echo $plat['nb_pers_plat']?> personnes minimum.</h4>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center mt-1">
                                        <div class="col-md-4">
                                            <button type="button" class="btn btn-outline-warning rounded-0" data-bs-dismiss="modal">Fermer</button>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
        }       
      ?> 
    </div>  

<?php
include_once('../front/footer.html');
?>

 

