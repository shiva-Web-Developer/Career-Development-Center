<main class="main">
    <section class="main-container" style="background-image:linear-gradient(#ccffeb, white);">
        <svg class="svg-inline--fa fa-arrow-left" style="margin-right: 308px;" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
            <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
        </svg>
        <div style="margin-top: 1rem;">
            <img src="<?= base_url() ?>assets/icon/jobs.png" width="90px" height="auto" />
        </div>
        <h2 class="mt-2">Latest Jobs</h2>

        <div>
            <?php foreach ($result as $res) { ?>

                <ul>
                    <li>
                        <?= $res['job_title'] ?>
                    </li>
                    <span>End Date: <span style="color:red;"> <?= $res['end_date'] ?></span></span><br>
                    <a href="<?php echo base_url() ?>jobdiscreption?name=<?php echo $res['id']; ?>"><span style="color:green;font-size:10px:">Read More....</span></a>
                </ul>
            <?php } ?>
        </div><br>
        <a href="https://www.sarkariresult.com/" target="_blank">
        </a>
    </section>
</main>