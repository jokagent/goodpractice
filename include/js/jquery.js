    $(document).ready(function () {
         
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
          var password = $('#registr #reg_pas').val();
          var repassword = $('#registr #reg_repas').val();
          if (phone.length < 6) {
            $('#phone_error').removeClass('hidden');
          }
          else {
              $('#phone_error').addClass('hidden');
          }
          if (!(email.indexOf('@')+1)) {
            $('#email_error').removeClass('hidden');
          }
          else {
              $('#email_error').addClass('hidden');
          }
          if (password.length < 6) {
            $('#password_error').removeClass('hidden');
          }
          else {
              $('#password_error').addClass('hidden');
          }
          if (password != repassword) {
            $('#repassword_error').removeClass('hidden');
          }
          else {
              $('#repassword_error').addClass('hidden');
          }
           if (email && name && phone && password && repassword) {
              $.ajax({
                type:'POST',
                url:'http://goodcrm.ru/crm/insertSegment',//привлеченные
                data:{
                  'email':email,
                  'name':name,
                  'phone':phone,
                  

                },
                dataType:'json'

              });
               $.ajax({
                type:'POST',
                url:'/auth/registr',
                data:{
                  'email':email,
                  'name':name,
                  'phone':phone,
                  'password':password,
                  'repassword':repassword
                },
                dataType:'json',
                success: function(data){
                  alert(data)
                  $('#registr_form').addClass('hidden');
                  $('#thanks').removeClass('hidden');
                  
                  // location.href='http://orangeriver.ru';

                }
                // ,
                //  error: function(data){

                //  console.log(ata.responseText);
                 
                //  }
              });
           }
           else{
            alert('Не все поля заполнены!')
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
              //  console.log(data);
                if(data.status) 
                location.href='/'; 
                else
                $('#errorMessage').html(data.message).removeClass('hidden')
              }
           })

            //$.post('/auth/login',data,function(data){console.log(data);if(data.status) location.href='/'; else alert(data.message)});

       });
          $('#enter').click(function(e){
                      e.preventDefault();
                      $('body').append('<div id="blackout"></div>');
                      centerBox();
                      $('#log').removeClass("hidden");
                       $('#reg').addClass("hidden");
                       });
          $('#regist').click(function(e){
               e.preventDefault();
               $('body').append('<div id="blackout"></div>');
               centerBox();
          });
    });
    
