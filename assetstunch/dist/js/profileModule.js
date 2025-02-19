function UpdateProfile()
{
    var id=$('#id').val();
    var name=$('#name').val();
    var email=$('#email').val();
    var mobile=$('#mobile').val();
    var dob=$('#dob').val();
    var conditions=$('#conditions').val();
    $.ajax({
        url:base_url+"Profile-Update",
        type:"post",
        data:{'name':name,'email':email,'mobile':mobile,'dob':dob,'id':id,csrf_token:csrf_value},
        success:function(response){
            if(response==1)
            {
                message('success','Record has been Updated Successfully',1500);
                redirectURL('Profile',1500);
            }else if(response==2)
            {
                message('error','Record has been Not Updated Successfully',3000);
                redirectURL('Profile',3000);
            }
        }
});
}
imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah.src = URL.createObjectURL(file)
    }
  }