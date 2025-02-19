<head>

    <style>
    #home-header {
        background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/hpsprofilebg.png');
        background-size: cover;
        background-position: bottom;
        padding: 2rem 1.6rem;
        padding-bottom: 3rem;
        border-radius: 0 0 70px 70px;
    }

    .profile-dp img {
        width: 70px;
        border-radius: 50%;
    }

    #ci_info {
        margin-left: 1rem;
    }

    #ci_info p {
        margin: 0;
        color: white;
    }

    #home-search {
        width: 100%;
        margin-top: 0.6rem;
    }

    #home_search {
        width: 97%;
        padding: 0.6rem 0.8rem;
        border-radius: 30px;
        border: 0;
        box-shadow: 0 0 6px grey;
        outline: 0;
    }

    #services {
        background: white;
        border-radius: 35px;
        margin-top: -55px;
        padding: 0.6rem;
        box-shadow: 0px 0px 12px 1px grey;
    }

    #services>div {
        width: 40vw;
        margin: 0.6rem 0;
    }

    #services a>span {
        font-size: 0.9rem;
    }

    #services a>img {
        height: 60px;
        width: auto;
    }

    .dept {
        width: 100%;
        font-size: 1.2rem;
    }

    .mySlides .text {
        background: #ffffffbd;
    }

    a {
        color: green !important;
    }

    .dot.active {
        zoom: 0 !important;
    }


    /* shiva */
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgb(196 191 191 / 50%);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0px 0px 10px 0px #000;
        width: 300px;
    }

    /* Hide the carousel control buttons */
    .carousel-control-prev,
    .carousel-control-next {
        display: none;
    }

    /* Prevent the black screen from displaying between slides */
    .carousel {
        background-color: transparent;
    }

    /* Customize the carousel text style */
    .carousel-text {
        background-color: #f5f5f5;
        padding: 20px;
        /*border-radius: 5px;*/
    }

.notification-counter {
    position: relative;
    display: inline-block;
}

.notification-icon {
    width: 22px;
}

.counter {
    position: absolute;
    top: -5px;
    right: -5px;
    background-color: #4c4cfc;
    color: white;
    border-radius: 50%;
    padding: 0px 6px;
    font-size: 10px;
}
 .popupnotify {
        position: fixed;
        top: -100px; /* Start hidden above the view */
        left: 50%;
        transform: translateX(-50%);
        width: 250px;
        padding: 20px;
        background-color: #f9f9f9;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        transition: top 3s ease, opacity 0.5s ease;
        border-radius:4px;
    }

        .popupnotify.show {
            top: 10px; /* Show 10px from the top */
            opacity: 1;
            visibility: visible;
        }

        .popupnotify.hide {
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.5s ease, visibility 0.5s ease 0.5s; /* Delay visibility change to allow opacity transition */
        }

    

        .popupnotify.animate {
            animation: boom 1s ease-in-out;
        }

  #notif-box{
        position: fixed;
        height: 100%;
        width: 100%;
        left: 0;
        right: 0;
        background: white;
        z-index: 1;
        display:none;
        top:0;
    }
    #show-result{
        overflow: auto;
      -ms-overflow-style: none;
      /* IE and Edge */
      scrollbar-width: none;
    }
    #preview-box{
       position: fixed;
        height: 100%;
        width: 100%;
        left: 0;
        right: 0;
        background: white;
        z-index: 1;
        top:0;
        display:none;  
    }
    #notif-box-result{
    height: auto;
    background: #f6f6f6;
    align-items: center;
    margin: 8px;
    border-radius: 10px;
    }
    #notif-box-result:focus {
    background: aqua;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

    <script>
        function getDeviceOS() {
            var userAgent = navigator.userAgent;
            var $Device_Getting = false; // Default value
    
            // Check for iPhone or iPad (iOS)
            if (userAgent.indexOf("iPhone") !== -1 || userAgent.indexOf("iPad") !== -1) {
                $Device_Getting = true; // If it's iOS, set to true
            }
    
            // If device is iOS, enable the "Data" button
            if ($Device_Getting) {
                document.getElementById("dataButton").disabled = false;
            }
        }
    
        // Call the function to check the device
        getDeviceOS();
    </script>

    <!-- Modal -->
    <div id="notificationModal" class="modal">
        <div style="width:100%;height:100%;backdrop-filter: blur(3px);" class="flex flex-item-center flex-content-center">
            <div class="modal-content">
                 <!-- Close button -->
            <button id="closeModal" class="close-btn" style="position: absolute; top: 10px; right: 10px; font-size: 20px; background: none; border: none; color: #aaa;">&times;</button>

                <h2>
                    <img src="<?= base_url() ?>assets/img/notification.png" style="height:20px;width:20px;" alt="">
                    Permission
                </h2>
                <p>Enable Notification to use this App.</p>
                <button disabled
                    class="allowButton js-push-btn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn btn-link">
                    Enable Push Notifications
                </button>
                
                <!--  <button id="dataButton" disabled-->
                <!--    class="allowButton js-push-btn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn btn-link">-->
                <!--    Data-->
                <!--</button>-->

                <section class="subscription-details js-subscription-details is-invisible">
                </section>
            </div>
        </div>
    </div>

    <?php
    if (isset($_SESSION['UID'])) {
        $user_id = $_SESSION['UID'];
    } else {
        $user_id = "";
    }
    ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>


