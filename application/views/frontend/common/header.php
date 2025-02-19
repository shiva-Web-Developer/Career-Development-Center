<style>
   
    #installBtnContainer{
        width: 100%;
        overflow: hidden;
        padding:10px;
        position: absolute;
        z-index: 11111;
        text-align: -webkit-center;
    }
    #installPrompt{
        width: 90%;
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f7f7f7;
        padding: 16px 16px;
        border-radius: 10px;
        box-shadow: 0px 0px 7px 1px grey;
    }
        
    .install-header {
        background-color: #f7f7f7;
        padding: 16px;
        display: flex;
        align-items: center;
        border-bottom: 1px solid #ccc;
    }
    
    .install-header .app-icon {
        width: 24px;
        height: 24px;
        margin-right: 8px;
    }
    
    
    .install-actions {
        display: flex;
        justify-content: flex-end;
        padding-top:10px;
    }
    
    .action-button {
        border: none;
        padding: 8px 16px;
        margin-left: 8px;
        border-radius: 4px;
        cursor: pointer;
        font-size:12px;
    }
    
    .action-button.primary {
        background-color: #0078d4;
        color: white;
    }
    
    .action-button:not(.primary) {
        background-color: #ddd;
        color: #333;
    }
    .maindiv{
        position:absolute;
    }
    
    .hidden{
        display: none;
    }
</style>


<div id="installBtnContainer" class="hidden">
    <div id="installPrompt" class="install-prompt">
        <div class="install-body">
            <p style="font-size:13px;"> 
                <img src="<?= base_url() ?>assets/img/download.png" style="height:20px;width:20px;">&nbsp;&nbsp;
                For Better Experience Download This App !
            </p>
        </div>
        <div class="install-actions"> 
            <button id="installButton" class="action-button primary" >Install</button>
            <button id="cancelButton" class="action-button" >Not Now</button>
        </div>
    </div> 
</div>



<div id="splash-screen">
    <div class="splash-container">
        <img src="<?= base_url() ?>assets/img/cdc-new-bg.png">
    </div>
</div>
<div class="av-box-container" id="form-1">
    <div class="box-inner-container">
      <div class="box-body">
        <div id="box-head"></div>
        <form id="box-form"></form>
        <div id="no-form"></div>
        <div id="box-result"></div>
      </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     <?= form_open(base_url('updatepassword'))?>
     
      <div class="modal-body">
            <div class="form-group">
                <label for="oldpassword">Old Password</label>
                <input type="password" class="form-control" id="oldpassword" placeholder="Enter Old Password" name="oldpassword" onkeyup="validate_oldpassword()">
                <span id="erroroldpass"></span>
              </div>
          <div class="form-group">
            <label for="newpassword">New Password</label>
            <input type="text" class="form-control" id="newpassword" placeholder="Enter New Password" name="password" onkeyup="user_password()">
            <span id="errorpass"></span>
          </div>
          <div class="form-group">
            <label for="confirmpassword">Confirm Password</label>
            <input type="text" class="form-control" id="confirmpassword" placeholder="Enter Confirm Password" name="confirmpassword" onkeyup="user_confirmpassword()">
            <span id="errorcpass"></span>
          </div>
        </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="save" disabled>Update Password</button>
      </div>
      <?= form_close()?>
    </div>
  </div>
</div>


<script>
document.getElementById('cancelButton').addEventListener('click', function() {
    // document.getElementById('installPrompt').style.display = 'none';
    $('#installBtnContainer').fadeOut();
});

document.getElementById('installButton').addEventListener('click', function() {
    // Logic to initiate the installation process
});

</script>





