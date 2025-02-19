<style>

    #cla
    {
        background-color: white;
        border-radius: 17px 19px 21px 26px;
        line-height: 27px;
        box-shadow: 0 0 4px #58119b;
    }

    input[type=number] {
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
        background-color: white;
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
        font-size: 18px;
        text-align: center;
        width: 100%;
        display: block;
    }
    h2
    {
        font-weight: 900;
        text-align: center;
    }
    #res{
        display: grid;
        font-weight: 900;
        font-size: 25px;
        margin:7px;
    }
.points-tbl tr{
        border-top: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
    }
    .points-tbl tr:nth-child(even) {
        background-color: #eaeaea;
    }
    .points-tbl td,.points-tbl th{
        padding: 0.4rem 0.6rem;
        font-size: 0.6rem;
    }
    table.points-tbl{
        width: 95%;
        background: var(--grey);
        margin: 0.5rem;
        border-radius: 8px;
    }
    table.points-tbl thead{
        color: black;
        font-weight: bold;
        font-size: 1rem;
    }
    table.points-tbl tbody{
        background-color: white;
    }
    #weighttypename
    {
    font-weight: bolder;
    background: var(--primary-color);
    color: white;
    padding: 4px 12px;
    border-radius: 4px;
    }
    #loading 
    {
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
</style>
<script src="<?= base_url() ?>assets/js/bmicalculator.js"></script>
<?php 
$age=$_SESSION['AGE'];
$date1=date_create(date('Y-m-d'));
$date2=date_create($age);
$diff=date_diff($date1,$date2);
$days = (int)$diff->format("%a");
$year= round($days/365.25);
?>
<div id="loading">
  <img id="loading-image" src="<?php echo base_url()?>assets/img/loder.gif" style="height: 100px;margin-top: 20rem;"alt="Loading..." />
</div>
<div class="container" id="fillbmi">
   <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="cla">
        <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
            <div class="flex flex-content-center my-3">
                <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/bmicalc1.png" >
                    <span>BMI<br>Calculator</span>
                </div>
            </div>
            <form>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" id="age" value="<?php echo $year;?>" placeholder="Enter your age in year" onkeyup="bmi_age()">
                    <span id="ageerror"></span>
            </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="number" id="weight"  placeholder="Enter your weight in kg" onkeyup="bmi_weight()">
                    <span id="ageweight"></span>
                </div>
                <div class="form-group">
                    <label for="height">Height</label>
                    <input type="number" id="height" placeholder="Enter your height in cm" onkeyup="bmi_height()">
                    <span id="ageheight"></span>
            </div>
                <div class="form-group">
                <button type="button" class="btn btn-primary btn-block" onclick="bmicalculate()">Calculate</button>
                </div>
            </form>

        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<div class="container" id="bmiresult" style="display:none">
   <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="cla">
        <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
            <div class="flex flex-content-center my-5">
                <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/bmicalc.png" >
                    <span>BMI<br>Calculator</span>
                </div>
            </div>
                  <span id="result">Your BMI is:<span id="res"></span></span>
                <div class="text-center" style="font-size: 21px;font-family: math;">You Are</div>
                  <h2 id="weight_type" class="mt-1"></h2>
                <div class="form-group mt-3">
                <button class="btn btn-primary btn-block text-light" onclick="DietPlan()">Know your diet plan</button>
                </div>
           
        </div>
        <div class="col-sm-4"></div>
    </div>
</div>
<main class="main" style="display:none" id="dietplan">
    <section class="main-container">
    <svg class="svg-inline--fa fa-arrow-left"style="margin-right: 308px;" onclick="location.href = 'BMI-Calculator'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
    <div class="flex flex-content-center my-3">
        <div id="bmi-icon">     
            <img src="<?php echo base_url()?>assets/icon/diet1.jpg">
            <span>Diet Plan</span>
        </div>
                
     </div> 
        <table class="points-tbl">
          <span id="weighttypename"></span>
        </table>
    </section>
</main>
<script>

function DietPlan()
    {
        var weighttype=$('#weight_type').text();
        var bmi=$('#res').text();
        var userAge=$('#age').val();
        var userWeight=$('#weight').val();
        var userHeight=$('#height').val();
        $('#weighttypename').html(weighttype);
        $('#loading').show();
        $.ajax({
                    type: "POST",
                    url: base_url + "checkdietplan",
                    data: {"weight_type":weighttype,'age':userAge,'height':userHeight,'weight':userWeight,'bmiresult':bmi,csrf_token:csrf_value}, 
                    success: function(datas){
                        el_boxBody.html(datas);
                        openDialogBox();
                        setTimeout(function() {$('#loading').hide();});
                        // $('.points-tbl').html(datas);
                        // $('#fillbmi').hide();
                        // $('#bmiresult').hide();
                        // $('#dietplan').show();
                    }
                });

    }
    function getAccurate()
{
    av_alert('Request Submitted','We have receievd your request. Our expert will connect with you shortly.','success','fa fa-smile');
}
</script>

