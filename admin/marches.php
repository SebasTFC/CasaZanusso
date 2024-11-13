<?php 
include_once("../admin/header_admin.php")
?>

<div class="container-fluid my-5"> 
    <div class="row justify-content-between">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Créer/Modifier un marché</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data" class="fs-6">
            
                <div class="form-group p-1">
                    <input type="text" class="form-control" name="id_marche" id="id_marche" style="display:none;"/>
                    <label for="ville_marche" class="form-label text-decoration-underline">Ville:</label>
                    <input type="text" name="ville_marche" class="form-control" id="ville_marche">
                    <div style="color: red;" class="mt-1"id="nomError"></div>
                </div>

                <div class="form-group p-1">
                    <label for="adresse_marche" class="form-label text-decoration-underline">Adresse:</label>
                    <input type="text" name="adresse_marche" class="form-control" id="adresse_marche">
                </div>

                <div class="form-group p-1" id="jour">
                    <label for="jour_marche" class="form-label">Jour :</label>
                    <select  id="jour_marche" name="jour_marche"class="form-control">
                        <option value="Lundi" selected>Lundi</option>
                        <option value="Mardi">Mardi</option>
                        <option value="Mercredi">Mercredi</option>
                        <option value="Jeud">Jeudi</option>
                        <option value="Vendredi">Vendredi</option>
                        <option value="Samedi">Samedi</option>
                        <option value="Dimanche">Dimanche</option>
                    </select>
                </div>

                <div class="form-group p-1">
                    <label for="frequence_marche" class="form-label text-decoration-underline">Frequence :</label>
                    <select id="frequence_marche" name="frequence_marche"class="form-control" onchange="choix(this)">
                        <option value="Hebdomadaire" >Hebdomadaire</option>
                        <option value="Exceptionnel">Exceptionnel</option>
                    </select>
                </div>

                <div class="form-group p-1" id="date" style="display:none;">
                    <label for="date_marche" class="form-label text-decoration-underline">Date:</label>
                    <input type="date" name="date_marche" class="form-control" id="date_marche" >
                </div>

                <div class="form-group p-1" id="eve" style="display:none;">
                    <label for="evenement_marche" class="form-label text-decoration-underline" >Evenement:</label>
                    <input type="text" name="evenement_marche" class="form-control" id="evenement_marche">
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
                        <h2 class="bg-success p-2 text-center">Liste des plats</h2>
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped text-center align-middle table-responsive" id="pagination" >
                                <thead class="table-success ">
                                    <tr>
                                        <th scope="col">Ville:</th>
                                        <th scope="col">Adresse:</th>
                                        <th scope="col">Jour:</th>
                                        <th scope="col">Fréquence:</th>
                                        <th scope="col">Date:</th>
                                        <th scope="col">Evènement:</th>
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
<script>
    
</script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="../js/marche_ajax.js"></script>
</body>
</html>