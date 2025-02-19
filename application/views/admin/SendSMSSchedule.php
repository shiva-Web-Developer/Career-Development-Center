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
                        <h1>Schedule Message</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Schedule Message</li>
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

                            <?= form_open_multipart(base_url() . 'Save-Sms-data') ?>

                            <div class="card-body">
                                <div class="row">

                                    <div class="col-sm-12">
                                        <h6><b>Select User Type:</b></h6>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select State</label>
                                            <select name="state" id="state" class="form-control ui fluid search dropdown" required>
                                                <option value="">-- Select --</option>
                                                <?php foreach ($pin as $state) { ?>
                                                    <option value="<?php echo $state->STATE ?>"><?php echo $state->STATE ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select City</label>
                                            <select name="city[]" id="city" class="form-control ui fluid search dropdown" multiple></select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Age Group</label>
                                            <select name="age" class="form-control">
                                                <option>Select Type</option>
                                                <?php foreach ($ages as $key => $value) : ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>


                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Gender</label>
                                            <select name="gender" class="form-control">
                                                <option value="">Select type</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="other">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" hidden>
                                        <div class="form-group">
                                            <label>Select Cuisine</label>
                                            <select name="cuisine" class="form-control">
                                                <option value="">Select type</option>
                                                <?php foreach ($cuisines as $key => $value) : ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" hidden>
                                        <div class="form-group">
                                            <label>Select Dietary</label>
                                            <select name="dietary" class="form-control">
                                                <option value="">Select type</option>
                                                <?php foreach ($dietary as $key => $value) : ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6><b>Scheduled Time Period:</b></h6>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Message Type</label>
                                            <select name="message_type" class="form-control">
                                                <option value="">Select type</option>
                                                <option value="0">Push Message</option>
                                                <option value="1">Mail</option>
                                                <option value="2">Both</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Type</label>
                                            <select name="send_type" class="form-control" id="datavalue">
                                                <option value="">-- Select --</option>
                                                <option value="Once">Once</option>
                                                <option value="Daily">Daily</option>
                                                <option value="Weekly">Weekly</option>
                                                <option value="Monthly">Monthly</option>
                                                <option value="Yearly">Yearly</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="monthdata" hidden>
                                        <div class="form-group">
                                            <label>Month</label>
                                            <select name="month" class="form-control">
                                                <option value="">-- Select --</option>
                                                <?php foreach ($months as $key => $value) : ?>
                                                    <option value="<?= $key ?>"><?= $value ?></option>
                                                <?php endforeach; ?>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="daydata" hidden>
                                        <div class="form-group">
                                            <label>Day</label>
                                            <select name="day" class="form-control">
                                                <option value="">-- Select --</option>
                                                <option value="monday">Monday</option>
                                                <option value="tuesday">Tuesday</option>
                                                <option value="wednesday">Wednesday</option>
                                                <option value="thursday">Thursday</option>
                                                <option value="friday">Friday</option>
                                                <option value="saturday">Saturday</option>
                                                <option value="sunday">Sunday</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="slotdata" hidden>
                                        <div class="form-group">
                                            <label>Slot Time</label>
                                            <select name="time_slot" class="form-control">
                                                <option value="">-- Select --</option>
                                                <option value="first_day">First Day</option>
                                                <option value="last_day">Last Day</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4" id="datedata" hidden>
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input type="date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Select Time</label>
                                            <select name="time" class="form-control">
                                                <option value="">-- Select --</option>
                                                <option value="08:00">8:00AM</option>
                                                <option value="12:00">12:00AM</option>
                                                <option value="15:00">3:00AM</option>
                                                <option value="18:00">6:00AM</option>

                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <h6><b>Message Subject:</b></h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Subject:</label>
                                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" style="height: 2.6rem;" value="Career Development Center">
                                        <label class="mt-4">Upload Image</label>
                                        <input type="file" class="form-control" name="userfile" style="height: 2.6rem;" required>
                                        <span style="color: burlywood;">Image dimension should be(Width:480px and Height:320px)</span><br>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="description">Message</label>
                                             <div>
                                                    Insert Field: 
                                                    <button type="button" onclick="insertAtCaret('description','{name}')">Name</button>
                                                </div>
                                            <textarea type="text" name="message" rows="8" class="form-control" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary">Schedule</button>
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
                                <h3 class="card-title">Schedule Message List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Age</th>
                                            <th>Gender</th>
                                            <th>Subject</th>
                                            <th>Time Slot</th>
                                            <th>Message</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th hidden>Action</th>

                                        </tr>
                                    </thead>

                                    <tbody id="setdata">

                                        <?php $i = 1;
                                        foreach ($scheduled_message as $data_msg) { ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td><?php echo $data_msg->state ?></td>
                                                <td><?php echo $data_msg->city ?></td>

                                                <td>
                                                    <?php
                                                    if ($data_msg->age == 'G1') {
                                                        echo "<span>0 to 14</span>";
                                                    } elseif ($data_msg->age == 'G2') {
                                                        echo "<span>15 to 24</span>";
                                                    } elseif ($data_msg->age == 'G3') {
                                                        echo "<span>25 to 35</span>";
                                                    } elseif ($data_msg->age == 'G4') {
                                                        echo "<span>36 to 48</span>";
                                                    } else {
                                                        echo "<span>48+</span>";
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $data_msg->gender ?></td>

                                                <td><?php echo $data_msg->subject ?></td>
                                                <td>
                                                    <?php echo $data_msg->send_type ?><br>
                                                
                                                </td>
                                                <td><?php echo $data_msg->message ?></td>

                                                <td>
                                                    <?php
                                                    if ($data_msg->status == '0') {
                                                        echo "<span style='color:#006600;'><b>Enabled</b></span>";
                                                    } else {
                                                        echo "<span style='color:red;'><b>Disabled</b></span>";
                                                    }
                                                    ?>
                                                </td>


                                                <td><img style="height:100px;width:100px;" src="<?php echo base_url('assetstunch/smsdata/' . $data_msg->image); ?>" /></td>
                                                <td>
                                                    <div class="btn-group" hidden>
                                                        <button type="button" class="btn btn-success">Action</button>
                                                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            <span class="sr-only">Toggle Dropdown</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a hidden class="dropdown-item" href="javascript:void(0)" onclick="viewSmsData(<?= $data_msg->id ?>)">Re Schedule</a>
                                                            <a hidden class="dropdown-item" href="javascript:void(0)" onclick="SmsEnabled(<?= $data_msg->id ?>)">Enabled</a>
                                                            <a hidden class="dropdown-item" href="javascript:void(0)" onclick="SmsDisabled(<?= $data_msg->id ?>)">Disabled</a>
                                                            <a class="dropdown-item" href="javascript:void(0)" onclick="SmsDisabled(<?= $data_msg->id ?>)">Disabled</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.9/semantic.min.js" integrity="sha512-idTE8nn9mF7rh+sChjr7tyR7v1ePcqlAtCbhg/H4vrMXAI9TH1BO0nUIfrV58Y3mTkVhriXGT6rlT81HECa4RA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#state').on('change', function() {
                var statename = $(this).val();
                if (statename) {
                    $.ajax({
                        type: "POST",
                        url: base_url + "ajaxfetchcity",
                        data: {
                            "statename": statename,
                            "csrf_token": csrf_value
                        },
                        success: function(response) {
                            var cities = JSON.parse(response);
                            $('#city').empty().append('<option value="">Select City Name</option>');
                            $.each(cities, function(key, value) {
                                $("#city").append('<option value="' + value.DISTRICT + '">' + value.DISTRICT + '</option>');

                            });
                        },
                        error: function(xhr, status, error) {
                            // Handle errors here
                            console.error("Error occurred: " + error);
                        }
                    });
                } else {
                    $('#city').empty().append('<option value="">Select State First</option>');
                }
            });
            $('#datavalue').on('change', function() {
                var datavalue = $(this).val();
                // alert(datavalue);

                $('#datedata').attr('hidden', true);
                $('#daydata').attr('hidden', true);

                if (datavalue == 'Once') {
                    $('#datedata').attr('hidden', false);
                } else if (datavalue == 'Daily') {} else if (datavalue == 'Weekly') {
                    $('#daydata').attr('hidden', false);

                } else if (datavalue == 'Monthly') {
                    $('#slotdata').attr('hidden', false);
                } else {
                    $('#daydata').attr('hidden', false);
                    $('#slotdata').attr('hidden', false);
                    $('#monthdata').attr('hidden', false);
                }
            });
        });
        $(function() {
            $(".ui.dropdown").dropdown();
        })
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