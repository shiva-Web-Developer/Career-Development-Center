function sendUserMessage()
{
 var usermobile=$('#usermobile').val();
 var subject=$('#subject').val();
 var message=$('#summernote').val();
    $.ajax({
            url:base_url+"Name-Wise-Message",
            type:"post",
            data:{'number':usermobile,'subject':subject,'message':message,csrf_token:csrf_value},
            success:function(response){

            }
    });
}
function sendUserEmailMessage()
{
 var useremail=$('#useremail').val();
 var subject=$('#subject').val();
 var message=$('#summernote').val();
    $.ajax({
            url:base_url+"Email-Wise-Message",
            type:"post",
            data:{'email':useremail,'subject':subject,'message':message,csrf_token:csrf_value},
            success:function(response){

            }
    });
}