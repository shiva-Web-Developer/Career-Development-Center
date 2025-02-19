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
        padding: 2rem;
        flex-direction: column;
    }

    #cla {
        /* background-color: white; */
        border-radius: 17px 19px 21px 26px;

    }

    #bmi-icon span {
        text-align: center;
    }

    #result {
        margin-left: 31%;
        font-size: 18px;
    }

    h2 {
        font-weight: 900;
        margin-left: 31%;
    }

    #image {
        display: block;
        max-width: 100%;
    }

    .preview {
        border: 1px solid red;
        overflow: hidden;
        width: 160px;
        height: 160px;
        margin: 10px;
    }

    .cropper-bg {
        width: 358px !important;

    }

    .cropper-point.point-se {

        height: 0px !important;
        width: 0px !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<?php
if ($this->session->flashdata('error')) {
    $msg = $this->session->flashdata('error');
    echo "<script>swal('Oops', '$msg', 'error');</script>";
}
?>
<main>
    <section id="profile">
        <div class="hamburger">
            <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'profile'; return false;" style="color: white;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                <path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path>
            </svg>
            <div style="color: white;">Profile</div>
            <div onclick="window.open('<?= base_url('logout') ?>','_self')" style="color: white;"><i class="fa fa-sign-out-alt"></i></div>
        </div>
        <div class="profile-dp text-center">
            <?php
            foreach ($info as $row) {
                if ($row['USER_PROFILE'] == '') {
            ?>
                    <img src="<?= base_url() ?>assets/img/user.png" id="imgupload" style="height: 124px;">
                <?php
                } else {
                ?>
                    <img src="<?= base_url('upload_profile/' . $row['USER_PROFILE']) ?>" id="imgupload" style="height: 124px;">
            <?php
                }
            }

            ?>
            </br>

            <label for="files" class="btn btn-light col-4 mt-1">Change</label>
            <input type="file" name="image" class="image" id="files" style="visibility:hidden;">


        </div>
        <div class="flex flex-column flex-item-center text-bold mt-1">
        </div>
    </section>

    <div class="container" id="fillbmi">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4 pt-3" id="cla">
                <?php
                if ($this->session->flashdata('update')) {
                ?>
                    <span class="main-container text-success"><?php echo $this->session->flashdata('update') ?></span>
                <?php
                    echo '<script>setTimeout(function(){$(".main-container").remove();}, 2000);</script>';
                }
                ?>

                <?= form_open('UpdateProfile'); ?>
                <?php
                foreach ($info as $row) {
                ?>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="fname">Full Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['NAME'] ?>" placeholder="First name" id="fname" name="name" title="Full Name" autocomplete="fullname" readonly>
                            <input type="text" class="form-control" value="<?php echo $row['id'] ?>" name="id" hidden>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="<?php echo $row['EMAIL'] ?>" placeholder="Enter Email" id="email" name="email" title="Enter Email" autocomplete="email" readonly>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="mobilenumber">Mobile No</label>
                            <input type="text" class="form-control" value="<?php echo $row['MOB'] ?>" placeholder="Enter Mobile Number" id="mobilenumber" name="mobile" title="Enter Mobile Number" autocomplete="mobilenumber" readonly>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="dob">DOB</label>
                            <input type="date" class="form-control" value="<?php echo $row['DOB'] ?>" id="dob" name="dob" title="Enter DOB" autocomplete="dob" readonly>
                        </div>

                        <div class="col-sm-6 form-group">
                            <label for="dob">Father Name</label>
                            <input type="text" class="form-control" value="<?php echo $row['F_NAME'] ?>" id="fname" name="fname" title="Enter Father Name" autocomplete="F_NAME" readonly>
                        </div>
                        
                        <div class="col-sm-6 form-group">
                            <label for="dob">Class/Course</label>
                            <select name="class" id="class" class="form-control" readonly>
                                <option value="<?php echo $row['CLASS'] ?>"><?php echo $row['CLASS'] ?></option>
                                    <option value="5">Class 5</option>
                                        <option value="6">Class 6</option>
                                        <option value="7">Class 7</option>
                                        <option value="8">Class 8</option>
                                        <option value="9">Class 9</option>
                                        <option value="10">Class 10</option>
                                        <option value="11">Class 11</option>
                                        <option value="12">Class 12</option>
                                        <option value="B.A">BA (Bachelor of Arts)</option>
                                        <option value="M.A">MA (Master of Arts)</option>
                                        <option value="B.ED">BEd (Bachelor of Education)</option>
                                        <option value="M.ED">MEd (Master of Education)</option>
                                        <option value="B.SC">BSc (Bachelor of Science)</option>
                                        <option value="M.SC">MSc (Master of Science)</option>
                                        <option value="B.Tech">BTech (Bachelor of Technology)</option>
                                        <option value="M.Tech">MTech (Master of Technology)</option>
                                        <option value="CA">CA (Chartered Accountant)</option>
                                        <option value="MBA">MBA (Master of Business Administration)</option>
                                        <option value="PH.D">PhD (Doctor of Philosophy)</option>
                            </select>
                        </div>
                        
                          <div class="col-sm-6 form-group">
                                <label for="state">State</label>
                                <select name="state" class="form-control" id="state" onchange="getCity(this.value)" readonly>
                                    <option value=''>Select state</option>
                                    <?php
                                    foreach($states as $row1){
                                        if(strtolower($row1['STATE']) == strtolower($row['STATE'])){
                                            $selected = 'selected';
                                        }else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option <?= $selected ?> value="<?= $row1['STATE'] ?>"><?= $row1['STATE'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            
                              <div class="col-sm-6 form-group">
                              <label for="city">City</label>
                                <select name="city" class="form-control" id="city" readonly>
                                    <option value="<?= $row['CITY'] ?>"><?= $row['CITY'] ?></option>
                                    <?php
                                    foreach($cities as $row1){
                                        if(strtolower($row1['STATE']) != strtolower($row['STATE'])){continue;}
                                        if(strtolower($row1['CITY']) == strtolower($row['CITY'])){
                                            $selected = 'selected';
                                        }else{
                                            $selected = '';
                                        }
                                        ?>
                                        <option <?= $selected ?> value="<?= $row1['DISTRICT'] ?>"><?= $row1['DISTRICT'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                           
                        <div class="col-sm-6 form-group">
                            <label for="dob">Gender</label>
                            <select name="gender" id="gender" class="form-control" readonly>
                                <option value="<?php echo $row['GENDER'] ?>"><?php echo $row['GENDER'] ?></option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                           
                        <div class="col-sm-6 form-group">
                            <label for="dob">Address</label>
                            <input type="text" class="form-control" value="<?php echo $row['ADDRESS'] ?>" id="address" name="address" title="Enter ADDRESS" autocomplete="address" readonly>
                        </div>

                                 
                        <div class="col-sm-6 form-group">
                            <label for="dob">College</label>
                            <input type="text" class="form-control" value="<?php echo $row['COLLEGE'] ?>" id="college" name="college" title="Enter COLLEGE" autocomplete="college" readonly>
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-success btn-block edit" onclick="editprofile()">Edit</button>
                        <button type="submit" class="btn btn-success btn-block update" style="display:none">Update</button>
                        <button type="button" class="btn btn-success btn-block update" data-toggle="modal" data-target="#exampleModal">Change Password</button>
                    </div>
                <?php
                }

                ?>
                <?= form_close(); ?>

            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Crop image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="img-container">
                        <div class="row">
                            <div class="col-md-8">
                                <img id="image">
                            </div>
                            <div class="col-md-4">
                                <div class="preview"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-success" id="crop">Crop & Save</button>
                </div>
            </div>
        </div>
    </div>
</main>
<?php
    if(isset($cities)){
        echo "<script>var cities = ".json_encode($cities).";</script>";
    }else{
        echo "<script>var cities = [];</script>";
    }
?>
<script>
    function editprofile() {
        $('.form-control').attr('readonly', false);
        $('.edit').hide();
        $('.update').show();
    }

    var bs_modal = $('#modal');
    var image = document.getElementById('image');
    var cropper, reader, file;


    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            bs_modal.modal('show');

        };
        if (files && files.length > 0) {
            file = files[0];

            if (URL) {
                done(URL.createObjectURL(file));
            } else if (FileReader) {
                reader = new FileReader();
                reader.onload = function(e) {
                    done(reader.result);
                };
                reader.readAsDataURL(file);
            }
        }
    });
    bs_modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 1,
            viewMode: 3,
            preview: '.preview'
        });

    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });
    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
        });
        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);

            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                // alert(base64data);
                $.ajax({
                    type: "POST",
                    url: base_url + "crop_image_upload",
                    data: {
                        image: base64data,
                        csrf_token: csrf_value
                    },
                    success: function(data) {
                        bs_modal.modal('hide');
                        location.reload();

                    }
                });
            };
        });
    });
    $("#files").change(function() {
        filename = this.files[0].name;
        console.log(filename);
    });
        function getCity(str){
        var cityAray = [];
        rows = '';
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
</script>