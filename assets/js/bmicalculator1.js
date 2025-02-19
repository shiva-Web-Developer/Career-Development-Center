function bmicalculate()
{
    
    var age=$('#age').val();
    var weight=$('#weight').val();
    var height=$('#height').val();
    var bmi = (weight/height/height)*10000;
    var bmi_total=bmi.toFixed(2);
   if(age=='')
   {
         $('#ageerror').html('*Required Field').css({"color":"red"});
        
         
   }
   else if(weight=='')
   {
      $('#ageweight').html('*Required Field').css({"color":"red"});
   }
   else if(height=='')
   {
    $('#ageheight').html('*Required Field').css({"color":"red"});
   }
   else
   {
    $.ajax({

        type: "POST",
        url: base_url + "save",
        data: {"fid":'submit-bmi',"age":age,"weight":weight,"height":height,"bmi":bmi_total,csrf_token:csrf_value}, 
        success: function(data){
        $('#fillbmi').hide();
         $('#bmiresult').show();
         if (bmi_total <= 18.5) 
         {
              var output = "UNDERWEIGHT";
              $('#fillbmi').hide();
              $('#bmiresult').show();
              $('#weight_type').html(output);
             
              $('#res').html(bmi_total);
         }
         else if(bmi_total > 18.5 && bmi_total<=24.9)
         {
              var output = "NORMAL WEIGHT";
              $('#fillbmi').hide();
              $('#bmiresult').show();
              $('#weight_type').html(output);
              $('#res').html(bmi_total);
         }
         else if (bmi_total > 24.9 && bmi_total<=29.9) 
         {
              var output = "OVERWEIGHT";
              $('#fillbmi').hide();
              $('#bmiresult').show();
              $('#weight_type').html(output);
              $('#res').html(bmi_total);
          }
          else if (bmi_total > 30.0) 
          {
              var output = "OBESE";
              $('#fillbmi').hide();
              $('#bmiresult').show();
              $('#weight_type').html(output);
              $('#res').html(bmi_total);
          }
        }
    });
   }

}
function bmi_age()
{

    var age=$('#age').val();
    if(age=='')
    {
        $('#ageerror').html('*Required Field').css({"color":"red"});  
    }
    else{
        $('#ageerror').html('');
    }
}
function bmi_weight()
{
    var weight=$('#weight').val();
    if(weight=='')
    {
        $('#ageweight').html('*Required Field').css({"color":"red"});
    }
    else{
        $('#ageweight').html('');
    }
}
function bmi_height()
{
    var height=$('#height').val();
    if(height=='')
    {
        $('#ageheight').html('');
    }
    else{
        
    }
}

function checkdietplan()
{
    
    var bmi_total=$('#bmi').val();
    var weight_type=$('#weight_type').val();
    if(bmi_total=='')
    {
          $('#bmierror').html('*Required Field').css({"color":"red"});
         
    }
    $.ajax({
                
        type: "POST",
        url: base_url + "checkbmi",
        data: {"bmi_total":bmi_total,csrf_token:csrf_value}, 
        success: function(data){
            if(data=='not found')
            {
            av_alert('','This BMI is Not Found Please Calculate BMI','error');
            
            }
            else
            {
                $('#bm').hide();
                $('#dietplan').show();
                $.ajax({
                    type: "POST",
                    url: base_url + "checkdietplan",
                    data: {"weight_type":weight_type,csrf_token:csrf_value}, 
                    success: function(datas){
                        $('.points-tbl').html(datas);
                    }
                });

            }
        }
       });

}
function deitplanshow()
{   var bmi=$('#bmi').val();
    var weight_type=$('#weight_type').val();
    
    if(bmi=='')
    {
        $('#bmierror').html('*Required Field').css({"color":"red"});
        
    }else{
        $('#loading').show();
        $.ajax({
            type: "POST",
            url: base_url + "diet-plan",
            data: {"weight_type":weight_type,'bmi_value':bmi,csrf_token:csrf_value}, 
            success: function(datas){
                    el_boxBody.html(datas);
                    openDialogBox();
                    setTimeout(function() {$('#loading').hide();});
            }
        });
    }

}
function bmi_value()
{
    var bmi_total=$('#bmi').val();
    if(bmi_total=='')
    {
        $('#bmierror').html('*Required Field').css({"color":"red"});
        $('#weight_type').val('');
        $('#dt').hide();  
    }
    else
    {
            $('#bmierror').html('');
            if (bmi_total <= 18.5) 
            {
                var output = "UNDERWEIGHT";
                $('#weight_type').val(output);
                $('#weighttype').html(output);
            }  
            else if(bmi_total > 18.5 && bmi_total<=24.9)
            {
                var output = "NORMAL WEIGHT";
                $('#weight_type').val(output);
                $('#weighttype').html(output);
            }
            else if (bmi_total > 24.9 && bmi_total<=29.9) 
            {
                var output = "OVERWEIGHT";
                $('#weight_type').val(output);
                $('#weighttype').html(output);
            }
            else if (bmi_total > 30.0) 
            {
                var output = "OBESE";
                $('#weight_type').val(output);
                $('#weighttype').html(output);
                
            }
            $.ajax({
                
                type: "POST",
                url: base_url + "checkbmi",
                data: {"bmi_total":bmi_total,csrf_token:csrf_value}, 
                success: function(data){
                   if(data!=='not found')
                   {
                    // $('#date').val(data);
                    $('#dt').show(); 
                   }
                }
               });
    }


}
