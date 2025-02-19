<script>
    var base_url = "<?= base_url() ?>";  
    var guid = "";
</script>
<?php
    if(isset($_SESSION['UID'])){
        echo "<script>guid = ".$_SESSION['UID'].";</script>";
    }
     if($page != "play-earn"){ ?>
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <?php }
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?= base_url() ?>assets/js/pwa.js"></script>
<script src="<?= base_url() ?>assets/js/main.js"></script>
<script src="<?= base_url() ?>assets/js/push1.js"></script>
<script src="<?= base_url() ?>assets/js/av-alert_ver01.js"></script>
<?php
    $js = array(
        "play-earn" => array(base_url().'assets/js/playearn_ver0.2.js?ver=0.2'),
    );
    if(isset($js[$page])){
        foreach($js[$page] as $row){
            ?>
            <script src="<?= $row ?>"></script>
            <?php
        }
    }
    if($page == "play-earn"){
       ?>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.2/chart.min.js" integrity="sha512-zjlf0U0eJmSo1Le4/zcZI51ks5SjuQXkU0yOdsOBubjSmio9iCUp8XPLkEAADZNBdR9crRy3cniZ65LF2w8sRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <?php
    }
?>
<script>
    var el_dialogBox, el_boxForm, el_boxHead, el_boxResult, el_boxBody;
    $(function(){
        el_dialogBox = $("#form-1");
        el_boxHead = $("#box-head");
        el_boxForm = $("#box-form");
        el_boxBody = $("#no-form");
        el_boxResult = $("#box-result");
    })
    function closeDialogBox(){
        el_dialogBox.hide();
        el_boxHead.html('');
        el_boxForm.html('');
        el_boxBody.html('');
        el_boxResult.html('');
    }
    function openDialogBox(heading = ""){
        el_boxHead.html(heading);
        el_dialogBox.show();
    }
</script>