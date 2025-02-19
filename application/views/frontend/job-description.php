<style>
    #home-header {
        /* background: radial-gradient(var(--primary-color), var(--secondary-color));
   background-image: url('<?= base_url() ?>assets/img/profilebg.jpg');     */
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

    .points-tbl td,
    .points-tbl th {
        border-right: 1px solid #d3b0b0;
    }

    .points-tbl tr {
        border-top: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
    }

    .points-tbl tr:nth-child(even) {
        background-color: #eaeaea;
    }

    .points-tbl td,
    .points-tbl th {
        padding: 0.4rem 0.6rem;
        font-size: 0.6rem;
    }

    table.points-tbl {
        width: 95%;
        background: var(--grey);
        margin: 0.5rem;
        border-radius: 8px;
    }

    table.points-tbl thead {
        color: black;
        font-weight: bold;
        font-size: 1rem;
    }

    table.points-tbl tbody {
        background-color: white;
    }

    #bmi-icon {
        border-radius: 50%;
        box-shadow: 0 0 6px #58119b;
        height: 120px;
        width: 120px;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background-color: white;
    }

    #bmi-icon img {
        width: 60px;
        height: auto;
    }

    #bmi-icon span {
        text-align: center;
    }

    .test-card {
        text-align: justify;
        padding: 8px;
        margin: 6px 8px;
        background: white;
        border-radius: 4px;
    }

    .test-card h4 {
        margin-bottom: 0.5rem !important;
        margin: 0;
        border-bottom: 3px solid var(--primary-color);
        width: fit-content;
        color: var(--primary-color);
    }

    .test-card p {
        padding: 6px 0;
        text-align: justify;
    }

    p {
        font-family: Lato, 'Helvetica Neue', Arial, Helvetica, sans-serif !important;
    }
</style>
<?php
if ($_REQUEST['name'] == '') {
    redirect('ViewAll');
} else {
?>
    <main>
        <?php $this->load->view('frontend/first-visit'); ?>
        <section id="home-header">
            <div class="flex flex-row space-between flex-column">
                <div class="">
                    <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'latest-jobs'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                        <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
                    </svg>
                </div>
                <?php
                foreach ($descript as $row) { ?>
                    <div class="flex flex-row space-around">
                    </div>
            </div>
        </section>
        <div class="slideshow">
            <div class="slideshow-container">
                <div class="ml-2 mySlides" style="display: block;">
                    <div class="numbertext"></div>
                    <div class="text" style="color:black"></div>
                </div>
            </div>
        </div>
        <div class="text-center m-3">
            <h3><?= $row['job_title'] ?></h3>
        </div>
        <div class="flex flex-column">
            <div class="test-card">
                <h4>Basic Description</h4>
                <?= $row['description'] ?>
                <h4 style="padding-top:5px;">Age Limit</h4>
                <h6>Minimum Age : <?= $row['min_age'] ?></h6>
                <h6>Maximum Age : <?= $row['max_age'] ?></h6>
                <h4>Date</h4>
                <h6>Start Date: <span style="color:green;"> <?= $row['start_date'] ?></span></h6>
                <h6>End Date: <span style="color:red;"><?= $row['end_date'] ?></span></h6>
                <h4>Application Fee</h4>
                <h6><span> <?= $row['fee'] ?></span></h6>
                <h4>Payment Method</h4>
                <h6>Pay the Examination Fee: Debit Card, Credit Card, Net Banking, IMPS, Cash Card, Mobile Wallet, E Challan </h6>
                <h4>Eligibility</h4>
                <h6><span> <?= $row['eligibility'] ?></span></h6>
                <h6 style="margin:15px;" class="text-center">
                    <b><u>
                            <a href="<?= $row['url'] ?>" id="apply_tab" target="_blank" style="color:#072aed!important;font-size:15px;">Apply Now</a>
                        </u>
                    </b>
                </h6>
            </div>
        </div>
        <br>
    <?php  } ?>
    </main>
<?php
}
?>