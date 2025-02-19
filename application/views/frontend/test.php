<style>
#cla
{
    background-color: white;
    border-radius: 17px 19px 21px 26px;
    line-height: 27px;
    box-shadow: 0 0 4px #58119b;
}
#nextscreen1
{
    background-color: white;
    border-radius: 17px 19px 21px 26px;
    line-height: 27px;
    box-shadow: 0 0 4px #58119b;
}
#nextscreen2
{
    background-color: white;
    border-radius: 17px 19px 21px 26px;
    line-height: 27px;
    box-shadow: 0 0 4px #58119b;
}
#nextscreen3
{
    background-color: white;
    border-radius: 17px 19px 21px 26px;
    line-height: 27px;
    box-shadow: 0 0 4px #58119b;
}
#nextscreen4
{
    background-color: white;
    border-radius: 17px 19px 21px 26px;
    line-height: 27px;
    box-shadow: 0 0 4px #58119b;
}

input[type=text] {
    width:100%;
    padding: 14px 10px;
    outline: 0;
    margin: 1px 0;
    box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #d6cccc;
}
#bmi-icon{
    border-radius: 50%;
    box-shadow: 0 0 6px #58119b;
    height: 120px;
    width: 120px;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
#bmi-icon img{
    width: 60px;
    height: auto;
}
#bmi-icon span{
    text-align: center;
    line-height: 1.2;
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
#home-search{
        width: 100%;
        margin-top: 0.6rem;
    }
 #home_search
 {
     width: 97%;
     padding: 0.6rem 0.8rem;
     border-radius: 30px;
     border: 0;
     box-shadow: 0 0 6px grey;
     outline: 0;
    }
  .rounded-circle
  {
    padding: 0;
    width: 40px;
    height: 40px;
    justify-content: center;
    align-items: center;
  }
  #other
  {
    width: 100%;
    padding: 12px 7px;
    outline: 0;
    box-sizing: border-box;
    border-radius: 5px;
    border-top: 1px solid #c7c7c7;
    border-right: 1px solid #c7c7c7;
    border-left: 1px solid #c7c7c7;
    border-bottom: 1px solid #c7c7c7;
  }
  .test{

    padding: 7px 10px!important;
    border-top: 1px solid #c7c7c7!important;
    border-right: 1px solid #c7c7c7!important;
    border-left: 1px solid #c7c7c7!important;
    border-bottom: 1px solid #c7c7c7!important;
}
.due{

padding: 0px 18px!important;
border-top: 1px solid #c7c7c7!important;
border-right: 1px solid #c7c7c7!important;
border-left: 1px solid #c7c7c7!important;
border-bottom: 1px solid #c7c7c7!important;
}
select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 4px)!important;
}
#loading {
  position: fixed;
  display: none;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-align: center;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}

#loading-image {
    position: absolute;
    top: 249px;
    left: 143px;
    z-index: 100;
}
#jconfirm-box42834
{
    height: 37rem!important;
}
.my-3 {
    margin-bottom: 0.5rem !important;
}
label{
    font-size: 13px;
}

</style>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
  if($this->session->flashdata('success'))
  {
    $msg=$this->session->flashdata('success');
    echo "<script>swal('Success', '$msg', 'success');</script>";
  }
?>
<?php
$message=array(
    "Accurate symptoms lead to accurate results",
    "Listen to your body: Symptoms speak volumes.",
    "Early diagnosis, brighter tomorrows.",
    "Know the signs, take control.",
    "Symptoms are clues, don't disregard the news.",
    "Catch it early, treat it swiftly.",
    "Your health, your responsibility",
    "Prevention starts with recognition",
    "Stay in tune with your body, catch diseases off guard.",
    "Ignorance is a silent enemy; awareness is your shield.",
    "Be proactive: early diagnosis, better prognosis.",
    "Detect, diagnose, conquer",
    "Health awareness: the first line of defence.",
    "Symptoms are messengers; listen and act.",
    "Early detection paves the path to recovery",
    "Knowledge is power when it comes to your health.",
    "Ignorance is costly; awareness is priceless.",
    "Stay vigilant, stay healthy",
    "Be proactive, stay ahead of the game.",
    "Early diagnosis: the key to effective treatment.",
    "Your health is worth the awareness.",
    "Detect, prevent, thrive.",
    "Symptoms are warning flags; pay attention.",
    "Take charge of your well-being.",
    "Don't ignore the signs, uncover the truth.",
    "Health knowledge is a superpower.",
    "Empower yourself with health awareness."
);