<script>
    // Get the modal and the close button
    var modal = document.getElementById("notificationModal");
    var closeButton = document.getElementById("closeModal");

    // When the user clicks the close button, close the modal
    closeButton.onclick = function() {
        modal.style.display = "none";
    }

    // Optional: Automatically show the modal (for testing purposes)
    // modal.style.display = "block";  // Uncomment this line to show the modal by default
</script>


<script type="text/javascript">
var user_id = '<?php echo $user_id; ?>';
// alert(user_id); 

// Check if user_id is not empty before displaying the modal
if (user_id !== "") {
    window.onload = function() {
        displayNotificationModal();
        var allowButton = document.querySelector(".allowButton");
        var notificationModal = document.getElementById("#notificationModal");
        allowButton.addEventListener("click", function() {
            requestNotificationPermission();
        });
        if (isSubscribed) {
            $("#notificationModal").hide();
        }
    };
}

function displayNotificationModal() {
    var modal = document.getElementById("notificationModal");
    modal.style.display = "flex";
}

function hideNotificationModal() {
    var modal = document.getElementById("notificationModal");
    modal.style.display = "none";
}

function requestNotificationPermission() {
    Notification.requestPermission().then(function(permission) {
        if (permission === "granted") {
            hideNotificationModal();
        } else {
            alert("Notification permission denied.");
        }
    });
}
</script>


<main>
    <?php $this->load->view('frontend/first-visit'); ?>
    <section id="home-header" onload="alertUser('Welcome to this AMAZING web page!')">
<div class="flex flex-row space-between">
    <div class="flex flex-row">
        <div class="profile-dp text-center">
            <?php if (isset($_SESSION['IMG']) == '') { ?>
                <img src="<?= base_url() ?>assets/img/user.png" id="imgupload"
                     style="height: 72px;border:2px solid white;" onclick='openfile("#file-input1")'
                     onerror='this.src="<?= base_url() ?>assets/img/user.png"'>
            <?php } else { ?>
                <img src="<?= base_url() ?>upload_profile/<?= $_SESSION['IMG']; ?>" id="imgupload"
                     style="height: 72px;border:2px solid white;" onclick='openfile("#file-input1")'
                     onerror='this.src="<?= base_url() ?>assets/img/user.png"'>
            <?php } ?>
        </div>
        <div class="flex flex-column flex-content-center" id="ci_info">
            <?php if (isset($_SESSION['name'])) { ?>
                <p class="name">Hi <b><?= $_SESSION['name'] ?></b></p>
                <p>Welcome back!</p>
            <?php } else { ?>
                <a href="<?php echo base_url() ?>login">
                    <p class="name">Login</b></p>
                </a>
            <?php } ?>
        </div>
    </div>
        <div id="notif-box">
        <div class="flex flex-content-center space-between border" style="padding: 1rem;align-items: center;">
            <span class="notification-counter"><img src="<?= base_url() ?>assets/img/bell.png" style="width: 22px;"><span class="counter" id="notify-counter1">0</span></span>
            <span  style="font-size: 22px;font-weight: 800;">Notification</span>
            <span onclick="NotificationBoxClosed()"><i class="fa-solid fa-xmark" style="font-size: 29px;margin-right: 5px;"></i></span>
        </div>
        <div id="show-result" style="height: 552px;overflow: auto;">
            
        </div>
        <div id="preview-box">
            <div class="flex flex-content-center space-between border" style="padding: 1rem;align-items: center;">
                <span class="notification-counter"><img src="<?= base_url() ?>assets/img/bell.png" style="width: 22px;"><span class="counter" id="notify-counter2">0</span></span>
                <span style="font-size: 22px;font-weight: 800;">Notification</span>
                <span onclick="PreviewBoxClosed()"><i class="fa-solid fa-xmark" style="font-size: 29px;margin-right: 5px;"></i></span>
            </div>
            <div id="preview-box-result" class="flex flex-content-center mt-2 px-3">
                
            </div>
        </div>
        </div>
    <div class="notification-counter" id="counterEvent"><img src="<?= base_url() ?>assets/img/bell.png" style="width: 22px;"><span class="counter" id="notify-counter"></span>
        <span id="popupnotify" class="popupnotify">You have <span id="notify-counter-show"></span> unread notifications!</span>
    </div>
