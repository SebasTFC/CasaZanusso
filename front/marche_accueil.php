<?php
session_start();
include_once('../front/header.html');
include("../front/connect_mysql.php");
?>
<div class="container-fluid">
    <div class="mb-5 text-center">
        <div class="row mt-3 justify-content-center">
            <div class="col-12 col-lg-4">
            <h1 class="dancing-script-menu bg-success p-2" style="font-size: 3rem;color:yellow;">Liste des marchés:</h1>
        </div>
    </div>

    <div class="row mt-3 justify-content-center">
    <div class="col-12 col-lg-8">
    <h2 class="dancing-script-menu p-2 text-decoration-underline" style="font-size: 2rem;color:yellow;">Hebdomadaire:</h2>
    <table class="table table-warning table-bordered border-3 border-black">
        <thead>
            <tr class="table table-success table-bordered  border-black">
                <th scope="col">Ville</th>
                <th scope="col">Adresse</th>
                <th scope="col">Jour</th>
            </tr>
        </thead>
    <tbody>
    <?php
        $recupMarches = $bd->query("SELECT * FROM marches where frequence_marche='Hebdomadaire'");
        while($marche = $recupMarches->fetch()){  
    ?> 
        <tr>
            <td><?php echo $marche['ville_marche'] ?></td>
            <td><?php echo $marche['adresse_marche'] ?></td>
            <td><?php echo $marche['jour_marche'] ?></td>
        </tr>
 
        <?php
        }       
      ?>
       </tbody>
       </table> 
    </div>
    </div>

    

    <div class="row mt-3 justify-content-center mt-5">
    <div class="col-12 col-lg-8">
    <h2 class="dancing-script-menu p-2 text-decoration-underline" style="font-size: 2rem;color:yellow;">Exceptionnel:</h2>
    <table class="table table-warning table-bordered border-3 border-black">
        <thead>
            <tr class="table table-success table-bordered  border-black">
                <th scope="col">Ville</th>
                <th scope="col">Adresse</th>
                <th scope="col">Date</th>
                <th scope="col">Evènement</th>
            </tr>
        </thead>
    <tbody>
    <?php
        $recupMarches = $bd->query("SELECT * FROM marches where frequence_marche='Exceptionnel'");
        while($marche = $recupMarches->fetch()){  
    ?> 
        <tr>
            <td><?php echo $marche['ville_marche'] ?></td>
            <td><?php echo $marche['adresse_marche'] ?></td>
            <td><?php echo $marche['date_marche'] ?></td>
            <td><?php echo $marche['evenement_marche'] ?></td>
        </tr>
 
        <?php
        }       
      ?>
       </tbody>
       </table> 
    </div>
    </div>
    </div>  

<?php
include_once('../front/footer.html');
?>