?>
<div id="loading">
  <img id="loading-image" src="<?php echo base_url()?>assets/img/loder.gif" style="height: 100px;"alt="Loading..." />
</div>
<div class="container" id="fillbmi">
   <div class="row">
     <div class="col-sm-4"></div>
         <div class="col-sm-4" id="cla">
             <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                <div class="flex flex-content-center my-2">
                    <div id="bmi-icon">     
                        <img src="<?php echo base_url()?>assets/icon/Eyedrop.png" >
                        <span>Know Your<br> Test</span>
                    </div>
                </div>
                <?php 
                    foreach($result as $row){
                        $date1=date_create(date('Y-m-d'));
                        $date2=date_create($row['DOB']);
                        $diff=date_diff($date1,$date2);
                        $days = (int)$diff->format("%a");
                        $year= round($days/365.25);
                       
                    ?>
            
                    <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?php echo $row['NAME'];?>" placeholder="Enter your Name">
                            <input type="text" id="userid" name="id" value="<?php echo $_SESSION['UID'];?>" placeholder="Enter your Name" hidden>
                    </div>
                    <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" id="age" name="age" value="<?php echo $year;?>" placeholder="Enter your age in year">
                    </div>
                    <div class="form-group">
                            <label for="male">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Transgender">Transgender</option>

                            </select>     
                    </div>
                    <div class="form-group">
                            <label for="ethnicity">Ethnicity</label>
                            <select name="ethnicity" id="ethnicity" class="form-control">
                                <option value="Asian">Asian</option>
                                <option value="Black">Black</option>
                                <option value="American">American</option>
                                <option value="Caucasian">Caucasian</option>

                            </select>
                          
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-primary btn-block" onclick="nextstep()">Continue</button>
                    </div>
                    <?php
                }
                    
                ?>
         </div>
<!----------------------------------------------------------------------------------------------------------------->
            <div class="col-sm-4" id="nextscreen1" style="display:none">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'test'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                    <div class="flex flex-content-center my-3">
                        <div id="bmi-icon">     
                            <img src="<?php echo base_url()?>assets/icon/symptoms.png">
                            <span>Symptoms</span>
                        </div>
                    
                    </div>
                    <?php
                   shuffle($message);
                    echo '<div class="pb-3 text-center" style="font-style: italic;font-size: 11px;color: #58119b;">'.$message[0].'
                    </div>';
                    ?>
                    <div class="row pb-2">
                       
                        <div class="col-6">
                             <label>Symptoms</label>
                               <input list="symptom" class="form-control" id="symptom_name" name="ice-cream-choice" placeholder="Search Here..">
                                <datalist id="symptom">
                                    <?php
                                      foreach($symptoms as $index=>$symp) { ?>
                                            <option value="<?php echo $symp['symptoms_type'];?>"><?php echo $symp['symptoms_type'];?>
                                            </option> 
                                    <?php } ?>
                                </datalist>
                            </div>
                            <div class="col-6">
                                 <lable for="severity">Severity</label>
                                    <select id="severity" class="form-control">
                                        <option value="mild">Mild</option>
                                        <option value="moderate">Moderate</option>
                                        <option value="severe">Severe</option>
                                </select>
                            </div>
                    </div>
                    <div class="row pb-2">   
                        <div class="col-12">
                        <label for="duration">Duration</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <select name="duration" id="duration" class="form-control due">
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                                <input type="number"  id="day" class="form-control due" placeholder="Enter a duration" name="duration" required>
                            </div>                          
                        </div>         
                     </div>
                    <div class="form-group">
                        <button type="button" id="subbtn" class="btn btn-primary btn-block" onclick="addsymptoms()">Add</button>    
                    </div>
                    <div class="form-group" style="display:none" id="nextstepscreen1">
                        <button type="button" class="btn btn-primary btn-block" id="screenshow2" onclick="screenshow_2()">Next</button>               
                    </div>   
                </div>
