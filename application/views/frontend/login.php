<style>
    .login-container{
        height: 100vh;
        background-image: url('<?= base_url(); ?>assets/img/bg1.jpg');
        background-size: cover;
        background-position: center;
    }
    #login-form{
        box-shadow: 0 0 4px grey;
        padding: 3rem 2rem;
        margin: 2rem;
        width: 90%;
        backdrop-filter: blur(8px);
        color: var(--bg);
        border: 1px solid white;
    }
    #login-form-otp{
        box-shadow: 0 0 4px grey;
        padding: 3rem 2rem;
        margin: 2rem;
        backdrop-filter: blur(8px);
        color: var(--bg);
        border: 1px solid white;
    }
    #login-form input{
        /* background: transparent; */
        font-weight: 400;
    }
    /*#logo_css {*/
    /*    display: flex;*/
    /*    justify-content: center;*/
    /*    align-items: center;*/
    /*    width: 40%;*/
    /*    height: 20%;*/
    /*    border-radius: 50%;*/
    /*    background: white;*/
    /*}*/
    
      #logo_css {
              display: flex;
    justify-content: center;
    align-items: center;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: white;
    padding: 0.6rem;
    }

    @media only screen and (min-width: 400px) {
        #logo_css {
            width: 10%;
            height: 20%;

        }
    }

</style>

<?php $this->load->view('frontend/first-visit'); ?>
<div class="login-container flex flex-content-center flex-item-center">
    <div class="flex flex-content-center flex-item-center userlogin flex-column" style="background: #21ba4557;width: 100%; height: 100%;">
        <div id="logo_css"><img src="<?= base_url(); ?>assets/img/cdc-new-bg.png" alt="logo" style="width:65.7%;"></div>
        <?= form_open('', 'class="col-sm-10 col-md-6" id="login-form"'); ?>
            <div class="form-group">
                <label for="username" class="required" style="color:black;">Email/Mobile Number</label>
                <div class="input-group mb-2">
                    <input type="text" name="username" class="form-control" id="username" autocomplete="username" placeholder="Email/Mobile Number" required> 
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-user"></i></div>
                    </div>
                </div>   
            </div>
            <div class="form-group">
                <label for="password" class="required" style="color:black;">Password</label>
                <div class="input-group mb-2">
                    <input type="password" name="password" class="form-control" id="password" autocomplete="current-password" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text" id="eye"><i class="fa fa-eye-slash" onclick="toggleMask()"></i></div>
                    </div>
                </div>
            </div>
            <span onclick="ForgetPassword()" style="color:black;" >Forgot Password</span>
            <div class="form-group flex space-between pt-3">
                                <!--<button type="button" class="btn btn-transparent" onclick="window.open('signup','_self');" style="color:black;">Sign Up</button>-->
                <div>
                    
                </div>
                <button type="submit" class="btn btn-transparent" style="color:black;">Login</button>
            </div>
            <div class="text-center" >
                <a style="color:white;" href="signup">Not registered? Register here.</a>
            </div>
        <?= form_close(); ?>
    </div>
<!------------------------------------------------------------email send-------------------------------------------->    
        <div class="flex flex-content-center flex-item-center otpemail" style="background: #21ba4557;width: 100%; height: 100%; display:none">
            <div class="col-sm-10 col-md-6" id="login-form-otp">
                <div class="form-group">
                    <label for="email" class="required">Enter Your Email</label>
                    <div class="input-group mb-2">
                        <input type="email" name="email" class="form-control" id="email" autocomplete="email" placeholder="Enter Your Email"> 
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                    </div>   
                </div>
             <div class="form-group flex space-between pt-3">
                    <button type="button" class="btn btn-transparent" onclick="SendOtp()">Send OTP</button>
                    <button type="button" class="btn btn-transparent" onclick="location.reload()">Back</button>
             </div>
          </div>
     </div>
     <!---------------------------------------email send closed------------------------------------->
     <!------------------------------------------------------------otp-------------------------------------------->    
     <div class="flex flex-content-center flex-item-center verify_otp" style="background: #21ba4557;width: 100%; height: 100%; display:none">
            <div class="col-sm-10 col-md-6" id="login-form-otp">
                <div class="form-group">
                    <label for="verifyotp" class="required">Enter OTP</label>
                    <div class="input-group mb-2">
                        <input type="number" name="otp" class="form-control" id="verifyotp" autocomplete="otp" placeholder="Enter 6 digit OTP"> 
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                    </div>   
                </div>
             <div class="form-group flex space-between pt-3">
                    <button type="button" class="btn btn-transparent" onclick="VerifyOtp()">Verify OTP</button>
                    <button type="button" class="btn btn-transparent" onclick="location.reload()">Back</button>
             </div>
          </div>
     </div>
     <!---------------------------------------otp closed------------------------------------->
      <!------------------------------------------------------------Reset Password-------------------------------------------->   
      
      <div class="flex flex-content-center flex-item-center resetpassword" style="background: #21ba4557;width: 100%; height: 100%; display:none">
            <div class="col-sm-10 col-md-6" id="login-form-otp">
                <div class="form-group">
                    <label for="newpassword" class="required">New Password</label>
                    <div class="input-group mb-2">
                        <input type="text" name="newpassword" class="form-control" id="new_password" autocomplete="password" placeholder="Enter New Password" required> 
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                    </div>   
                </div>
                <div class="form-group">
                    <label for="confirmpassword" class="required">Confirm Password</label>
                    <div class="input-group mb-2">
                        <input type="text" name="confirmpassword" class="form-control" id="confirm_password" autocomplete="password" placeholder="Enter Confirm Password" required> 
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                        </div>
                    </div>   
                </div>
             <div class="form-group flex space-between pt-3">
                    <button type="button" class="btn btn-transparent" onclick="ChangePassword()">Change Password</button>
                    <button type="button" class="btn btn-transparent" onclick="location.reload()">Back</button>
             </div>
          </div>
     </div>
    
     <!----------------------------------------Reset Password closed------------------------------------->        
 </div>
