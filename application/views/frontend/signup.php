<style>
    .login-container {
        height: 100vh;
        background-image: url('<?= base_url(); ?>assets/img/bg1.jpg');
        background-size: cover;
        background-position: center;
    }

    #signup-form {
        /*box-shadow: 0 0 4px grey;*/
        padding: 2rem 2rem;
        /*margin: 0 2rem;*/
        /*backdrop-filter: blur(8px);*/
        /*color: var(--bg);*/
        /*border: 2px solid white;*/
    }

    #signup-form input {
        font-weight: 400;
    }

    /* #verify-otp-btn, #signup-form{
        display: none;
    } */

    #otp-form {
        display: none;
    }
</style>

<div class="login-container flex flex-content-center flex-item-center">

    <div class="flex flex-content-center flex-item-center" style="width: 100%; height: 100%;">

        <form class="col-sm-10 col-md-6" id="otp-form" onsubmit="return false">
            <div class="ml-auto mr-auto mb-4" style="display: flex;justify-content: center;align-items: center; width: 35%;border-radius: 50%;background: white;"><img src="<?= base_url(); ?>assets/img/Logocdc.png" alt="logo" style="width:70.7%;"></div>
            <div class="form-group">
                <label style="color: black;font-size: 17px;">Phone</label>
                <input type="tel" name="tel" id="mob" class="form-control" pattern="[6789][0-9]{9}" minlength="10" maxlength="10" placeholder="Enter phone number">
                <input type="hidden" id="otp" name="otp" class="form-control mt-1" pattern="[0-9]{6}" minlength="6" maxlength="6" placeholder="Enter 6 digit otp">
            </div>
            <div class="form-group flex space-between pt-3">
                <input type="hidden" name="fid" id="otp-fid" value="check-mob">
                <button type="submit" class="btn btn-success m-auto" id="send-otp-btn">Send OTP</button>
                <button type="submit" class="btn btn-success  m-auto" id="verify-otp-btn">Verify OTP</button>
            </div>
        </form>
        <?= form_open('', 'class="col-sm-10 col-md-6" id="signup-form" style="overflow: auto;height:95vh;color:black;" '); ?>
        <?php
        $tempAray = array(
            array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'Full Name',   'id' => 'fname',  'name' => 'name',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-user'),
            array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'Phone',   'id' => 'tel-d',  'name' => 'tel',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-mobile-alt'),
            
            array('v' => '', 'inpForm' => 'select', 'type' => '',     'label' => 'Gender',      'id' => 'gender', 'name' => 'gender',   'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => FALSE, 'r' => '', 'attr' => '', 'options' => array(array('v' => 'Male', 'o' => 'Male'), array('v' => 'Female', 'o' => 'Female'), array('v' => 'Other', 'o' => 'Other'))),
            
            
            array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'Father Name',   'id' => 'f_name',  'name' => 'f_name',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-user'),
            
            array('v' => '', 'inpForm' => 'select', 'type' => '',   'label' => 'Select a Class/Course', 'id' => 'class', 'name' => 'class', 'divClass' => 'form-group', 'inputClass' => 'form-control', 
                'group' => FALSE,  'r' => '',  'attr' => '', 'options' => array(         
                    array('v' => '5', 'o' => 'Class 5'),
                    array('v' => '6', 'o' => 'Class 6'),
                    array('v' => '7', 'o' => 'Class 7'),
                    array('v' => '8', 'o' => 'Class 8'),
                    array('v' => '9', 'o' => 'Class 9'),
                    array('v' => '10', 'o' => 'Class 10'),
                    array('v' => '11', 'o' => 'Class 11'),
                    array('v' => '12', 'o' => 'Class 12'),
                    array('v' => 'B.A', 'o' => 'BA (Bachelor of Arts)'),
                    array('v' => 'M.A', 'o' => 'MA (Master of Arts)'),
                    array('v' => 'B.ED', 'o' => 'BEd (Bachelor of Education)'),
                    array('v' => 'M.ED', 'o' => 'MEd (Master of Education)'),
                    array('v' => 'B.SC', 'o' => 'BSc (Bachelor of Science)'),
                    array('v' => 'M.SC', 'o' => 'MSc (Master of Science)'),
                    array('v' => 'B.Tech', 'o' => 'BTech (Bachelor of Technology)'),
                    array('v' => 'M.Tech', 'o' => 'MTech (Master of Technology)'),
                     array('v' => 'CA', 'o' => 'CA (Chartered Accountant)'),
                    array('v' => 'MBA', 'o' => 'MBA (Master of Business Administration)'),
                    array('v' => 'PH.D', 'o' => 'PhD (Doctor of Philosophy)'),
                )
            )
        );
        echo renderForm($tempAray);
        ?>
           <div class="form-group">
                        <label for="state" class="required">State</label>
                        <div class="input-group mb-2">
                            <select name="state" class="form-control" id="state" onchange="getCity(this.value)">
                                <option value=''>Select state</option>
                                <?php
                                foreach($states as $row){
                                    ?>
                                    <option value="<?= $row['STATE'] ?>"><?= $row['STATE'] ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>   
                    </div>
                    
                    <div class="form-group">
                        <label for="city" class="required">City</label>
                        <div class="input-group mb-2">
                            <select name="city" class="form-control" id="city">
                                <option value="">Select state first</option>
                            </select>
                        </div>   
                    </div>
        <?php
        $tempAray = array(
            array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'Address',   'id' => 'address',  'name' => 'address',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-home'),
            array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'College/School Name', 'id' => 'college',  'name' => 'college',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-home'),
            array('attr' => '', 'inpForm' => 'input', 'type' => 'email', 'label' => 'Email', 'id' => 'email',  'name' => 'email',    'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-envelope'),
            array('attr' => '', 'inpForm' => 'input', 'type' => 'date',  'label' => 'DOB', 'id' => 'bday',   'name' => 'bday',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => FALSE, 'icon' => 'fa fa-calendar', 'max' => date('Y-m-d')),
            
            // array('attr' => '', 'inpForm' => 'input', 'type' => 'password', 'label' => 'New Password', 'id' => 'pwd',  'name' => 'new-password',    'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-eye-slash', 'e' => 'onclick="toggleMask()"'),
            
            // array('attr' => '', 'inpForm' => 'input', 'type' => 'password', 'label' => 'Confirm Password', 'id' => 'pwdconf',  'name' => 'password-conf',    'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => 'append', 'icon' => 'fa fa-eye-slash', 'e' => 'onclick="toggleMask1()"'),
            
            // array('attr' => '', 'inpForm' => 'input', 'type' => 'text',  'label' => 'Referral Code', 'id' => 'ref',   'name' => 'referral',     'divClass' => 'form-group', 'inputClass' => 'form-control', 'group' => FALSE),
        );
        
        echo renderForm($tempAray);
        ?>
        
        <div class="form-group">
            <label for="password">New Password</label>
            <div class="input-group mb-2">
                <!-- Password Input Field for New Password -->
                <input type="password" name="new-password" class="form-control" id="pwd" placeholder="Password">
                <!-- Eye Icon for New Password (Closed Eye by default) -->
                <span class="input-group-text" id="eye-icon-new" style="cursor: pointer;">
                    <i class="fa fa-eye-slash" id="eye-icon-closed-new"></i> 
                    <i class="fa fa-eye" id="eye-icon-open-new" style="display:none;"></i> 
                </span>
            </div>   
        </div>
        
        <div class="form-group">
            <label for="password">Confirm Password</label>
            <div class="input-group mb-2">
                <!-- Password Input Field for Confirm Password -->
                <input type="password" name="password-conf" class="form-control" id="pwdconf" placeholder="Confirm Password">
                <!-- Eye Icon for Confirm Password (Closed Eye by default) -->
                <span class="input-group-text" id="eye-icon-conf" style="cursor: pointer;">
                    <i class="fa fa-eye-slash" id="eye-icon-closed-conf"></i> 
                    <i class="fa fa-eye" id="eye-icon-open-conf" style="display:none;"></i> 
                </span>
            </div>   
        </div>

         <div class="form-group">
            <label for="referral" >Referral Code</label>
            <div class="input-group mb-2">
                <input type="text" name="referral" class="form-control" id="ref" placeholder="Referral Code">
            </div>   
        </div>
                    
                    
        <div class="form-group flex space-between pt-3">
            <input type="hidden" name="fid" value="signup">
            <!--<button type="button" class="btn btn-transparent" style="color:black;" onclick="window.open('login','_self');">Login</button>-->
            <div></div>
            <button type="submit" class="btn btn-transparent" style="color:black;">Sign Up</button>
        </div>
        
        <div class="text-center" >
                <a style="color:white;" href="login">Already registered? Login Here</a>
            </div>
        
        <?= form_close(); ?>
    </div>
</div>

    <?php
        echo "<script>var cities = ".json_encode($cities).";</script>";
    ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <script>
    // Toggle visibility for New Password
    function toggleMaskNew() {
        if ($("#pwd").attr("type") === "password") {
            // Show password
            $("#pwd").attr("type", "text");
            $("#eye-icon-closed-new").hide();  
            $("#eye-icon-open-new").show();    
        } else {
            // Hide password
            $("#pwd").attr("type", "password");
            $("#eye-icon-closed-new").show(); 
            $("#eye-icon-open-new").hide();    
        }
    }
    
    // Toggle visibility for Confirm Password
    function toggleMaskConf() {
        if ($("#pwdconf").attr("type") === "password") {
            // Show password
            $("#pwdconf").attr("type", "text");
            $("#eye-icon-closed-conf").hide();  
            $("#eye-icon-open-conf").show();    
        } else {
            // Hide password
            $("#pwdconf").attr("type", "password");
            $("#eye-icon-closed-conf").show();  
            $("#eye-icon-open-conf").hide();  
        }
    }
    
    $("#eye-icon-new").on("click", toggleMaskNew);
    $("#eye-icon-conf").on("click", toggleMaskConf);

    function getCity(str){
        var cityAray = [];
        var rows = '<option value="">Select city</option>';
        for(var i in cities){
            if(cities[i].STATE === str){
                if(!cityAray.includes(cities[i].DISTRICT)){
                    rows += '<option value="'+cities[i].DISTRICT+'">'+cities[i].DISTRICT+'</option>';
                }
                cityAray.push(cities[i].DISTRICT);
            }
        }
        $("#city").html(rows);
    }
    window.getCity = getCity;
    
    //  var kunjiVisible = false;
     
    // function toggleMask(){
    //     if(!kunjiVisible){
    //         $("#pwd").attr("type","text");
    //         $("#pwd").html('<i class="fa fa-eye" onclick="toggleMask()"></i>');
    //         kunjiVisible = true;
    //     }else{
    //         $("#pwd").attr("type","password");
    //         $("#pwd").html('<i class="fa fa-eye-slash" onclick="toggleMask()"></i>');
    //         kunjiVisible = false;
    //     }
    // }
    
    // function toggleMask1(){
    //     if(!kunjiVisible){
    //         $("#pwdconf").attr("type","text");
    //         $("#pwdconf").html('<i class="fa fa-eye" onclick="toggleMask1()"></i>');
    //         kunjiVisible = true;
    //     }else{
    //         $("#pwdconf").attr("type","password");
    //         $("#pwdconf").html('<i class="fa fa-eye-slash" onclick="toggleMask1()"></i>');
    //         kunjiVisible = false;
    //     }
    // }
</script>

<script type="module">
    // Import the functions you need from the SDKs you need
    import {
        initializeApp
    } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-app.js";
    import {
        getAnalytics
    } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-analytics.js";
    import {
        getAuth,
        RecaptchaVerifier,
        signInWithPhoneNumber
    } from "https://www.gstatic.com/firebasejs/9.22.2/firebase-auth.js";
    // TODO: Add SDKs for Firebase products that you want to use
    // https://firebase.google.com/docs/web/setup#available-libraries

    // Your web app's Firebase configuration
    // For Firebase JS SDK v7.20.0 and later, measurementId is optional
    const firebaseConfig = {
        apiKey: "AIzaSyB1VpsNw9j17k_qpPGjK4zwm7qWLzcTSm0",
        authDomain: "hpswebsite-63a37.firebaseapp.com",
        projectId: "hpswebsite-63a37",
        storageBucket: "hpswebsite-63a37.appspot.com",
        messagingSenderId: "48632464057",
        appId: "1:48632464057:web:1c19e9447dd885a65bd168"
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

    function verifyMob(mob) {
        // $("#page_preloader").css({"display":"block","opacity":"0.6"});
        const phoneNumber = "+91" + mob;
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
                $("#otp").attr({
                    "required": true,
                    'type': 'text'
                });
                $("#mob").prop('disabled', true);
                $("#otp-fid").val('check-otp');
                $("#send-otp-btn").hide();
                $("#verify-otp-btn").show();
                av_alert('Send OTP', 'OTP has been sent to your mobile number', 'success');
                // $("#page_preloader").css({"display":"none","opacity":"0"});
            }).catch((error) => {
                // Error; SMS not sent
                let otp_sent = false;
                console.log('sms not sent');
            });
    }

    function verifyOtp() {
        console.log('verifying otp...');
        const code = $("#otp").val();
        confirmationResult.confirm(code).then((result) => {
            // User signed in successfully.
            const user = result.user;
            //alert('Otp validated');
            //   console.log(user);
            isVerified = true;
            $(".tel").val($("#mob").val());
            $("#signup-form").show();
            $("#otp-form").hide();
            av_alert('OTP Verify', 'OTP Verified Successful', 'success');
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
        // $("#otp-form").submit(function(e){
        //     if($("#otp-fid").val() == "check-otp"){
        //         verifyOtp();
        //         return;
        //     }
        //     if(isVerified){
        //         return true;
        //     }
        //     let mob = $("#mob").val();
        //     let email = $("#email").val();
        //     if(mob.length != 10){
        //         $("#err ul").html('<li>Please enter valid mobile number.</li>');
        //         return false;
        //     }

        //     verifyMob(mob);
        // })
        $("#signup-form").submit(function(e) {
            e.preventDefault();
            var form = $(this);
            $.ajax({
                type: 'post',
                url: '<?= base_url() ?>register',
                data: form.serializeArray(),
                success: function(data) {
                    console.log(data);
                    var resp = JSON.parse(data);
                    if (resp.isSaved == "false") {
                        av_alert('Error Occurred', resp.msg, 'error');
                    } else {
                        av_alert('Registered successfully!', 'You have been registered successfully.', 'success');
                        setTimeout(function() {
                            window.location.href = "https://app.cdc-azamgarh.com/login";
                        }, 1000);
                    }
                },
                error(err) {
                    console.log(err.statusText);
                    av_alert('Error ' + err.status, err.statusText, 'error');
                }
            })
        })
    }


  


</script>