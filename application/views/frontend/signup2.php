<style>
    .login-container{
        height: 100vh;
        background-image: url('<?= base_url(); ?>assets/img/login-bg.jpg');
        background-size: cover;
        background-position: center;
    }
    #signup-form{
        box-shadow: 0 0 4px grey;
        padding: 2rem 2rem;
        margin: 0 2rem;
        backdrop-filter: blur(8px);
        color: var(--bg);
        border: 2px solid white;
    }
    #signup-form input{
        font-weight: 400;
    }
    #verify-otp-btn, #signup-form{
        display: none;
    }

</style>
<div class="login-container flex flex-content-center flex-item-center">
    <div class="flex flex-content-center flex-item-center" style="background: #58119b82;width: 100%; height: 100%;">
        
        <form class="col-sm-10 col-md-6" id="otp-form" onsubmit="return false">
            <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="tel" id="mob" class="form-control" pattern="[6789][0-9]{9}" minlength="10" maxlength="10"  placeholder="Enter phone number">
                <input type="hidden" id="otp" name="otp" class="form-control" pattern="[0-9]{6}" minlength="6" maxlength="6" placeholder="Enter 6 digit otp">
            </div>
            <div class="form-group flex space-between pt-3">
                <input type="hidden" name="fid" id="otp-fid" value="check-mob">
                <button type="submit" class="btn btn-transparent" id="send-otp-btn">Send OTP</button>
                <button type="submit" class="btn btn-transparent" id="verify-otp-btn">Verify OTP</button>
            </div>
        </form>
        <?= form_open('', 'class="col-sm-10 col-md-6" id="signup-form"'); ?>
            <?php
                $tempAray = array(
                    array('attr' => 'disabled', 'inpForm'=>'input','type' => 'text',   'label'=>'Phone',       'id'=>'tel-d',    'name'=>'tel',      'divClass'=>'form-group', 'inputClass'=>'form-control tel','group'=>'append', 'icon'=>'fa fa-mobile-alt'),
                    array('attr' => '', 'inpForm'=>'input','type' => 'hidden',   'label'=>'Phone',       'id'=>'tel-h',    'name'=>'tel',      'divClass'=>'form-group hide', 'inputClass'=>'form-control tel','group'=>FALSE, 'icon'=>'fa fa-mobile-alt'),
                    array('attr' => '', 'inpForm'=>'input','type' => 'text',  'label'=>'Full Name',   'id'=>'fname',  'name'=>'name',     'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>'append', 'icon'=>'fa fa-user'),
                    array('attr' => '', 'inpForm'=>'input','type' => 'email', 'label'=>'Email',       'id'=>'email',  'name'=>'email',    'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>'append', 'icon'=>'fa fa-envelope'),
                    array('attr' => '', 'inpForm'=>'input','type' => 'date',  'label'=>'DOB',         'id'=>'bday',   'name'=>'bday',     'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>FALSE, 'icon'=>'fa fa-calendar', 'max'=>date('Y-m-d')),
                    array('attr' => '', 'inpForm'=>'input','type' => 'password',  'label'=>'New Password ',         'id'=>'pwd',   'name'=>'new-password',     'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>FALSE),
                    array('attr' => '', 'inpForm'=>'input','type' => 'text',  'label'=>'Confirm Password',         'id'=>'pwdconf',   'name'=>'password-conf',     'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>FALSE),
                    array('attr' => '', 'inpForm'=>'input','type' => 'text',  'label'=>'Referral Code',         'id'=>'ref',   'name'=>'referral',     'divClass'=>'form-group', 'inputClass'=>'form-control','group'=>FALSE),
                );
                echo renderForm($tempAray);
            ?> 
            <div class="form-group flex space-between pt-3">
                <input type="hidden" name="fid" value="signup">
                <button type="submit" class="btn btn-transparent">Sign Up</button>
                <button type="button" class="btn btn-transparent" onclick="window.open('login','_self');">Login</button>
            </div>
        <?= form_close(); ?>
    </div>
</div>
<script type="module">
    // Import the functions you need from the SDKs you need
    import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
    import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics.js";
    import { getAuth, RecaptchaVerifier, signInWithPhoneNumber } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyAkvdtNJpDcicXUwkQIh3JQVQ3XbyTur5I",
        authDomain: "pathobot-f6d3e.firebaseapp.com",
        projectId: "pathobot-f6d3e",
        storageBucket: "pathobot-f6d3e.appspot.com",
        messagingSenderId: "649582367355",
        appId: "1:649582367355:web:577c4ca2579bd16d0e48de",
        measurementId: "G-53DY9ZQBZ9"
    };

    // Initialize Firebase
    const app = initializeApp(firebaseConfig);
    const analytics = getAnalytics(app);
    const auth = getAuth();
    let otp_sent = false;
    let isVerified = false;
    window.otp_sent = otp_sent;
    window.isVerified = isVerified;
    auth.languageCode = 'en';
    // To apply the default browser preference instead of explicitly setting it.
    // firebase.auth().useDeviceLanguage();

    window.recaptchaVerifier = new RecaptchaVerifier('send-otp-btn', {
            'size': 'invisible',
            'callback': (response) => {
            // reCAPTCHA solved, allow signInWithPhoneNumber.
            console.log('submitting...');
            onSignInSubmit();
        }
    }, auth);
    
    function verifyMob(mob){
        // $("#page_preloader").css({"display":"block","opacity":"0.6"});
        const phoneNumber = "+91"+mob;
        const appVerifier = window.recaptchaVerifier;
            
        const auth = getAuth();
        signInWithPhoneNumber(auth, phoneNumber, appVerifier)
            .then((confirmationResult) => {
                // SMS sent. Prompt user to type the code from the message, then sign the
                // user in with confirmationResult.confirm(code).
                window.confirmationResult = confirmationResult;
                // $("#pledge-form").hide();
                // $(".otp").show();
                console.log('OTP SENT');
                let otp_sent = true;
                $("#otp").attr({"required":true,'type':'text'});
                $("#mob").prop('disabled',true);
                $("#otp-fid").val('check-otp');
                $("#send-otp-btn").hide();
                $("#verify-otp-btn").show();
                // $("#page_preloader").css({"display":"none","opacity":"0"});
            }).catch((error) => {
                // Error; SMS not sent
                let otp_sent = false;
                console.log('sms not sent');
            });
    }
    function verifyOtp(){
        console.log('verifying otp...');
        const code = $("#otp").val();
        confirmationResult.confirm(code).then((result) => {
            // User signed in successfully.
            const user = result.user;
                alert('Otp validated');
            //   console.log(user);
            isVerified = true;
            $(".tel").val($("#mob").val());
            $("#signup-form").show();
            $("#otp-form").hide();
        }).catch((error) => {
            // User couldn't sign in (bad verification code?)
            // ...
            isVerified = false;
            $.alert({
                title: 'Invalid OTP!',
                icon: 'fa fa-warning',
                theme: 'modern',
                columnClass: 'col-md-4 col-md-offset-4 col-xs-10 col-xs-offset-1',
                content: 'Please enter valid OTP',
                type: 'orange',
                typeAnimated: true
            });
        });
        return false;
    }
    // window.verifyOtp = verifyOtp;
    window.onload = (event) => {
        $("#otp-form").submit(function(e){
            if($("#otp-fid").val() == "check-otp"){
                verifyOtp();
                return;
            }
            if(isVerified){
                return true;
            }
            let mob = $("#mob").val();
            let email = $("#email").val();
            if(mob.length != 10){
                $("#err ul").html('<li>Please enter valid mobile number.</li>');
                return false;
            }

            verifyMob(mob);
        })
        $("#signup-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'post',
                url: '<?= base_url() ?>register',
                data: form.serializeArray(),
                success: function(data){
                    console.log(data);
                    var resp = JSON.parse(data);
                    if(resp.isSaved == "false"){
                        av_alert('Error Occurred',resp.msg,'error');
                    }else{
                        av_alert('Registered successfully!','You have been registered successfully.','success');
                    }
                },
                error(err){
                    console.log(err.statusText);
                    av_alert('Error '+err.status,err.statusText,'error');
                }
            })
        })
    }
</script>
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
    


</script>