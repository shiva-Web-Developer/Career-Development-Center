
  function deleteModule(tblName,whereName,id)
  {
    recordDelete(tblName,whereName,id);
  }
  function viewUser(id)
  {
    $.ajax({
           url:base_url+'User-View-Details',
           type:'post',
           dataType:'json',
           data:{'id':id,csrf_token:csrf_value},
           success:function(response)
           {
            var data='<div class="row"><div class="col"><label for="name">Name:</label><input type="text" id="id" value="'+response.id+'" hidden><input type="text" class="form-control" placeholder="Enter Name" id="name" value="'+response.name+'" disabled></div><div class="col"><label for="email">Email:</label><input type="email" class="form-control" placeholder="Enter Email" id="email" value="'+response.email+'" disabled></div></div><div class="row"><div class="col"><label for="mobile">Mobile No:</label><input type="number" class="form-control" placeholder="Enter Mobile Number" id="mobile" value="'+response.mobile+'" disabled></div><div class="col"><label for="role">Role:</label><input type="text" class="form-control" placeholder="Enter Role" id="role" value="'+response.role+'" disabled></div></div><div class="row"><div class="col"><label for="dob">Date of Birth:</label><input type="date" class="form-control" id="dob" value="'+response.dob+'" disabled></div><div class="col"><label for="gender">Gender:</label><input type="text" class="form-control" id="gender" value="'+response.gender+'" disabled></div></div><div class="row"><div class="col"><label for="address">Address:</label><input type="text" class="form-control" id="address" value="'+response.address+'" disabled></div><div class="col"><label for="college">College:</label><input type="text" class="form-control" id="college" value="'+response.college+'" disabled></div></div><div class="row"><div class="col"><label for="class">Class:</label><input type="text" class="form-control" id="class" value="'+response.class+'" disabled></div><div class="col"><label for="f_name">Father Name:</label><input type="text" class="form-control" id="f_name" value="'+response.f_name+'" disabled></div></div></div>';
              $('.modal-body').html(data);
              $('#exampleModalLabel').html('View Record');
           }
       });
    $('#exampleModal').modal('show');
  }
  function editUserRecord()
  {
      $('.form-control').removeAttr("disabled");
      $("#update").attr("onclick","updateUserRecord()");
      $("#closed").attr("onclick","closeModal()");
      $("#update").html('Update');
      $('#exampleModalLabel').html('Update Record');
     
  }
  function updateUserRecord()
  {
      var useId=$('#id').val();
      var useName=$('#name').val();
      var userEmail=$('#email').val();
      var userMobile=$('#mobile').val();
      var userRole=$('#role').val();
      var userDOb=$('#dob').val();
      var userAddress=$('#address').val();
      var userCollege=$('#college').val();
      var userClass=$('#class').val();
      var userFname=$('#f_name').val();

      $.ajax({
        url:base_url+'update-User-Record',
        type:'post',
        data:{'name':useName,'email':userEmail,'mobile':userMobile,'role':userRole,'dob':userDOb,'address':userAddress,'college':userCollege,'class':userClass,'f_name':userFname,'id':useId,csrf_token:csrf_value},
        success:function(response)
        {
          $('#exampleModal').modal('hide');
          message('success', 'Record Updated Successfully', 2000);
          setTimeout(function () {
            location.reload();
        }, 3000);
        }
    });
      
  }
  function closeModal()
  {
    $("#update").attr("onclick","editUserRecord()");
      $("#update").html('Edit');
  }

  $(document).ready(()=>{
    $('#image').change(function(){
      const file = this.files[0];
      console.log(file);
      if (file){
        let reader = new FileReader();
        reader.onload = function(event){
          console.log(event.target.result);
          $('#imgPreview').attr('src', event.target.result);
          
        }
        reader.readAsDataURL(file);
      }
      $('#imgPreview').show();
    });
   
  });