<script>
    let kunjiVisible = false;
    function toggleMask(){
        if(!kunjiVisible){
            $("#password").attr("type","text");
            $("#eye").html('<i class="fa fa-eye" onclick="toggleMask()"></i>');
            kunjiVisible = true;
        }else{
            $("#password").attr("type","password");
            $("#eye").html('<i class="fa fa-eye-slash" onclick="toggleMask()"></i>');
            kunjiVisible = false;
        }
    }
    window.onload = (event) => {
        $("#login-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'post',
                url: '<?= base_url() ?>sign-in',
                data: form.serializeArray(),
                success: function(data){
                    if(data == "INVALID"){
                        av_alert('Invalid Credentials','Please enter valid credentials','warning');
                    }else if(data == '100'){
                        window.open('<?= base_url() ?>','_self');
                    }else if(data == '300'){
                        av_alert('Incorrect Password','Please enter correct password','warning');
                    }else if(data == '400'){
                        av_alert('User not found','Please enter correct username','warning');
                    }
                },
                error(err){
                    console.log(err.statusText);
                    av_alert('Error '+err.status,err.statusText,'error');
                }
            })
        })
    }
    function ForgetPassword()
    {
        $('.otpemail').show();
         $('.userlogin').hide();
    }
    function SendOtp()
    {
        var email=$('#email').val();
        if(email=='')
        {
            av_alert('Please enter the email','','warning');
        }
        else
        {
            $.ajax({
               type: 'post',
                url: base_url + "OtpSend",
                data:{"email":email,csrf_token:csrf_value},
                success: function(data){
                    if(data=='Not Exist')
                    {
                        av_alert('Invalid Email','Email dose not exist','warning');
                    }
                    else if(data=='Failed')
                    {
                        av_alert('Send OTP','OTP has been sent to your email','success');
                        $('.verify_otp').show();
                        $('.otpemail').hide();
                        $('.userlogin').hide();
                    }

                }


          });
        }
          
    }
    function VerifyOtp()
    {
        var otp=$('#verifyotp').val();
        if(otp=='')
        {
            av_alert('Please enter the OTP','','warning');
        }
        else
        {
          $.ajax({
               type: 'post',
                url: base_url + "OtpVerify",
                data:{"otp":otp,csrf_token:csrf_value},
                success: function(data){
                    if(data=='verified')
                    {
                         av_alert('OTP Verified','OTP verified, please create new password','success');
                        $('.resetpassword').show();
                        $('.verify_otp').hide();
                        $('.otpemail').hide();
                        $('.userlogin').hide();
                    }
                    else if(data=='not verified')
                    {
                        av_alert('Invalid OTP','OTP dose not match','warning');
                       
                    }

                }


          });

        }

    }
    function ChangePassword()
    {
        var email=$('#email').val();
        var newpassword=$('#new_password').val();
        var confirmpassword=$('#confirm_password').val();
        if(newpassword==''|| confirmpassword=='')
        {
            av_alert('Input can not be left blank','','warning');
        }
        else if(newpassword!=confirmpassword)
        {
            av_alert('Confirm Password Not Match','','warning');
        }
        else
        {
            $.ajax({
               type: 'post',
                url: base_url + "ResetPassword",
                data:{"newpassword":newpassword,"email":email,csrf_token:csrf_value},
                success: function(data){
                    if(data=='success')
                    {
                        av_alert('','Password changed successfully','success');
                        $('.resetpassword').hide();
                        $('.userlogin').show();
                        $('.verify_otp').hide();
                        $('.otpemail').hide();
                        
                    }
                   

                }


          });
        }
    }
    
</script>