<!------------------------------------------------------------------------------------------------------------------->
            <div class="col-sm-4" id="nextscreen2" style="display:none">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'test'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                    <div class="flex flex-content-center my-3">
                        <div id="bmi-icon">     
                            <img src="<?php echo base_url()?>assets/icon/symptoms.png">
                            <span>Symptoms</span>
                        </div>
                    
                    </div>
                    <?php
                   shuffle($message);
                    echo '<div class="pb-3 text-center" style="font-style: italic;font-size: 11px;color: #58119b;">'.$message[0].'
                    </div>';
                    ?>
                    <div class="row pb-2">
                       
                            <div class="col-6">
                                <label>Known Medical Conditions</label>
                                 <input list="diseases" class="form-control" id="diseases_name" name="ice-cream-choice" placeholder="Search Here..">
                                <datalist id="diseases">
                                    <?php
                                      foreach($diseases as $index=>$dise) { ?>
                                            <option value="<?php echo $dise['common_health_condition'];?>"><?php echo $dise['common_health_condition'];?></option> 
                                            </option> 
                                    <?php } ?>
                                </datalist>
                            </div>
                            <div class="col-6">
                                 <lable for="controlstatus">Control status</label>
                                    <select id="controlstatus" class="form-control">
                                        <option value="Don’t know">Don’t know</option>
                                        <option value="Well Controlled">Well Controlled</option>
                                        <option value="Poorly Controlled">Poorly Controlled</option>
                                </select>
                            </div>
                    </div>
                    <div class="row pb-2">   
                        <div class="col-12">
                        <label for="durationdisease">Duration</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <select  id="durationdisease" class="form-control due">
                                        <option value="days">Days</option>
                                        <option value="weeks">Weeks</option>
                                        <option value="months">Months</option>
                                        <option value="years">Years</option>
                                    </select>
                                </div>
                                <input type="number"  id="daydisease" class="form-control due" placeholder="Enter a duration" required>
                            </div>                          
                        </div>         
                     </div>
                    <div class="form-group">
                        <button type="button" id="subbtn" class="btn btn-primary btn-block" onclick="adddisease()">Add</button>    
                    </div>
                    <div class="form-group" style="display:none" id="nextstepscreen2">
                        <button type="button" class="btn btn-primary btn-block" onclick="screenshow_3()">Next</button>               
                    </div>   
                </div>
<!------------------------------------------------------------------------------------------------------->
            <div class="col-sm-4" id="nextscreen3" style="display:none">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'test'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                    <div class="flex flex-content-center my-3">
                        <div id="bmi-icon">     
                            <img src="<?php echo base_url()?>assets/icon/symptoms.png">
                            <span>Symptoms</span>
                        </div>
                    
                    </div>
                    <?php
                   shuffle($message);
                    echo '<div class="pb-3 text-center" style="font-style: italic;font-size: 11px;color: #58119b;">'.$message[0].'
                    </div>';
                    ?>
                    <div class="row pb-2">
                            <div class="col-12">
                                 <lable for="controlstatus">Any additional information - (Optional)</label>
                                  <textarea name="" id="info" placeholder="Enter a message" onkeyup="additionalinformation()" class="form-control" cols="20" rows="3"></textarea>
                            </div>
                    </div>
                  
                    <div class="form-group">
                        <button type="button" id="subbtn" class="btn btn-primary btn-block" onclick="screenshow_4()">Add</button>    
                    </div>
                     
                </div>

