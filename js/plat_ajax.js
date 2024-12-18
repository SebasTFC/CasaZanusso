$(document).ready(function (){
   
    function validateNomPlat(){
      let nom_plat = document.getElementById('nom_plat').value;
      
      if(nom_plat.length == 0){
          nomError.innerHTML="Le nom de la formule est requis";
          return true;
      } else {
          nomError.innerHTML="";
          return false;
      } 
  };
  
      // Ajax Request for retrieving data
      function showdata(){
          output = "";
          $("#pagination").DataTable().destroy();
          
          $.ajax({
              url: "../admin/affichePlats.php",
              method: "GET",
              dataType: "json",
              success: function(data){
                  if(data){
                      x=data;
                  }else{
                      x="";
                  }
                  for(i=0;i<x.length;i++){
                      output += "<tr><td>"+ x[i].nom_plat+"</td><td>"+ x[i].nom_sorte+ "</td><td style='text-align:center;'><img style='width:100px;' src='/images/" +x[i].image_plat+"'></td><td>"+x[i].description_plat+"</td><td>"+x[i].detail_plat+"</td><td style='text-align:center;'>"+x[i].prix_plat+"</td><td style='text-align:center;'>"+x[i].nb_pers_plat+"</td><td>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id_plat + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id_plat +"><i class='bi bi-trash'></i></button></td></tr>";
                      $("#tbody").html(output);
                  }
                  
                  $('#pagination').DataTable({
                      lengthMenu: [
                          [3, 10,-1],
                          [3, 10, 'Tous'],
                      ],
                      "info":     false,
                      pagingType: 'simple_numbers',
                      language: {
                          lengthMenu: 'Plats/Page: _MENU_',
                          search: 'Rechercher :',                                          
                      },
                  });      
              }
          })  
      }
      showdata();
      
      //Ajax Request for insert
      $("#upload-box").submit(function(e){
          e.preventDefault();
          $( '#pagination' ).DataTable().destroy();
          if(!validateNomPlat()){
          $.ajax({
                  url: 'submit.php',
                  method: 'POST',
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  success: function(data){
                      $("#message").show();
                      $("#message").html(data);
                      $("#upload-box")[0].reset();
                      $('#btnadd').html("Enregistrer");
                      showdata();
                  }
                  });
              }
              validateNomPlat();
      });  
  
      // Ajax Request for deleting
      $("tbody").on("click",".btn-del",function(){
          let id_plat = $(this).attr("data-sid");
          mydata = {sid: id_plat};
          $.ajax({
              url:"delete.php",
              method:"POST",
              data: JSON.stringify(mydata),
              success:function(data){
                  $("#message").html(data);
                  $("#upload-box")[0].reset();
                  showdata(); 
              },
          })
      });

      // Ajax Request for editing
      $("tbody").on("click",".btn-edit",function(){
          $('#btnadd').html("Modifier");
          let id_plat = $(this).attr("data-sid");
          mydata = {sid: id_plat};
          
     
    
          $.ajax({
              url:"../admin/edit.php",
              method:"POST",
              dataType: "json",
              data: JSON.stringify(mydata),
              success:function(data){
                
                  $("#id_plat").val(data.id_plat);
                  $("#nom_plat").val(data.nom_plat);     
                  //$("#image_plat").attr(data.image_plat.files[0]);
                  $("#description_plat").val(data.description_plat);
                  $("#prix_plat").val(data.prix_plat);
                  $("#detail_plat").val(data.detail_plat);
                  $("#pers_min_plat").val(data.nb_pers_plat);
                  $("#sorte").val(data.id_sorte);      
              }
          })
      });
      });
      
      