<style>
    .rfrl div>button{
        border: 1px dashed black;
        padding: 4px 8px;
        background-color: white;
        outline: none;
        margin: 3px;
    }
    .rfrl div>button, .rfrl div{
        border-radius: 16px;
    }
    .refer-btn{
        border: 1px solid #48c557;
        padding: 0.3rem 0.4rem;
        color: white !important;
        background-color: #48c557;
        border-radius: 4px;
    }
    .refer-btn:active, .refer-btn:focus, .refer-btn:hover{
        color: white;
    }
    .refer-btn a{
        color: inherit;
    }
</style>
<main class="main">
    <section class="main-container">
    <svg class="svg-inline--fa fa-arrow-left"style="margin-right: 308px;" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
        <div style="margin-top:1rem;"><img src="<?= base_url() ?>assets/icon/gift.png" width="90px" height="auto"></div>
        <h2 class="mt-2">Refer & Earn</h2>
        <h3><i class="fa fa-wallet" style="font-size: 1.5rem;"></i>&nbsp;&nbsp;&nbsp; Total Earnings</h3>
        <?php
            $points = 0;
            foreach($refs as $row){ 
                $points += $row['points'];
            }
        ?>
        <span style="background:white;padding:6px 12px;border-radius:16px;"><b><?= $points ?> Points</b></span>
        <div class="flex flex-column rfrl my-2">
            <small>Your Referral Code</small>
            <div class="bg-white flex flex-cotent-center flex-column">
                <button onclick="copyToClipboard('#ref')"><span id="ref"><?= $referal_code; ?></span></button>
            </div>
            <div style="margin-top:1rem;">
                <?php
                    $msg = urlencode('Hi! Use '.$referal_code.' while registering for Career Development Center and earn 250 points. Download the app by clicking on this link -  https://app.cdc-azamgarh.com');
                ?>
                <a href="http://wa.me/?text=<?php echo $msg; ?>" class="refer-btn" target="_blank"><i class="fab fa-whatsapp"></i> Refer Now</a>
            </div>
        </div>
        <div style="margin-top:1rem;margin-bottom: 1rem;" class="text-center">
            <span style="color: #39ac39;font-size: 14px;font-style: italic;">You earn points if you increase education awareness community by referring <strong>Career Development Center</strong> to your friends</span>
        </div>
        <table class="points-tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th class="text-center">POINTS</th>
                    <th>REMARK</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i = 0;
                foreach($refs as $row){ $i++;?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo date_format(date_create($row['date']),'d M Y'); ?></td>
                        <td class="text-center">+ <?php echo $row['points']; ?></td>
                        <td><?php echo $row['remark']; ?></td>
                    </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
    </section>
</main>
<script>
    function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $('#msg').html('Your Referral Code Copied');
        setTimeout(function() { $('#msg').hide();}, 2000);
        $temp.remove();
    }
</script>