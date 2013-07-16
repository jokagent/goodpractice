    
    $(document).ready(function () {
     
      $('.vert-nav li').hover(
        function() {
          $('ul', this).slideDown(110);
        },
        function() {
          $('ul', this).slideUp(110);
        }
      );
      

       var boxWidth = 720;
       function centerBox() {
          var winWidth = $(window).width();
          var winHeight = $(document).height();
          // var scrollPos = $(document).height()
          var disWidth = (winWidth - boxWidth) / 2;
          var disHeight = ($(window).height()/2)-230;

          $('.entreg').css({'left':disWidth+'px', 'top':disHeight+'px'}).show();
          $('#blackout').css({'width':winWidth+'px', 'height':winHeight+'px'}).show();

          return false;
       }
         // setTimeout(function(){centerBox();}, 10000);
         $('.posts').click(function(e){
          e.preventDefault();
        $('body').append('<div id="blackout"></div>');
        // $(window).resize(centerBox);
        // $(window).scroll(centerBox);
        centerBox();
      });
      
      $('#log_link').click(function(){
          $('#log').removeClass("hidden");
          $('#reg').addClass("hidden");

      });
      $('#reg_link').click(function(){
        $('#reg').removeClass("hidden");
          $('#log').addClass("hidden");
      });


      $(document).on('click','#get_access',function(e){
          var email = $('#registr #reg_email').val();
          var name = $('#registr #reg_name').val();
          var phone = $('#registr #reg_phone').val();
           if (email && name && phone) {
              $.ajax({
                type:'POST',
                url:'http://goodcrm.ru/crm/insertSegment',
                data:{
                  'email':email,
                  'name':name,
                  'phone':phone
                },
                dataType:'json',
                success: function(data){
                  $('#registr_form').addClass('hidden');
                  $('#thanks').removeClass('hidden');
                  // location.href='http://orangeriver.ru';

                }
              });     
           }
          
      });

    });
    