<!------------------------------------------------------------------------------------------------------->
            <div class="col-sm-4" id="nextscreen4" style="display:none">
                <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'test'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
                    <div class="flex flex-content-center my-3">
                        <div id="bmi-icon">     
                            <img src="<?php echo base_url()?>assets/icon/symptoms.png">
                            <span>Symptoms</span>
                        </div>
                    
                    </div>
                    <?php
                   shuffle($message);
                    echo '<div class="pb-3 text-center" style="font-style: italic;font-size: 11px;color: #58119b;">'.$message[0].'
                    </div>';
                    ?>
                    <div class="row pb-2">
                            <div class="col-12">
                            <div style="width:98vw;height:40vh;overflow:auto;">
                                <table class="points-tbl" id="usersummary" style="display:none">
                                        <thead>
                                        <tr>
                                            <th>Age:</th>
                                                <td id="f_age"></td>
                                            </tr>
                                            <tr>
                                                <th>Gender:</th>
                                                <td id="f_gender"></td>
                                            </tr>
                                            <tr>
                                                <th>Ethnicity:</th>
                                                <td id="f_ethnicity"></td>
                                            </tr>
                                        </thead>
                                         <thead>
                                            <tr> 
                                                <th class="text-center">Symptom</th>
                                                <th class="text-center">Duration</th>
                                                <th class="text-center">Intensity</th>
                                                <th class="text-center">Action</th>
                                            </tr>   
                                        </thead>
                                        <tbody id="finalsymptom">
                                        
                                      </tbody>
                                      <thead>
                                            <tr> 
                                                <th class="text-center">Medical Conditions</th>
                                                <th class="text-center">Duration</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>   
                                        </thead>
                                        <tbody id="finaldisease">
                                        
                                      </tbody>
                                      <thead>
                                        <tr>
                                            <th>Additional Information (Optional):</th>
                                                <td id="fadditional">None</td>
                                            </tr> 
                                        </thead>
                                </table>
                             </div>
                            </div>
                        </div>
                    <div class="col-6 float-right form-group">
                        <button type="button" style="font-size: 13px;" id="subbtn" class="btn btn-primary btn-block" onclick="viewsymptoms()">Confirm and Submit</button>    
                            
                    </div>
                    <div class="form-group col-6">
                        
                        <button type="button" style="font-size: 13px;"  class="btn btn-primary btn-block" onclick="back_and_edit()">Go back and Edit</button>    
                    </div>
                     
                </div>

<!------------------------------------------------------------------------------------------------------->
        <div class="col-sm-4">
       </div>
    </div>
</div>
<div style="width:98vw;height:20vh;overflow:auto;">
    <table class="points-tbl" style="display:none" id="symptomtbl">
            <thead>
                <tr>
                    
                    <th class="text-center">Symptoms</th>
                    <th class="text-center">Duration</th>
                    <th class="text-center">Severity</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="showsymptom">
                        
            </tbody>
    </table>


    <table class="points-tbl" id="diseasetbl" style="display:none">
            <thead>
                <tr>
                    
                    <th class="text-center">Known Medical Conditions</th>
                    <th class="text-center">Duration</th>
                    <th class="text-center">Control status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="showdisease">
                        
            </tbody>
    </table>
