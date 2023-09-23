 $("#estado").on("change",function(){
            var idEstado = $("#estado").val();
           $.ajax({
                url: 'pega_cidade.php',
                type: 'POST',
                data:{id:idEstado},
                beforeSend: function(){
                
                  $("#cidade").html("Carregando...");    
                },
                success: function(data){
              
                  $("#cidade").html(data);  
                },
                error: function(data){
                  $("#cidade").html("Houve um erro ao carregar");
                    
                    
                }
                
                
            });
           
          
            
                });



