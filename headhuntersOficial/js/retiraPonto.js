 $("#cadastrar").onclik(function(){
            var cpf = $("#cpf").val();
         
         var cpf1  = cpf.replace(".","");
         var cpf2  = cpf1.replace("-","");
         
         (function(cpf2){
              
                  $("#cpf").html(cpf2);  
                });
      
                });