</div>

    </section>
    <section class="main-container">
        <div id="services" class="flex flex-wrap flex-content-center flex-item-center">
            <?php
            $services = array(
                array('icon' => 'icon/course.png', 'link' => 'course', 'label' => 'Our Courses'),
                array('icon' => 'icon/goal.png', 'link' => 'play-earn', 'label' => 'Career Goal Assessment'),
                array('icon' => 'icon/video-conference.png', 'link' => 'webinar', 'label' => 'Webinar'),
                array('icon' => 'icon/job-description.png', 'link' => 'latest-jobs', 'label' => 'Latest Jobs'),
            );
            foreach ($services as $row) {
            ?>
            <div class="flex flex-column flex-item-center">
                <a href="<?= base_url() . $row['link'] ?>" class="flex flex-column flex-item-center">
                    <img src="<?= base_url() . "assets/" . $row['icon'] ?>">
                    <span><?= $row['label'] ?></span>
                </a>
            </div>
            <?php
            }
            ?>

        </div>

        <div class="dept flex space-between mb-1 px-4" style="padding-top:20px;">
            <span><b>Latest Course</b></span>
        </div>

        <div class="dept flex space-between my-2 px-2">
            <div class="carousel-inner carousel slide" data-ride="carousel" >

                <a href="<?php echo base_url() ?>course">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?= base_url() ?>assets/img/uploads/new.jpg" alt="First slide">
                    </div>
                </a>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/img/uploads/Intensive Care Unit (AICU).jpg"
                        alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/img/uploads/Professional.jpg"
                        alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/img/uploads/Course-IIT-JEE.JPG"
                        alt="Third slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="<?= base_url() ?>assets/img/uploads/Professional copy.jpg"
                        alt="Fourth slide">
                </div>

            </div>
        </div>
        <div class="dept flex space-between mb-1 px-2">
            <span><b>Course List</b></span>
            <a href="<?php echo base_url() ?>course">View All ></a>
        </div>
        
        
        <div class="slideshow">
            <?php
            $slides = array(
                array('heading' => '', 'img' => '/img/uploads/Intensive Care Unit (AICU).jpg', 'desc' => 'Academic Intensive Care Unit'),
                array('heading' => '', 'img' => '/img/uploads/new.jpg', 'desc' => 'Vocational Course of NCERT'),
                array('heading' => '', 'img' => '/img/uploads/Professional.jpg', 'desc' => 'Professional Foundation Program'),
                array('heading' => '', 'img' => '/img/uploads/Course-IIT-JEE.JPG', 'desc' => 'Foundation Course of IIT-JEE'),
                array('heading' => '', 'img' => '/img/uploads/Professional copy.jpg', 'desc' => 'Basic Fundamental Course of Mathmatics'),
                array('heading' => '', 'img' => '/img/uploads/Course For Neet.jpg', 'desc' => 'Foundation Course of NEET'),

            );
            ?>
            <div class="slideshow-container">
                <?php
                foreach ($AllCourses as $row) {
                ?>
                <div class="mySlides fade">
                    <div class="numbertext"></div>
                    <a href="viewtestdiscreption?name=<?= $row['id'] ?>"> <img
                            src="<?= base_url() ?>assets/img/uploads/<?= $row['image'] ?>" style="width:100%;opacity: 0.8;">
                        <div class="text" style="color:black"><?= $row['test_name'] ?></div>
                    </a>
                </div>
                <?php
                }
                ?>

                <a class="prev" onclick="plusSlides(-1)" style="color: black;">&#10094;</a>
                <a class="next" onclick="plusSlides(1)" style="color: black;">&#10095;</a>
            </div>
            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(0)"></span>
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>

            </div>
        </div>
        

        <div class="dept flex space-between mb-1 px-2">
            <span><b>Latest Jobs</b></span>
        </div>

        <div style="border:1px solid gray;width:100%;" hidden>
            <?php foreach($info as $jobdata) { ?>
            <marquee><span class="item"><?php echo $jobdata['job_title'] ?></span></marquee>
            <?php } ?>

        </div>


        <section id="image-slider">
            <div id="imageCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators (Optional) -->
                <!--<ol class="carousel-indicators">-->
                <!--    <li data-bs-target="#imageCarousel" data-bs-slide-to="0" class="active"></li>-->
                <!--    <li data-bs-target="#imageCarousel" data-bs-slide-to="1"></li>-->
                <!--    <li data-bs-target="#imageCarousel" data-bs-slide-to="2"></li>-->
                <!--</ol>-->

                <!-- Slides -->
                <div class="carousel-inner" style="width:100%;">
                    <?php $i = 0; foreach ($info as $jobdata) { ?>
                    <div class="carousel-item <?php echo ($i == 0) ? 'active' : ''; ?>">
                        <div class="carousel-text">
                            <a href="<?php echo base_url() ?>jobdiscreption?name=<?php echo $jobdata['id']; ?>">
                                <h5><?php echo $jobdata['job_title']; ?></h5>
                            </a>
                        </div>
                    </div>
                    <?php $i++; ?>
                    <?php } ?>
                </div>


            </div>

            <!-- Controls (Optional) -->
            <a class="carousel-control-prev" href="#imageCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#imageCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
            </div>
        </section>


        <!-- Include Bootstrap JavaScript and jQuery just before closing the </body> tag -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Activate the carousel and set the interval (in milliseconds) -->
        <script>
        $(document).ready(function() {
            $('#imageCarousel').carousel({
                interval: 3000
            }); // Adjust the interval as needed
        });
            window.addEventListener('load',function(){
                $.ajax({
                    url:base_url+'getNotificationCounter',
                    type:'post',
                    data:{"csrf_token": csrf_value},
                    success:function(response){
                      $('#notify-counter').text(response);
                      $('#notify-counter-show').text(response);
                      $('#counterEvent').attr('onclick', 'NotificationBox(' + response + ')');
                      const popup = document.getElementById('popupnotify');
                        popup.classList.add('show');
                        popup.classList.add('animate');
            
                        setTimeout(() => {
                            popup.classList.remove('show');
                            popup.classList.add('hide');
                        }, 5000);
                      
                    }
                    
                });
            });
            function NotificationBox(count){
    $('#notif-box').show();
    $('#notify-counter1').text(count);
    $('#notify-counter2').text(count);
}
function NotificationBoxClosed(){
    $('#notif-box').hide();
}

