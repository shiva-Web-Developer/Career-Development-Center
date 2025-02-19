function recordDelete(tblName,whereName,id)
{
    
    if(tblName!=='')
    {
        Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
             
            $.ajax({
                    url:base_url+'delete-Record',
                    type:'post',
                    data:{"tbl":tblName,"where":whereName,"id":id,csrf_token:csrf_value},
                    success:function(response)
                    {
                        message('success','Record has been Deleted Successfully',3000);
                        $('#del'+id).remove();
                    }
                    });
            }
            })
    }
   
}