 $("#estado1").on("change",function(){
            var idEstado = $("#estado1").val();
           $.ajax({
                url: 'pega_cidade.php',
                type: 'POST',
                data:{id:idEstado},
                beforeSend: function(){
                
                  $("#cidade1").html("Carregando...");    
                },
                success: function(data){
              
                  $("#cidade1").html(data);  
                },
                error: function(data){
                  $("#cidade1").html("Houve um erro ao carregar");
                    
                    
                }
                
                
            });
           
          
            
                });



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


