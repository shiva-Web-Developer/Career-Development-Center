<?php $this->load->view('admin/common/header'); ?>
<?php $this->load->view('admin/common/sidebar'); ?>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Send Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Send Message</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">

                            <?= form_open('GetRecord', array('id' => 'filter-form')) ?>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">City</label>
                                            <input type="text" id="city" name="city" class="form-control" placeholder="Enter City">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">Age Group </label>
                                            <select name="age_group" class="form-control">
                                                <option value="">Select Type</option>
                                                <option value="G1">0 to 14</option>
                                                <option value="G2">15 to 24</option>
                                                <option value="G3">25 to 35</option>
                                                <option value="G4">36 to 48</option>
                                                <option value="G5">48+</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="name">Gender </label>
                                            <select name="gender_group" class="form-control">
                                                <option value="">Select type</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label for="name">Class </label>
                                            <select name="class_group" class="form-control">
                                                    <option value="">Select type</option>
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
                                    </div>
                                    <div class="col-sm-1">
                                        <div class="form-group">
                                            <label for="name" class="text-white">Search</label>
                                            <button type="submit" class="btn btn-primary">Search</button>
                                        </div>
                                    </div>
                                </div>
                                <?= form_close() ?>
                                <?= form_open_multipart('', array('id' => 'SendNotification')) ?>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Subject:</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" style="height: 2.6rem;" value="Career Development Center" readonly>
                                        <label class="mt-4">Upload Image</label>
                                        <input type="file" class="form-control" name="image" style="height: 2.6rem;">
                                        <span style="color: burlywood;">Image dimension should be(width:480px and Height:320px)</span>
                                        <input type="hidden" class="form-control" id="userid" name="id">
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Message</label>
                                              <div>
                                                    Insert Field: 
                                                    <button type="button" onclick="insertAtCaret('description','{name}')">Name</button>
                                                </div>
                                            <textarea type="text" id="description" name="msg" rows="8" class="form-control" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                           <input type="hidden" id="send_id" name="send_id" class="form-control" value="<?php echo $_SESSION['UID'] ?>">

                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <?= form_close() ?>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Users</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>City</th>
                                            <th>Gender</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody id="setdata">
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script>
        window.addEventListener('load', function() {
            $("#filter-form").submit(function(e) {
                e.preventDefault();
                var form = $(this);
                // console.log(form.serializeArray());
                $.ajax({
                    url: base_url + 'GetRecord',
                    type: 'post',
                    data: form.serializeArray(),
                    success: function(response) {
                        console.log(response);
                        resp = JSON.parse(response);
                        var myarray = new Array();
                        var rows = '';
                        for (i in resp) {
                            myarray.push(resp[i].id);
                            rows += "<tr><td>" + resp[i].NAME + "</td><td>" + resp[i].EMAIL + "</td><td>" + resp[i].MOB + "</td><td>" + resp[i].ADDRESS + "</td><td>" + resp[i].GENDER + "</td><td>" + resp[i].DOB + "</td></tr>";
                        }
                        $('#setdata').html(rows);
                        $('#userid').val(myarray);
                    }
                });
            })
        }, false);

        window.addEventListener('load', function() {
            $('#SendNotification').submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var userId = $('#userid').val();
                var userMessage = $('#description').val();
                if (userId == '') {
                    message('error', 'Please Search Any One Filter', 3000);
                } else if (userMessage == '') {
                    message('error', 'Please Enter Message', 3000);
                } else {
                    $.ajax({
                        url: 'https://app.cdc-azamgarh.com/web-push/send_push_notification.php',
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                            // var resp=JSON.parse(response);
                            // console.log(resp);
                            if(response == 'NO-SUBS'){
                                message('warning', 'No subscription found.', 3000);
                                return;
                            }
                            if (response.type == 'error') {
                                message('error', response.message, 3000);
                                return;
                            } else if (response == 'success') {
                                message('success', response.message, 3000);
                                setTimeout(function() {
                                    window.location.reload();
                                }, 3000);
                                return;
                            }
                            
                        },
                        error: function(jqXHR, exception) {
                            var msg = '';
                            if (jqXHR.status === 0) {
                                msg = 'Not connect.\n Verify Network.';
                                message('warning', msg, 3000); return;
                            } else if (jqXHR.status == 404) {
                                msg = 'Requested page not found. [404]';
                            } else if (jqXHR.status == 500) {
                                alert('Notification sent successfully.');
                                window.location.reload();
                            } else if (exception === 'parsererror') {
                                msg = 'Requested JSON parse failed.';
                            } else if (exception === 'timeout') {
                                msg = 'Time out error.';
                                message('warning', msg, 3000); return;
                            } else if (exception === 'abort') {
                                msg = 'Ajax request aborted.';
                                message('warning', msg, 3000); return;
                            } else {
                                msg = 'Uncaught Error.\n' + jqXHR.responseText;
                                message('warning', msg, 3000); return;
                            }
                            message('warning', 'No subscription found.', 3000);
                            $('#post').html(msg);
                        },
                    });
                }
            })
        });
    function insertAtCaret(areaId, text) {
        var txtarea = document.getElementById(areaId);
        if (!txtarea) {
            return;
        }

        var scrollPos = txtarea.scrollTop;
        var strPos = 0;
        var br = ((txtarea.selectionStart || txtarea.selectionStart == '0') ?
            "ff" : (document.selection ? "ie" : false));
        if (br == "ie") {
            txtarea.focus();
            var range = document.selection.createRange();
            range.moveStart('character', -txtarea.value.length);
            strPos = range.text.length;
        } else if (br == "ff") {
            strPos = txtarea.selectionStart;
        }

        var front = (txtarea.value).substring(0, strPos);
        var back = (txtarea.value).substring(strPos, txtarea.value.length);
        txtarea.value = front + text + back;
        strPos = strPos + text.length;
        if (br == "ie") {
            txtarea.focus();
            var ieRange = document.selection.createRange();
            ieRange.moveStart('character', -txtarea.value.length);
            ieRange.moveStart('character', strPos);
            ieRange.moveEnd('character', 0);
            ieRange.select();
        } else if (br == "ff") {
            txtarea.selectionStart = strPos;
            txtarea.selectionEnd = strPos;
            txtarea.focus();
        }

        txtarea.scrollTop = scrollPos;
    }
    </script>