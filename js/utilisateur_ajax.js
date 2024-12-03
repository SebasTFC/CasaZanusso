
$(document).ready(function (){

   

    function validatePassword(){
        
        let passworde = document.getElementById('password_utilisateur').value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,}$/;
        if(!passworde.match(passwordRegex)){
            passwordError.innerHTML="Le mot de passe n'est pas valide";
            return true;
        } else {
            passwordError.innerHTML="";
            return false;
        }  
    }
    function validateEmail(){
        let emaile = document.getElementById('email_utilisateur').value;
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    
        if(emaile.length == 0){
            emailError.innerHTML="L'email est requis";
            return true;
        }
        if(!emaile.match(emailRegex)){
            emailError.innerHTML="L'adresse n'est pas valide";
            return true;
        }
        emailError.innerHTML='';
        return false;
        
    }

    // Ajax Request for retrieving data
    function showdata(){
        output = "";
        $.ajax({
            url: "../admin/affiche_utilisateur.php",
            method: "GET",
            dataType: "json",
            success: function(data){
                if(data){
                    x=data;
                }else{
                    x="";
                }
                for(i=0;i<x.length;i++){
                    output += "<tr><td>"+x[i].mail+"</td><td>"+x[i].password+"</td><td>" +"<button class='btn-del border-1 border-light'data-sid=" +x[i].id_user + "><i class='bi bi-trash'></i></button></td></tr>";
                    $("#tbody").html(output);
                }
            }
        })  
    }
   
    showdata();

    $("#upload-box").submit(function(e){
        e.preventDefault();
        if(!validatePassword() && !validateEmail()){
        $.ajax({
                url: '../admin/submit_utilisateur.php',
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
    });
    

    // Ajax Request for deleting
    $("tbody").on("click",".btn-del",function(){
        let id_user = $(this).attr("data-sid");
        mydata = {sid: id_user};
        $.ajax({
            url:"../admin/delete_utilisateur.php",
            method:"POST",
            data: JSON.stringify(mydata),
            success:function(data){
                $("#message").html(data);
                showdata(); 
            },
        })
    });
   
    });
    
    