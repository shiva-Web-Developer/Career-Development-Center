<style>
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
    .result-tbl tr{
        border-top: 1px solid #eaeaea;
        border-bottom: 1px solid #eaeaea;
    }
    .result-tbl tr:nth-child(even) {
        background-color: #eaeaea;
    }
    .result-tbl td,.result-tbl th{
        padding: 0.4rem 0.6rem;
        font-size: 0.7rem;
        line-height: 1.2;
    }
    table.result-tbl{
        width: 95%;
        background: var(--grey);
        margin: 0.5rem;
        border-radius: 8px;
    }
    table.result-tbl thead{
        color: black;
        font-weight: bold;
        font-size: 1rem;
    }
    table.result-tbl tbody{
        background-color: white;
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
    }
    .result-tbl td, .result-tbl th {
        border-right: 1px solid #d3b0b0;
    }
    .card {
        
        background-color: #eee; 
        background-clip: border-box;
        border: 0px solid rgba(0,0,0,.125);
    
    }
</style>

<main class="main">
    <section class="main-container">
    <svg class="svg-inline--fa fa-arrow-left"style="margin-right: 308px;" onclick="location.href = 'test'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
         <div class="flex flex-content-center my-3">
           <div id="bmi-icon">     
                    <img src="<?php echo base_url()?>assets/icon/results.png">
                    <span>Results</span>
             </div>
          </div>
        </div>
        <table class="result-tbl">
            <thead>
                <tr>
                  <th>Name Of Disease</th>
                    <th>Suggested Test</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 foreach($gettestname as $row)
                 {
                    ?>
                    <tr>
                        <td><?php echo $row->diseases_name;?></td>
                        <td><?php echo $row->test_name;?></td> 
                    </tr>
                    <?php
                 }
                ?>
            </tbody>
        </table>
        <div class="flex space-between flex-row col-sm-12 mt-2">
            <button onclick="location.href = 'commingsoon'; return false;" class="btn btn-outline-light "style="background-color: var(--primary-color);">Nearby Labs</button>
            <button type="button" class="btn btn-outline-light"style="background-color: var(--primary-color);" onclick="AccurateTestMail(<?php echo $_SESSION['UID']?>)">More Accurate</button>
        </div>
                    
     </div>
 </div>
    </section>
</main>
<script>
function AccurateTestMail(user_id){
  $.ajax({
        url:base_url+"getdatabmi",
        type:'POST',
        data:{'fid':'Get-Bmi-data','tbl':'bmicalculater','id':user_id,csrf_token:csrf_value},
        success:function(response){
            av_alert('',response, 'success');
        }
    });
}

</script>