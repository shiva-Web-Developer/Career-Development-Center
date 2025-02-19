function is_login()
{
  var flag=0;
  var isEmail=$('#email').val();
  var isPassword=$('#password').val();
  if(isEmail==''|| isPassword=='')
  {
    $('#email').css('border','1px solid red');
    $('#password').css('border','1px solid red');
    message('error','Input Field Requird',3000);
    flag =1;
  }
  if(flag==0)
  {
    $.ajax({
        url:base_url+"AccessLogin",
        type:"post",
        data:{'email':isEmail,'password':isPassword,csrf_token:csrf_value},
        success:function(response)
        {
            if(response==1)
            {
            message('success','Login Successful',1000);
            // return('test');
            redirectURL('Dashboard',1000);
            }else if(response==2){
            message('error','Invalid Password',3000);
            }else if(response==3){
            message('error','Invalid Email',3000);
            }
            
        }

    });
  }
  
}
function is_Forget()
{
    
    var is_otp = Math.floor((Math.random() * 10000) + 1);
    var is_Forget_Email=$('#email').val();
    if(is_Forget_Email=='')
    {
        message('error','Please Enter Email',3000);
    }else{

        $.ajax({
            url:base_url+"Forget-Email",
            type:"post",
            data:{'email':is_Forget_Email,'otp':is_otp,csrf_token:csrf_value},
            success:function(response)
            {
                if(response==1)
                {
                    message('success','OTP has been sent your email',3000);
                    $('#forget-otp').show();
                    $('#forget-email').hide();
                    $('.login-box-msg').html('Enter OTP Code').css('font-size','25px');
                    $('#countdown').show();
                    counterNumber();
                }else if(response==2){
                    message('error','Email does not exist',3000);
                }
                
            }
    
        });
    }
    
}
function is_Verify()
{
    var is_valid_otp=$("input[name='otp[]']").map(function(){return $(this).val();}).get();
    alert(is_valid_otp);
}

$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      var $next = $(this).next('.inputs');
      if ($next.length)
          $(this).next('.inputs').focus();
      else
          $(this).blur();
    }
});
function counterNumber()
{   var countdown = 10;
    $('#countdown-number').text(countdown);
    setInterval(function() {
        countdown = --countdown;
        var downcont=$('#countdown-number').text(countdown);
        if(countdown==0)
        {
           $('#countdown').hide();
           $('#resendotp').show();
           $('#re-send').attr('onclick','is_Forget()');
        }
      }, 1000);
}
