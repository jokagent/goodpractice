    
    $(document).ready(function () {
     
      $('.vert-nav li').hover(
        function() {
          $('ul', this).slideDown(110);
        },
        function() {
          $('ul', this).slideUp(110);
        }
      );
      

<<<<<<< HEAD
       // var boxWidth = 720;
       // function centerBox() {
       //    var winWidth = $(window).width();
       //    var winHeight = $(document).height();
       //    // var scrollPos = $(document).height()
       //    var disWidth = (winWidth - boxWidth) / 2;
       //    var disHeight = ($(window).height()/2)-230;

       //    $('.entreg').css({'left':disWidth+'px', 'top':disHeight+'px'}).show();
       //    $('#blackout').css({'width':winWidth+'px', 'height':winHeight+'px'}).show();

       //    return false;
       // }
=======
//       var boxWidth = 720;
//       function centerBox() {
//          var winWidth = $(window).width();
//          var winHeight = $(document).height();
//          // var scrollPos = $(document).height()
//          var disWidth = (winWidth - boxWidth) / 2;
//          var disHeight = ($(window).height()/2)-230;
//
//          $('.entreg').css({'left':disWidth+'px', 'top':disHeight+'px'}).show();
//          $('#blackout').css({'width':winWidth+'px', 'height':winHeight+'px'}).show();
//
//          return false;
//       }
>>>>>>> 750e25266a3473a68155e46672a4de9348503193
//         // setTimeout(function(){centerBox();}, 10000);
//         $('.blog_entry').click(function(e){
//          e.preventDefault();
//        $('body').append('<div id="blackout"></div>');
//        // $(window).resize(centerBox);
//        // $(window).scroll(centerBox);
//        centerBox();
//      });
      
      $('#log_link').click(function(){
          $('#log').removeClass("hidden");
          $('#reg').addClass("hidden");

      });
      $('#reg_link').click(function(){
        $('#reg').removeClass("hidden");
          $('#log').addClass("hidden");
      });


      $(document).on('click','#get_access',function(e){
          // $.post('/main/check_login', )
          var email = $('#registr #reg_email').val();
          var name = $('#registr #reg_name').val();
          var phone = $('#registr #reg_phone').val();
           if (email && name && phone) {
              $.ajax({
                type:'POST',
                url:'http://goodcrm.ru/',//привлеченные
                data:{
                  'email':email,
                  'name':name,
                  'phone':phone
                },
                dataType:'json'

              });
               $.ajax({
                type:'POST',
                url:'/auth/registr',
                data:{
                  'email':email,
                  'name':name,
                  'phone':phone
                },
                dataType:'json',
                success: function(data){
                  $('#registr_form').addClass('hidden');
                  $('#thanks').removeClass('hidden');
                  console.log(data)
                  // location.href='http://orangeriver.ru';

                }
              });
           }
          
      });

       $(document).on('click','#enter_submit',function(){
           // var data = {
           //     email :$('#log #enter_email').val(),
           //     password : $('#log #password').val()
           // }
           $.ajax({
              type: 'POST',
              url: '/auth/login',
              data: {
               email :$('#log #enter_email').val(),
               password : $('#log #password').val()
           },
           dataType:'json',
           success: function(data){
                console.log(data);if(data.status) location.href='/'; else alert(data.message)
           }
           })

            //$.post('/auth/login',data,function(data){console.log(data);if(data.status) location.href='/'; else alert(data.message)});

       });


    });
    
