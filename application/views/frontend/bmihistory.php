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
</style>
<main class="main">
<svg style="margin-left: 19px;margin-top: 9px;" class="svg-inline--fa fa-arrow-left" onclick="location.href = 'profile'; return false;" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="arrow-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"></path></svg>
    <section class="main-container">
        
    <div id="bmi-icon" class="page-link">     
                    <img src="<?php echo base_url()?>assets/icon/bmicalc.png">
                    <span>BMI<br>History</span>
                </div>
    <div style="width:98vw;height:48vh;overflow:auto;" class="mt-3">
        <table class="points-tbl">
            <thead>
                <tr>
                    <th>#</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Age</th>
                    <th class="text-center">Weight</th>
                    <th class="text-center">Height</th>
                    <th class="text-center">BMI Result</th>
                    <th class="text-center">Date</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i = 0;
                foreach($bmi as $row){ $i++;?>
                    <tr id="list<?php echo $row['b_id']?>">
                        <td><?php echo $i; ?></td>
                        <td><?php  echo $row['NAME']?></td>
                        <td><?php  echo $row['age']?></td>
                        <td><?php  echo $row['weight']?></td>
                        <td><?php  echo $row['height']?></td>
                        <td class="text-center"> <?php
                            if($row['bmi_result']> 18.5 && $row['bmi_result']<=24.9)
                            {
                                ?>
                                <small class="badge badge-success"><?php echo $row['bmi_result']?></small>
                                <?php
                            }else{
                                ?>
                                <small class="badge badge-danger"><?php echo $row['bmi_result']?></small>
                                <?php
                            }
                            ?></td>
                        <td><?php echo date('Y-m-d', strtotime($row['dates']))?></td>
                        <td><i class="fa fa-trash text-center" aria-hidden="true" onclick="deletebmi(<?php echo $row['b_id']?>)"></i></td>
                    </tr>
                <?php
                }
            ?>
            </tbody>
        </table>
    </div>
    </section>
</main>
<script>
    function deletebmi(id)
{
    $.ajax({
                type: "POST",
                url: base_url + "single-bmi-delete",
                data: {"bmi_id":id,csrf_token:csrf_value}, 
                success: function(data){
                    $('#list'+id).remove();
                    av_alert('',data,'success','fa fa-said');
                   
                }
               });
}
</script>