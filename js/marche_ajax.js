function choix(val){
    var value = val.value;
    if (value == "Hebdomadaire"){
        document.getElementById('date').style.display = 'none';
        document.getElementById('eve').style.display = 'none';
        document.getElementById('jour').style.display = 'block';
    } else if (value == "Exceptionnel"){
        document.getElementById('date').style.display = 'block';
        document.getElementById('eve').style.display = 'block';
        document.getElementById('jour').style.display = 'none';
    }
};


$(document).ready(function (){
   
    function validateNomVille(){
      let ville_marche = document.getElementById('ville_marche').value;
      
      if(ville_marche.length == 0){
          nomError.innerHTML="Le nom de la ville est requis";
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
              url: "../admin/afficheMarches.php",
              method: "GET",
              dataType: "json",
              success: function(data){
                  if(data){
                      x=data;
                  }else{
                      x="";
                  }
                  for(i=0;i<x.length;i++){
                    if(x[i].frequence_marche=="Hebdomadaire"){
                      output += "<tr><td>"+ x[i].ville_marche+ "</td><td>"+x[i].adresse_marche+"</td><td>"+x[i].jour_marche+"</td><td style='text-align:center;'>"+x[i].frequence_marche+"</td><td class='bg-black'>"+x[i].date_marche+"</td><td class='bg-black'>"+x[i].evenement_marche+"</td><td style='text-align:center;'>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id_marche + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id_marche +"><i class='bi bi-trash'></i></button></td></tr>";
                      $("#tbody").html(output);
                    } else  if(x[i].frequence_marche=="Exceptionnel"){
                        output += "<tr><td>"+ x[i].ville_marche+ "</td><td>"+x[i].adresse_marche+"</td><td class='bg-black'>"+x[i].jour_marche+"</td><td style='text-align:center;'>"+x[i].frequence_marche+"</td><td>"+x[i].date_marche+"</td><td>"+x[i].evenement_marche+"</td><td style='text-align:center;'>"+"<button class='border-1 border-success btn-edit'data-sid=" +x[i].id_marche + "><i class='bi bi-pencil-square'></i></button>  <button class='btn-del border-1 border-warning'data-sid=" +x[i].id_marche +"><i class='bi bi-trash'></i></button></td></tr>";
                      $("#tbody").html(output);
                  }
                };
                  
                  $('#pagination').DataTable({
                      lengthMenu: [
                          [3, 10,-1],
                          [3, 10, 'Tous'],
                      ],
                      "info":     false,
                      pagingType: 'simple_numbers',
                      language: {
                          lengthMenu: 'Marchés/Page: _MENU_',
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
          if(!validateNomVille()){
          $.ajax({
                  url: 'submit_marche.php',
                  method: 'POST',
                  data: new FormData(this),
                  contentType: false,
                  processData: false,
                  success: function(data){
                      $("#message").show();
                      $("#message").html(data);
                      $("#jour").show();
                      $("#eve").hide();
                      $("#date").hide();
                      $("#upload-box")[0].reset();
                      $('#btnadd').html("Enregistrer");
                      showdata();
                  }
                  });
              }
              validateNomVille();
      });  
  
      // Ajax Request for deleting
      $("tbody").on("click",".btn-del",function(){
          let id_plat = $(this).attr("data-sid");
          mydata = {sid: id_plat};
          $.ajax({
              url:"delete_marche.php",
              method:"POST",
              data: JSON.stringify(mydata),
              success:function(data){
                  $("#message").html(data);
                  $("#jour").show();
                  $("#eve").hide();
                  $("#date").hide();
                  $("#upload-box")[0].reset();
                  showdata(); 
              },
          })
      });

      // Ajax Request for editing
      $("tbody").on("click",".btn-edit",function(){
          $('#btnadd').html("Modifier");
          let id_marche = $(this).attr("data-sid");
          mydata = {sid: id_marche};
          $("#jour").show();
          $("#eve").hide();
          $("#date").hide();
          $.ajax({
              url:"../admin/edit_marche.php",
              method:"POST",
              dataType: "json",
              data: JSON.stringify(mydata),
              success:function(data){
                
                    $("#id_marche").val(data.id_marche);
                    $("#ville_marche").val(data.ville_marche);
                    $("#adresse_marche").val(data.adresse_marche);
                    $("#jour_marche").val(data.jour_marche);
                    $("#frequence_marche").val(data.frequence_marche);
                    let o= data.frequence_marche;
                    $("#date_marche").val(data.date_marche);
                    $("#evenement_marche").val(data.evenement_marche);
                    
                    if (o=="Hebdomadaire"){
                        $("#jour").show();
                        $("#eve").hide();
                        $("#date").hide(); 
                        console.log(o);
                    } else if (o=="Exceptionnel"){
                        $("#jour").hide();
                        $("#eve").show();
                        $("#date").show();
                        console.log(o);
                    }
                  showdata(); 
              }
          })
      });
      });