<style>
    #profile {
        background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/hpsprofilebg.png');
        background-size: cover;
        background-position: bottom;
        padding-bottom: 2rem;
        border-radius: 0 0 35px 35px;
    }

    .profile-dp img {
        width: 120px;
        border-radius: 50%;
    }

    .points-container {
        background: white;
        width: fit-content;
        padding: 2px 6px;
        border-radius: 15px;
    }

    .content {
        display: flex;
        align-items: center;
        padding: 1rem;
        flex-direction: column;
    }

    .disease-card {
        width: 32%;
        box-sizing: border-box;
    }

    .disease-card div {
        padding: 1rem;
        background: white;
        box-shadow: 0 0 4px grey;
        margin: 0.4rem;
        border-radius: 8px;
    }

    .disease-card div>h6 {
        text-align: center;
        font-weight: 800;
        font-size: 1rem;
        color: var(--text-color);
        height: 20px;
    }

    .disease-card div>a {
        padding: 0.2rem 0.4rem;
        border-radius: 4px;
        font-size: 0.8rem;
        width: fit-content;
        max-width: 68px;
    }

    .nr-cont>div.card {
        margin: 4px;
        max-width: 31%;
    }
</style>
<main>
    <section id="profile">
        <div class="hamburger">
            <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" style="color: white;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
            </svg>
            <div class="text-light">Profile</div>
            <div onclick="window.open('<?= base_url('logout') ?>','_self')" style="color: white;"><i class="fa fa-sign-out-alt"></i></div>
        </div>
        <div class="profile-dp text-center">
            <?php
            foreach ($info as $row) {
                $name = $row['NAME'];
                $email = $row['EMAIL'];
                if ($row['USER_PROFILE'] == '') {
            ?>
                    <img src="<?= base_url() ?>assets/img/user.png" id="imgupload" style="height: 124px;" onclick='openfile("#file-input1")'>
                <?php
                } else {
                ?>
                    <img src="<?= base_url('upload_profile/' . $row['USER_PROFILE']) ?>" id="imgupload" style="height: 124px;" onclick='openfile("#file-input1")'>
            <?php
                }
            }

            ?>
        </div>
        <div class="flex flex-column flex-item-center text-bold mt-1">
            <span class="text-light"><?= $name ?></span>
            <span class="text-light"><?= $email ?></span>
            <div class="points-container mt-1">
                <small>Education Points: <b><?= $points ?></b></small>
            </div>
        </div>
    </section>

    <?php
    $services = array(
        array("link" => 'MyProfile', "name" => 'Edit Profile'),
    );
    ?>
    <section class="content">
        <?php
        foreach ($services as $row) {
        ?>

            <div class="col-lg-12">

                <div class="card text-center" style="box-shadow: 0 0 4px grey;padding: 1rem;">
                    <a href="<?= base_url() . $row['link'] ?>"><?php echo $row['name']; ?></a>
                </div>

            </div>


        <?php
        }
        ?>
        <button hidden  disabled class="js-push-btn mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn btn-link">
            Enable Push Messaging
        </button>
        <section class="subscription-details js-subscription-details is-invisible">
            <!-- <p>Enable push notification to receive health tips and regular updates from us.</p> -->
        </section>
    </section>

    <section>
        <br>
        <div class="col-lg-12">
            <?php
            foreach ($info as $row) {
            }
            ?>
            <div class="card" style="box-shadow: 0 0 4px grey;padding: 1rem;">
                <h6 class="card-title p-1"><b>About me</b> </h6>
                <h6><b><?= $row['NAME'] ?></b></h6>
                <h6> <img src="<?= base_url() ?>assets/img/email.png" style="height:16px;width:16px;" alt=""> <b><?= $row['EMAIL'] ?></b></h6>
                <h6><img src="<?= base_url() ?>assets/img/logo-cdc.png" style="height:16px;width:16px;" alt=""> <b>CDC Member <?= $row['DATE'] ?> </b></h6>
                <h6><img src="<?= base_url() ?>assets/img/question-answer.png" style="height:16px;width:16px;" alt="">Refer Code <b><?= $row['ref_code'] ?> </b></h6>

                <a href="<?php echo base_url() ?>enroll-courses">
                    <h6 style="color:black;"> <img src="<?= base_url() ?>assets/img/enroll_course.png" style="height:16px;width:16px;" alt="">&nbsp;&nbsp;
                       Enrolled Courses: <span style="color:green;"><b><?= $enroll_course_count ?></b></span>
                    </h6>
                </a>
            </div>
        </div>
    </section>


    <br>
    <!-- <button onclick="window.open('<? //= base_url('logout') 
                                        ?>','_self')" class="btn btn-success" style="margin-top: 10rem;margin-left: 11rem;">Logout</button> -->
</main>

<script>
    // $("#profile").slideUp('slow');
</script>