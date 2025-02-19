<style>
    #profile{
        background: radial-gradient(var(--primary-color), var(--secondary-color));
        background-image: url('<?= base_url() ?>assets/img/profilebg1.png');    
        background-size: cover;
        background-position: bottom;
        padding-bottom: 2rem;
        border-radius: 0 0 35px 35px;
    }
    .profile-dp img{
        width: 120px;
        border-radius: 50%;
    }
    .points-container{
        background: white;
        width: fit-content;
        padding: 2px 6px;
        border-radius: 15px;
    }
    .content{
        display: flex;
        align-items: center;
        padding: 2rem;
        flex-direction: column;
    }
    
#cla
{
    /* background-color: white; */
    border-radius: 17px 19px 21px 26px;
 
}

#bmi-icon span{
    text-align: center;
}
#result
{
    margin-left: 31%;
    font-size: 18px;
}
h2
{
    font-weight: 900;
    margin-left: 31%;
}
</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if($this->session->flashdata('error'))
  {
    $msg=$this->session->flashdata('error');
    echo "<script>swal('Oops', '$msg', 'error');</script>";
  }
?>
<main>
    <section id="profile">
        <div class="hamburger">
        <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'profile'; return false;" style="color: white;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
            <div style="color: white;">Profile</div>
            <div onclick="window.open('<?= base_url('logout') ?>','_self')" style="color: white;"><i class="fa fa-sign-out-alt"></i></div>
        </div>
        <div class="profile-dp text-center">
            <?php
                foreach($info as $row)
                {
                    if($row['USER_PROFILE']=='')
                    {
                    ?>
                    <img src="<?= base_url() ?>assets/img/user_Demo.jfif" id="imgupload" style="height: 124px;" onclick='openfile("#file-input1")'>
                    <?php
                    }
                    else
                    {
                        ?>
                        <img src="<?= base_url('upload_profile/'.$row['USER_PROFILE']) ?>" id="imgupload" style="height: 124px;" onclick='openfile("#file-input1")'>
                        <?php
                    }
                
                }
                
                ?>
            </br>

            <?= form_open('updateprofileimg',array('enctype' => "multipart/form-data"))?>
            <input id="file-input1" type="file" name="userfile" style="display: none;"/>
            <button class="btn-link btn-outline-warning" style="display:none" id="up">Upload</button>
            <?= form_close()?>
            <button class="btn-link btn-outline-warning" id="change" onclick='openfile("#file-input1")'>Change</button>
            
        </div>
           <div class="flex flex-column flex-item-center text-bold mt-1">
          </div>
      </section>
   
     <div class="container" id="fillbmi">
         <div class="row">
                <div class="col-sm-4"></div>
                <div class="col-sm-4 pt-3" id="cla">
                    <?php
                        if($this->session->flashdata('update'))
                        {
                            ?>
                            <span class="main-container"><?php echo $this->session->flashdata('update')?></span>
                            <?php
                        echo '<script>setTimeout(function(){$(".main-container").remove();}, 2000);</script>';
                        }
                    ?>
                
                <?= form_open('UpdateProfile');?>
                    <?php
                    foreach($info as $row)
                    {
                    ?>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="fname">Full Name</label>
                                <input type="text" class="form-control" value="<?php echo $row['NAME']?>" placeholder="First name" id="fname" name="name" title="Full Name" autocomplete="fullname" readonly>
                                <input type="text" class="form-control" value="<?php echo $row['id']?>" name="id" hidden>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="<?php echo $row['EMAIL']?>" placeholder="Enter Email" id="email" name="email" title="Enter Email" autocomplete="email" readonly>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="mobilenumber">Mobile No</label>
                                <input type="text" class="form-control" value="<?php echo $row['MOB']?>" placeholder="Enter Mobile Number" id="mobilenumber" name="mobile" title="Enter Mobile Number" autocomplete="mobilenumber" readonly>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="dob">DOB</label>
                                <input type="date" class="form-control" value="<?php echo $row['DOB']?>"  id="dob" name="dob" title="Enter DOB" autocomplete="dob" readonly>
                            </div>
                        
                            
                        </div>

                        <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block edit" onclick="editprofile()">Edit</button>
                        <button type="submit" class="btn btn-primary btn-block update" style="display:none">Update</button>
                        <button type="button" class="btn btn-primary btn-block update" data-toggle="modal" data-target="#exampleModal">Change Password</button>
                        </div>
                        <?php
                    }
                    
                    ?>
                <?= form_close();?>

                </div>
                <div class="col-sm-4"></div>
            </div>
        </div>
        
</main>
<script>
function editprofile()
{
    $('.form-control').attr('readonly', false);
    $('.edit').hide();
    $('.update').show();
}
function openfile(a) {
  $(a).trigger('click');
  $(a).change(function(){
        const file = this.files[0];
        console.log(file);
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
            console.log(event.target.result);
            $('#imgupload').attr('src', event.target.result);
            $('#up').show();
            $('#change').hide();
        }
          reader.readAsDataURL(file);
        }
      
      });
    
}
</script>