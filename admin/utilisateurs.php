<?php 
include_once("../admin/header_admin.php");
include_once("../front/connect_mysql.php");
?>
<div class="container-fluid my-5"> 
    <div class="row justify-content-between">
        <div class="col-lg-4 col-12">
            <div class="border p-3">
            <h2 class="bg-success p-2 text-center">Créer/Modifier un utilisateur</h2>    
            <form action="#" method="post" id="upload-box" enctype="multipart/form-data" class="fs-6">
                <div class="form-group p-1">
                    <input type="hidden" class="form-control" id="id_utilisateur"/>
                    <label for="email_utilisateur" class="form-label">E-mail:</label>
                    <input type="email" class="form-control" name="email_utilisateur" id="email_utilisateur"/>
                    <div style="color: red;" class="mt-1"id="emailError"></div>

                    <label for="password_utilisateur" class="form-label ">Password:</label>
                    <input type="text" name="password_utilisateur" class="form-control" id="password_utilisateur" autocomplete="off">
                    <div style="color: red;" class="mt-1"id="passwordError"></div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-warning rounded-0 my-4" id="btnadd">Enregistrer</button>
                    </div>
                </div>
                <div class="alert alert-danger text-center" id="message" style="display:none;"></div>           
            </form>
            </div>
            <br/><br/>
        </div> 
            
                <div class="col-lg-8 col-12">
                    <div class="border p-3">
                        <h2 class="bg-success p-2 text-center">Liste des utilisateurs</h2>
                        <div style="overflow-x: auto;">
                            <table class="table table-bordered table-striped text-center align-middle table-responsive" id="pagination" >
                                <thead class="table-success ">
                                    <tr>
                                        <th scope="col">E-mail:</th>
                                        <th scope="col">Password:</th>
                                        <th scope="col">Action:</th>
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
<script src="../js/utilisateur_ajax.js"></script>
</body>
</html>