</div>
<script>
function nextstep()
{
        $('#cla').hide();
        $('#nextscreen1').show();
        $('#f_age').text($('#age').val());
        $('#f_gender').text($('#gender').val());
        $('#f_ethnicity').text($('#ethnicity').val());   
}
function screenshow_2(next)
{
    $('#nextscreen1').hide();
    $('.points-tbl').hide();
    $('#nextscreen2').show();
     if(next=='next')
     {
        $('#diseasetbl').show();
     }
}
function screenshow_3()
{
    $('#nextscreen1').hide();
    $('.points-tbl').hide();
    $('#nextscreen2').hide();
    $('#nextscreen3').show();
    
}
function screenshow_4()
{
    $('#nextscreen1').hide();
    $('#usersummary').show();
    $('#nextscreen2').hide();
    $('#nextscreen3').hide();
    $('#nextscreen4').show();
    $("#usersummary tr th").css({
      'backgroundColor': '#58119b',
      'color': 'white'
    });
}
function additionalinformation()
{
   $('#fadditional').text($('#info').val());
}
var itemofarrays = [];
function addsymptoms(){
    var  symptom_name = $('#symptom_name').val();
    var  duration = $('#duration').val();
    var day = $('#day').val(); 
    var severity = $('#severity').val(); 
    if(symptom_name=='')
    {
        av_alert('','Symptoms must be filled out','success','fa fa-said');
    }
    else if(day==''){
        av_alert('','Please filled a duration and then proceed.','success','fa fa-said');
    }
    else
    {
        // $("#subbtn").attr("onclick","viewsymptoms()");
        itemofarrays.push({'name':symptom_name,'days':day,'duration':duration,'severity':severity,});
        // console.log(itemofarrays);
        showSelection();
        $('#day').val('').focus();
        $('#symptom_name').val('').focus();
        $('.points-tbl').show();
        $('#diseasetbl').hide();
        $('#nextstepscreen1').show();
        
    }
   
}
function showSelection(){
    
    rows = "";
    for(i in itemofarrays){
        rows += '<tr id="list'+i+'">';
        rows += '<td class="text-center">'+itemofarrays[i].name+'</td><td class="text-center">'+itemofarrays[i].days+"&nbsp;"+itemofarrays[i].duration+'</td><td class="text-center">'+itemofarrays[i].severity+'</td><td class="text-center"><i class="fa fa-trash" aria-hidden="true" onclick="deletearraysymptoms('+i+')"></i></td>'
        rows += '</tr>';
    }
    $('#showsymptom').html(rows);
    $('#finalsymptom').html(rows);
}
function deletearraysymptoms(indx)
{
    itemofarrays.splice(indx, 1);
    showSelection();
}
///////////////////////////////////////////////////--disease function--//////////////////////////////////////////////////////////////
var itemofarraysdisease = [];
function adddisease(){
    var  diseases_name = $('#diseases_name').val();
    var  durationdisease = $('#durationdisease').val();
    var daydisease = $('#daydisease').val(); 
    var controlstatus = $('#controlstatus').val(); 
    if(diseases_name=='')
    {
        av_alert('','Disease must be filled out','success','fa fa-said');
    }
    else if(daydisease==''){
        av_alert('','Please filled a duration and then proceed.','success','fa fa-said');
    }
    else
    {
        // $("#subbtn").attr("onclick","viewsymptoms()");
        itemofarraysdisease.push({'name':diseases_name,'days':daydisease,'durationdisease':durationdisease,'controlstatus':controlstatus,});
        // console.log(itemofarrays);
        showSelectiondisease();
        $('#daydisease').val('').focus();
        $('#diseases_name').val('').focus();
        $('.points-tbl').hide();
        $('#diseasetbl').show();
        $('#nextstepscreen2').show();
        
    }
   
}
function showSelectiondisease(){
    rows = "";
    for(i in itemofarraysdisease){
        rows += '<tr id="list'+i+'">';
        rows += '<td class="text-center">'+itemofarraysdisease[i].name+'</td><td class="text-center">'+itemofarraysdisease[i].days+"&nbsp;"+itemofarraysdisease[i].durationdisease+'</td><td class="text-center">'+itemofarraysdisease[i].controlstatus+'</td><td class="text-center"><i class="fa fa-trash" aria-hidden="true" onclick="deletearraydisease('+i+')"></i></td>'
        rows += '</tr>';
    }
   
    $('#showdisease').html(rows);
    $('#finaldisease').html(rows);
}
function deletearraydisease(indx)
{
    itemofarraysdisease.splice(indx, 1);
    showSelectiondisease();
}
function viewsymptoms()
{
    $name=$('#name').val();
    $age=$('#age').val();
    $user_id=$('#userid').val();
    $gender=$('#gender').val();
    $days=$('#day').val();
    $ethnicity=$('#ethnicity').val();
    $('#loading').show();
    $.ajax({
    url:base_url+"saveTestRecord",
    type:'POST',
    data:{'symptomdata':itemofarrays,'diseasedata':itemofarraysdisease,'username':$name,'userage':$age,'userid':$user_id,'usergender':$gender,'ethnicity':$ethnicity,csrf_token:csrf_value},
    success:function(response)
    {
        el_boxBody.html(response);
        openDialogBox();
        $('#list').remove();
        $('#subbtn').removeAttr('onclick');
        setTimeout(function() {$('#loading').hide();});
        itemofarrays = []; 
    }

  }); 
}
function back_and_edit()
{
    $('#nextscreen1').show();
    $('#usersummary').hide();
    $('#nextscreen2').hide();
    $('#nextscreen3').hide();
    $('#nextscreen4').hide();
    $('#diseasetbl').hide();
    $('#symptomtbl').show();
    $("#screenshow2").attr("onclick","screenshow_2('next')");
}
function getAccurate()
{
    av_alert('Request Submitted','We have receievd your request. Our expert will connect with you shortly.','success','fa fa-smile');
}

</script>