window.addEventListener('load',function(){
    $.ajax({
        url:base_url+'getNotification',
        type:'post',
        data:{"csrf_token": csrf_value},
        success:function(response){
            var res = JSON.parse(response);
            function formatDateDifference(date) {
            const now = new Date();
            const resultDate = new Date(date);
            const diffTime = Math.abs(now - resultDate);
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            
            if (diffDays < 7) {
                return `${diffDays}d`;
            } else {
                const diffWeeks = Math.floor(diffDays / 7);
                return `${diffWeeks}w`;
            }
        }
            res.forEach(function(result) {
                var formattedDate = formatDateDifference(result.date);
                var truncatedMsg = result.msg.length > 100 ? result.msg.substring(0, 50) + '...' : result.msg;
                var content = `<div id="notif-box-result" class="flex flex-content-center mt-1 px-2 space-between remov${result.id}" onclick="showPreviewBox('${result.id}','${result.img_src}','${result.msg}','${result.push_id}','${result.user_id}')">
                                <div style="margin: 8px;"><img src="<?= base_url()?>/${result.img_src}" style="border-radius: 10px; width:100px;" alt="Image"></div>
                               <div>${truncatedMsg}</div>
                               <div>${formattedDate}</div></div>`;
                $('#show-result').append(content);
            });
        }
        
    });
});
function showPreviewBox(id,img, msg,pushId,userId) {
    
        var count = $('#notify-counter1').text(); 
         var descCount= parseInt(count)-1;
         $('#notify-counter1').text(descCount);
         $('#notify-counter').text(descCount); 
         $('#notify-counter2').text(descCount);
        var row = `<div>
                      <p class="mt-2 text-justify">${msg}</p>
                  </div>`;
        $('#preview-box-result').html(row);
        $('#preview-box').show();
         $.ajax({
            url:base_url+'NotificationStatus',
            type:'post',
            data:{"pushId":pushId,"userId":userId,"csrf_token": csrf_value},
            success:function(response){
                if(response=='success'){
                    $('.remov'+id).remove();
                }
            }
                
        });
}

function PreviewBoxClosed(){
    
    $('#preview-box').hide();
}

        </script>


    </section>
</main>