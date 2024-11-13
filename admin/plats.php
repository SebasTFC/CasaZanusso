<?php 
include_once("../admin/header_admin.php");
include_once("../front/connect_mysql.php");
?>

<div class="container-fluid my-5"> 
    <div class="row justify-content-between">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Créer/Modifier une formule</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data" class="fs-6">

                <div class="form-group p-1">
                    <label for="sorte" class="form-label">Formule:</label>
                    <select id="sorte" name="sorte" class="form-control">
                        <?php
                        $recupSorte = $bd->query('SELECT * FROM sorte');
                        while($sorte = $recupSorte->fetch()){
                        ?>
                        <option  value="<?= $sorte['id_sorte'] ?>"><?= $sorte['nom_sorte']?></option>
                        <?php 
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group p-1">
                    <input type="text" class="form-control" name="id_plat" id="id_plat" style="display:none;"/>
                    <label for="nom_plat" class="form-label text-decoration-underline">Nom:</label>
                    <input type="text" name="nom_plat" class="form-control" id="nom_plat">
                    <div style="color: red;" class="mt-1"id="nomError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="description_plat" class="form-label text-decoration-underline">Description:</label>
                    <textarea type="text" name="description_plat" class="form-control" row="5" id="description_plat"></textarea>
                </div>
                    
                <div class="form-group p-1">
                    <label for="image_plat" class="form-label text-decoration-underline">Image:</label>
                    <input type="file" id="image_plat" name="image_plat" class="form-control">
                </div>

                <div class="form-group p-1">
                    <label for="prix_plat" class="form-label text-decoration-underline">Prix:</label>
                    <input type="decimal" id="prix_plat" name="prix_plat" class="form-control">
                </div>

                <div class="form-group p-1">
                    <label for="detail_plat" class="form-label text-decoration-underline">Détail du prix</label>
                    <div class="container row justify-content-center">
                        <div class=" col-6 form-check">
                            <input class="form-check-input" type="radio" name="detail_plat" id="detail_plat1" value="Prix au kilo" checked>
                            <label class="form-check-label" for="detail_plat">Prix au kilo:</label>
                        </div>
                        <div class="col-6 form-check">
                            <input class="form-check-input" type="radio" name="detail_plat" id="detail_plat2" value="Prix par personne">
                            <label class="form-check-label" for="detail_plat">Prix par personne:</label>
                        </div>
                    </div>
                    <div style="color: red;" class="mt-1"id="detailError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="pers_min_plat" class="form-label">Nb personnes minimal pour ce plat:</label>
                    <input type="number" id="pers_min_plat" name="pers_min_plat" class="form-control">
                    <div style="color: red;" class="mt-1"id="persError"></div>
                </div>


                <div class="text-center p-1">
                    <button type="submit" class="btn btn-outline-warning rounded-0 my-4" id="btnadd">Enregistrer</button>
                </div>
                <div class="alert alert-danger text-center" id="message" style="display:none;"></div>           
            </form>
            </div>
            <br/><br/>
        </div> 
            
                <div class="col-lg-8 col-12">
                    <div class="border p-3">
                        <h2 class="bg-success p-2 text-center">Liste des formules</h2>
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped text-center align-middle table-responsive" id="pagination" >
                                <thead class="table-success ">
                                    <tr>
                                        <th scope="col">Nom:</th>
                                        <th scope="col">Formule:</th>
                                        <th scope="col">Image:</th>
                                        <th scope="col">Description:</th>
                                        <th scope="col">Detail:</th>
                                        <th scope="col">Prix:</th>
                                        <th scope="col">Nb min</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody"></tbody>
                            </table>
                        </div>
                        <div class="text-center mt-3">
                            <a href="/admin/fond_admin.php" class="btn btn-outline-warning rounded-0">Retour</a>
                        </div>
                    </div> 
                </div>
        </div>
    </div>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="../js/plat_ajax.js"></script>
</body>
</html>