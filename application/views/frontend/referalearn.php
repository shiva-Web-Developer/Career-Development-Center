<style>
    #home-header{
        background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/profilebg.jpg');    
        background-size: cover;
        background-position: bottom;
        padding: 2rem 1.6rem;
        padding-bottom: 3rem;
        border-radius: 0 0 70px 70px;
    }
   
  
    #services{
        font-size:32px;
        border-radius: 35px;
        margin-top: -69px;
        padding: 0.6rem;
      
    }
  
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
    #invt{
        background-color: #76daf2;
        border-radius: 10px 11px 4px 0px;
        height: 35px;
        margin-top: 42px;
     }
  
  </style>
<main>
    <?php $this->load->view('frontend/first-visit'); ?>
    <section id="home-header">
        <div class="flex flex-row space-between flex-column">
            <div class="flex flex-row">
               
                
            </div>
        </div>
        <div>
           
        </div>
    </section>
    <section class="main-container">
        <div id="services" class="flex flex-wrap flex-content-center flex-item-center">
  <span>Refer And Earn</span>
        </div>
     <img src="<?php echo base_url()?>assets/img/refer.jpg"">
     <div class="flex flex-column rfrl my-1">
            <small>Your Referral Code</small>
            <div class="bg-white flex flex-cotent-center flex-column">
                <button onclick="copyToClipboard('#ref')"><span id="ref">#fdae125</span></button>
               
            </div>
            <span id="msg" style="color:red"></span>
        </div>
    </section>
    <section id="invt">
        <div  class="flex flex-wrap flex-content-center flex-item-center">
  <a href="javasceript:void(0)"style="font-size: x-large;margin-top: 5px;">Invite</a>
        </div>
   
    </section>
</main>
<script>
    function copyToClipboard(element) {
  var $temp = $("<input>");
  $("body").append($temp);
  $temp.val($(element).text()).select();
  document.execCommand("copy");
  $('#msg').html('Your Referral Code Copied');
  setTimeout(function() {
                        $('#msg').hide();
                    }, 2000);
  $temp.remove();
}
</script>