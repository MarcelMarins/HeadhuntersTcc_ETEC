 $(document).ready(function() {

            $('input').blur(function() {

              if ($(this).val())
                $(this).addClass('used');
              else
            $(this).removeClass('used ');
        
            });


          });
