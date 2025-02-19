<?php $this->load->view('admin/common/header');?>
<?php $this->load->view('admin/common/sidebar');?>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Email Message</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Send Email Message</li>
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
               <?= form_open('GetRecord',array('id'=>'filter-form'))?>
                <div class="card-body">
                    <div class="col-sm-3">
                          <!-- text input -->
                          <div class="form-group">
                            <label for="name">Select Type</label>
                            <select name="filter_type" id="filter_type" class="form-control" onchange="hidefilter(this.value, 5)" required>
                                <option value="">Select filter</option>
                                <option value="All">Send to All</option>
                                <option value="Individual">Send to Individual</option>
                                <option value="Selected">Send to Selected</option>
                            </select>
                          </div>
                        </div>
                  <div class="row" style="display:none" id="searchfilter">
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Filter 1</label>
                        <select name="filter1" id="filter1" class="form-control" onchange="hidefilter(this.value, 1)" required>
                            <option value="">Select filter 1</option>
                            <option value="ADDRESS">City</option>
                            <!-- <option value="DOB">Age Group</option>
                            <option value="GENDER">Gender</option>
                            <option value="CLASS">Class</option> -->
                            <!-- <option value="DEIT">Dietary Preference</option> -->
                        </select>
                      </div>
                      <div class="form-group" style="display:none" id="inputfilter1">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Filter 2</label>
                        <select name="filter2" id="filter2" class="form-control" onchange="hidefilter(this.value, 2)">
                            <option value="">Select filter 2</option>
                            <!-- <option value="CITY">City</option> -->
                            <option value="DOB">Age Group</option>
                            <!-- <option value="GENDER">Gender</option>
                            <option value="CLASS">Class</option> -->
                            <!-- <option value="DEIT">Dietary Preference</option> -->
                        </select>
                      </div>
                      <div class="form-group" style="display:none" id="inputfilter2">
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <!-- text input -->
                      <div class="form-group">
                      <label for="name">Filter 3</label>
                        <select name="filter3" id="filter3" class="form-control" onchange="hidefilter(this.value, 3)">
                        <option value="">Select filter 3</option>
                            <!-- <option value="CITY">City</option>
                            <option value="DOB">Age Group</option> -->
                            <option value="GENDER">Gender</option>
                            <!-- <option value="CLASS">Class</option> -->
                            <!-- <option value="DEIT">Dietary Preference</option> -->
                           
                        </select>
                      </div>
                      <div class="form-group" style="display:none" id="inputfilter3">                      
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <!-- text input -->
                      <div class="form-group">
                        <label for="name">Filter 4</label>
                        <select name="filter4" id="filter4" class="form-control" onchange="hidefilter(this.value, 4)">
                            <option value="">Select filter 4</option>
                            <!-- <option value="CITY">City</option>
                            <option value="DOB">Age Group</option>
                            <option value="GENDER">Gender</option> -->
                            <option value="CLASS">Class</option>
                            <!-- <option value="DEIT">Dietary Preference</option> -->
                            
                        </select>
                      </div>
                      <div class="form-group" style="display:none" id="inputfilter4">                    
                      </div>
                    </div>
                    <div class="col-sm-1">
                      <div class="form-group">
                      <label for="name" class="text-white">Search</label>
                        <button type="submit" class="btn btn-primary">Search</button>
                      </div>
                    </div>
                  </div>    
                <?= form_close()?>
                  <?= form_open('',array('id'=>'SendNotificationEmail'))?>
                  <div class="row">
                    <div class="col-sm-6">
                      <span id="inputemail"></span>
                      <label>Subject:</label>               
                        <input type="text" class="form-control" name="subject" placeholder="Enter Subject" style="height: 2.6rem;" value="Career Development Center" >
                        <!-- <label class="mt-3">Upload Image</label>
                        <input type="file" class="form-control" name="image" style="height: 2.6rem;" required> 
                        <span style="color: burlywood;">Image dimension should be(witdh:480px and Height:320px)</span>-->
                        <input type="hidden" class="form-control" id="selectuseremail" name="selectedemail">
                        <input type="hidden" class="form-control" id="selecttype" name="FilterType">
                        <input type="hidden" class="form-control" id="alluseremail" name="alluseremail">
                    </div>
                     <div class="col-sm-6">
                          <div class="form-group">
                            <label for="description">Message</label>
                             <div>
                                                    Insert Field: 
                                                    <button type="button" onclick="insertAtCaret('description','{name}')">Name</button>
                                                </div>
                            <textarea type="text" id="description" name="msg" rows="6" class="form-control" placeholder="Enter Message"></textarea>
                          </div>  
                     </div>
                    <div class="col-sm-1">
                      <button type="submit" class="btn btn-primary" id="send-email">Send</button>
                    </div> 
                 </div>
                 </div>
                <!-- /.card-body -->                   
                <?= form_close()?>
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
    window.addEventListener('load',function(){
         $('#description').summernote()
        $("#filter-form").submit(function(e){
            e.preventDefault();
            var form = $(this);
            // console.log(form.serializeArray());
            $.ajax({
                url:base_url+'GetRecord',
                type:'post',
                data: form.serializeArray(),
                success:function(response){
                    console.log(response);
                    resp = JSON.parse(response);
                    var myarray = new Array();
                    var rows = '';
                    for(i in resp){
                        
                        myarray.push(resp[i].EMAIL);
                       
                        rows += "<tr><td>"+resp[i].NAME+"</td><td>"+resp[i].EMAIL+"</td><td>"+resp[i].MOB+"</td><td>"+resp[i].ADDRESS+"</td><td>"+resp[i].GENDER+"</td><td>"+resp[i].DOB+"</td></tr>";
                    }
                    $('#setdata').html(rows);
                    $('#selectuseremail').val(myarray);
                }
            });
        })
    }, false);

      window.addEventListener('load',function(){
            $('#SendNotificationEmail').submit(function(e){
              e.preventDefault();
              var formData = new FormData(this);
              if($('#filter_type').val()=='')
              {
                message('error','Please Select Type',3000);
              }else if($('#description').val()=='')
              {
                message('error','Please Enter Message',3000);
              }else if($('#email').val()=='')
              {
                message('error','Please Enter Email',3000);
              }
              else
              {
                  $('#send-email').text('please wait...').prop('disabled', true);
                $.ajax({
                    url:base_url+'SendMessageByEmail',
                    type:'post',
                    data:formData,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    success:function(response){
                      
                      // var resp=JSON.parse(response);
                      // console.log(resp);
                      if(response == 'send email'){
                        message('success','Notification sent successfully.',3000);
                        setTimeout(function(){
                          window.location.reload();
                        }, 3000);
                      }
  
                    }
               });
              }
            })

      });

  
      function hidefilter(str,filter)
    {

        if(filter==1)
        {
            
            if(str=='DOB')
            {
              var select='<select name="input_name1" class="form-control"><option>Select Type</option><option value="G1">0 to 14</option><option value="G2">15 to 24</option><option value="G3">25 to 35</option><option value="G4">36 to 48</option><option value="G5">48+</option></select>';
              $('#inputfilter1').html(select);
              $('#input_val1').val('');
              $('#inputfilter1').show();
            }else if(str=='CUISINE')
            {
                var select='<select name="input_name1" class="form-control"><option value="">Select type</option><option value="North Indian Cuisine">North Indian Cuisine</option><option value="Punjabi Cuisine">Punjabi Cuisine</option><option value="Rajasthani cuisine">Rajasthani Cuisine</option><option value="Bengali Cuisine">Bengali Cuisine</option><option value="Tamilian Cuisine">Tamilian Cuisine</option><option value="Kerala Cuisine">Kerala Cuisine</option><option value="Andhra Pradesh Cuisine">Andhra Pradesh Cuisine</option><option value="Telangana Cuisine">Telangana Cuisine</option><option value="South Indian Cuisine">South Indian Cuisine</option></select>';
                $('#inputfilter1').html(select);
                $('#input_val1').val('');
                $('#inputfilter1').show();
            }else if(str=='DEIT')
            {
                var select='<select name="input_name1" class="form-control"><option value="">Select type</option><option value="Veg">Veg</option><option value="Veg + Egg">Veg + Egg</option><option value="Non-Veg">Non-Veg</option><option value="Vegan">Vegan</option></select>';
                $('#inputfilter1').html(select);
                $('#input_val1').val('');
                $('#inputfilter1').show();
            }else if(str=='GENDER')
            {
                var select='<select name="input_name1" class="form-control"><option value="">Select type</option><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select>';
                $('#inputfilter1').html(select);
                $('#input_val1').val('');
                $('#inputfilter1').show();
            }
            else{
                var inputbox='<input type="text" id="input_val1"  name="input_name1" class="form-control">';
                $('#inputfilter1').html(inputbox);
                $('#input_val1').attr('placeholder', 'ENTER '+str);
                $('#input_val1').val('');
                $('#inputfilter1').show();
            }

        }else if(filter==2)
        {
            if(str=='DOB')
            {
              var select='<select name="input_name2" class="form-control"><option>Select Type</option><option value="G1">0 to 14</option><option value="G2">15 to 24</option><option value="G3">25 to 35</option><option value="G4">36 to 48</option><option value="G5">48+</option></select>';
              $('#inputfilter2').html(select);
              $('#inputfilter2').show();
              $('#input_val2').val('');
            }else if(str=='CUISINE')
            {
                var select='<select name="input_name2" class="form-control"><option value="">Select type</option><option value="North Indian Cuisine">North Indian Cuisine</option><option value="Punjabi Cuisine">Punjabi Cuisine</option><option value="Rajasthani cuisine">Rajasthani Cuisine</option><option value="Bengali Cuisine">Bengali Cuisine</option><option value="Tamilian Cuisine">Tamilian Cuisine</option><option value="Kerala Cuisine">Kerala Cuisine</option><option value="Andhra Pradesh Cuisine">Andhra Pradesh Cuisine</option><option value="Telangana Cuisine">Telangana Cuisine</option><option value="South Indian Cuisine">South Indian Cuisine</option></select>';
                $('#inputfilter2').html(select);
                $('#input_val2').val('');
                $('#inputfilter2').show();
            }else if(str=='DEIT')
            {
                var select='<select name="input_name2" class="form-control"><option value="">Select type</option><option value="Veg">Veg</option><option value="Veg + Egg">Veg + Egg</option><option value="Non-Veg">Non-Veg</option><option value="Vegan">Vegan</option></select>';
                $('#inputfilter2').html(select);
                $('#input_val2').val('');
                $('#inputfilter2').show();
            }else if(str=='GENDER')
            {
                var select='<select name="input_name2" class="form-control"><option value="">Select type</option><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select>';
                $('#inputfilter2').html(select);
                $('#input_val2').val('');
                $('#inputfilter2').show();
            }
            else{
              var inputbox='<input type="text" id="input_val2"  name="input_name2" class="form-control">';
                $('#inputfilter2').html(inputbox);
                $('#inputfilter2').show();             
                $('#input_val2').attr('placeholder', 'ENTER '+str);
                $('#input_val2').val('');
            }
        }
        else if(filter==3)
        {
            if(str=='DOB')
            {
              var select='<select name="input_name3" class="form-control"><option>Select Type</option><option value="G1">0 to 14</option><option value="G2">15 to 24</option><option value="G3">25 to 35</option><option value="G4">36 to 48</option><option value="G5">48+</option></select>';
              $('#inputfilter3').html(select);
              $('#inputfilter3').show();
              $('#input_val3').val('');
            }else if(str=='CUISINE')
            {
                var select='<select name="input_name3" class="form-control"><option value="">Select type</option><option value="North Indian Cuisine">North Indian Cuisine</option><option value="Punjabi Cuisine">Punjabi Cuisine</option><option value="Rajasthani cuisine">Rajasthani Cuisine</option><option value="Bengali Cuisine">Bengali Cuisine</option><option value="Tamilian Cuisine">Tamilian Cuisine</option><option value="Kerala Cuisine">Kerala Cuisine</option><option value="Andhra Pradesh Cuisine">Andhra Pradesh Cuisine</option><option value="Telangana Cuisine">Telangana Cuisine</option><option value="South Indian Cuisine">South Indian Cuisine</option></select>';
                $('#inputfilter3').html(select);
                $('#input_val3').val('');
                $('#inputfilter3').show();
            }else if(str=='DEIT')
            {
                var select='<select name="input_name3" class="form-control"><option value="">Select type</option><option value="Veg">Veg</option><option value="Veg + Egg">Veg + Egg</option><option value="Non-Veg">Non-Veg</option><option value="Vegan">Vegan</option></select>';
                $('#inputfilter3').html(select);
                $('#input_val3').val('');
                $('#inputfilter3').show();
            }else if(str=='GENDER')
            {
                var select='<select name="input_name3" class="form-control"><option value="">Select type</option><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select>';
                $('#inputfilter3').html(select);
                $('#input_val3').val('');
                $('#inputfilter3').show();
            }
            else{
              var inputbox='<input type="text" id="input_val3"  name="input_name3" class="form-control">';
                $('#inputfilter3').html(inputbox);
                $('#inputfilter3').show();
                $('#input_val3').attr('placeholder', 'ENTER '+str);
                $('#input_val3').val('');
            }
        }
        else if(filter==4)
        {
            if(str=='DOB')
            {
              var select='<select name="input_name4" class="form-control"><option>Select Type</option><option value="G1">0 to 14</option><option value="G2">15 to 24</option><option value="G3">25 to 35</option><option value="G4">36 to 48</option><option value="G5">48+</option></select>';
              $('#inputfilter4').html(select);
              $('#inputfilter4').show();
              $('#input_val4').val('');
            }
            else if(str=='CLASS')
            {
              var select='<select name="input_name4" class="form-control"><option value="">Select type</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option></select>';
                $('#inputfilter4').html(select);
                $('#input_val4').val('');
                $('#inputfilter4').show();
            }
            else if(str=='DEIT')
            {
                var select='<select name="input_name4" class="form-control"><option value="">Select type</option><option value="Veg">Veg</option><option value="Veg + Egg">Veg + Egg</option><option value="Non-Veg">Non-Veg</option><option value="Vegan">Vegan</option></select>';
                $('#inputfilter4').html(select);
                $('#input_val4').val('');
                $('#inputfilter4').show();
            }else if(str=='GENDER')
            {
                var select='<select name="input_name4" class="form-control"><option value="">Select type</option><option value="male">Male</option><option value="female">Female</option><option value="other">Other</option></select>';
                $('#inputfilter4').html(select);
                $('#input_val4').val('');
                $('#inputfilter4').show();
            }
            else{
              var inputbox='<input type="text" id="input_val4"  name="input_name4" class="form-control">';
                $('#inputfilter4').html(inputbox);
                $('#inputfilter4').show();
                $('#input_val4').attr('placeholder', 'ENTER '+str);
                $('#input_val4').val('');
            }
        }else if(filter==5)
        {
          if(str=='All')
          {
            $.ajax({

                url:base_url+'GetAllEmail',
                type:'post',
                data:{csrf_token:csrf_value},
                success:function(response){
                    console.log(response);
                    resp = JSON.parse(response);
                    var myarray = new Array();
                    var rows = '';
                    for(i in resp){
                        
                        myarray.push(resp[i].EMAIL);
                       
                      rows += "<tr><td>"+resp[i].NAME+"</td><td>"+resp[i].EMAIL+"</td><td>"+resp[i].MOB+"</td><td>"+resp[i].CITY+"</td><td>"+resp[i].GENDER+"</td><td>"+resp[i].CUISINE+"</td><td>"+resp[i].DEIT+"</td><td>"+resp[i].DOB+"</td></tr>";
                    }
                    $('#setdata').html(rows);
                    $('#alluseremail').val(myarray);
                    $('#selecttype').val('All');
                }
            });

            $('#searchfilter').hide();
            $('#inputemail').hide();

          }else if(str=='Individual')
          {
            var inputbox1='<label for="name">Enter Email</label><input type="text" id="single_email" name="single_email" class="form-control">';
                $('#inputemail').html(inputbox1);
                $('#single_email').attr('placeholder', 'Enter Email '+str);
                $('#single_email').attr('id', 'email');
                $('#single_email').val('');
                $('#inputemail').show();
                $('#searchfilter').hide();
                $('#selecttype').val('Individual');
          }else if(str=='Selected')
          {
            $('#searchfilter').show();
            $('#inputemail').hide();
            $('#selecttype').val('Selected');
          }

        }
       
    }
    
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

 