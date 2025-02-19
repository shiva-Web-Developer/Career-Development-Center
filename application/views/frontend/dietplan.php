<style>

#cla
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
.points-tbl td, .points-tbl th {
    border-right: 1px solid #d3b0b0;
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
    #weighttype
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
<script src="<?= base_url() ?>assets/js/bmicalculator1.js"></script>
<div id="loading">
  <img id="loading-image" src="<?php echo base_url()?>assets/img/loder.gif" style="height: 100px;margin-top: 20rem;"alt="Loading..." />
</div>
<div class="container" id="bm">
   <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="cla">
        <svg class="svg-inline--fa fa-arrow-left" onclick="location.href = 'welcome'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
            <div class="flex flex-content-center my-3">
              <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/diet1.jpg">
                    <span>Diet Plan</span>
                </div>
            </div>
            <form>
                <div class="form-group">
                    <label for="bmi">Enter BMI </label>
                    <input type="number" id="bmi" placeholder="Enter your BMI" onkeyup="bmi_value()">
                    <span id="bmierror"></span>
               </div>
                
                <div class="form-group">
                    <label for="weight_type">Weight</label>
                    <input type="text" id="weight_type" placeholder="Type of Weight" readonly>
                   
                </div>
                <!-- <div class="form-group" id="dt" style="display:none">
                    <label for="date">Your BMI Calculate On This Date</label>
                    <input type="text" id="date" readonly>
                   
                </div> -->
                <div class="form-group">
                <a  href="BMI-Calculator" class="btn btn-primary mr-5 text-light">Calculate BMI</a>
                <button type="button" class="btn btn-primary ml-5" onclick="deitplanshow()">Check Diet Plan</button>
               
                </div>
            </form>

        </div>
        <div class="col-sm-4"></div>
    </div>
</div>

<main class="main" style="display:none" id="dietplan">
    <section class="main-container">
    <svg class="svg-inline--fa fa-arrow-left"style="margin-right: 308px;" onclick="location.href = 'Diet-Plan'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
    <div class="flex flex-content-center my-3">
                <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/diet.png">
                    <span>Diet Plan</span>
                </div>
               
             </div>
        
        <table class="points-tbl">
          <span id="weighttype"></span>
        </table>
    </section>
</main>
<script>
      function getAccurate()
{
    av_alert('Request Submitted','We have receievd your request. Our expert will connect with you shortly.','success','fa fa-smile');
}
</script>



