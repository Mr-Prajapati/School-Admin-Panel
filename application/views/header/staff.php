<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud application using ajax</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js" defer></script> 



</head>

<body>

<div class="navbar navbar-dark bg-dark">
    <div class="container" style="padding-top: 10px; margin-left:400px;">
        <a href="#" class="navbar-brand">VIEW</a>
    </div>
    </div>
    <div class="container"  style="margin-left:300px;">
       <div class="row">
         <div class="col-md-12">
         <?php if($this->session->flashdata('error')):?>
                <div class="alert  alert-success  alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo $this->session->flashdata('error'); ?>
  </div>
                <?php endif; ?>
       
       </div>
    <div class="row">
    <div class="col-md-8">
    <div class="row">
    <div class="col-6"> <h3>Staff(<?php echo sizeof($user);?>)</h3></div>  
        <hr>
        <div id="showmessage1"  class="alert  alert-success  alert-dismissible" style="display:none;">staff Added Successfully </div>
    </div>
           <div class="col-md-6 text-right">
                <a href="javascript:void(0);" onclick="showmodel();" class="btn btn-warning">Add New Staff</a>
           </div>
    </div>
       
    </div>

    <div class="row">
        <div class="col-md-8">
           <table id="myTable" class="table table-striped">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Staff Name</th>
                 <th>Father Name</th>
                 <th>Email</th>
                 <th>Mobile No</th>
                 <th>Dob</th>
                 <th>Join Date</th>
                 <th>Expierence</th>
                 <th>Staff Payment</th>
                 <th>Status</th>
                 <th>Delete</th>
                 <th>Edit</th>
              </tr>
              </thead>
              <tbody>
              <?php if(!empty($user)) { foreach($user as $use) {  ?>
               <tr>
                  <td><?php echo $use['id'] ?></td>
                  <td><?php echo $use['name'] ?></td>
                  <td><?php echo $use['fname'] ?></td>
                  <td><?php echo $use['email'] ?></td>
                  <td><?php echo $use['mobile'] ?></td>
                  <td><?php echo $use['dob'] ?></td>
                  <td><?php echo $use['join'] ?></td>
                  <td><?php echo $use['exp'] ?></td>
                  <td><?php echo $use['payment'] ?></td>
                  <td><input type="checkbox" <?php if($use['status'] == 1) { echo "checked" ;}  ?> name="status" ></td> 
                  <td>
                     <a href="<?php echo base_url('admin/deletestaff/'.$use['id']);?>"  class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  </td>
                 <td>
                     <a href="<?php echo base_url('admin/editstaff/'.$use['id']);?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
                 </td>
               </tr>
               <?php } } ?>
               </tbody>
              </table>
              

        <script>

           $(document).ready( function() {
             $('#myTable').DataTable();
           } );

       </script>

       
                
         </div>
       </div>  


 <div class="modal fade" id="createcar" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog" role = "document" >
      <div class="modal-content ">
         <div class="modal-header ">
           <h5 class="modal-title "  id="staticBackdropLabel">Add New Staff</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          
          </button>
      </div>
      
      <form action="" method="post"   id="createcategory">
        <div id="showmessage" class="alert alert-success alert-dismissible" style="display:none;">Please Fill All Fields</div>
     <div class="modal-body">
          <div class="form-group">
                  <label >Enter Staff Name</label>
                  <input type="text" name="sname" id="sname" value="" class="form-control" required>
                  
            </div>

            <div class="form-group">
                  <label >Enter Father Name</label>
                  <input type="text" name="fname" id="fname" value="" class="form-control" required>
                  
            </div>

            <div class="form-group">
                  <label >Enter Email</label>
                  <input type="email" name="email" id="email" value="" class="form-control" required>
                  
            </div>
            
            <div class="form-group">
                  <label >Enter Mobile Number</label>
                  <input type="text" name="mobile" id="mobile" value="" class="form-control" required>
                  
            </div>
                        

            <div class="form-group">
                  <label >Enter Staff DOB</label>
                  <input type="date" name="dob" id="dob" value="" class="form-control" required>
                  
            </div>
  

            <div class="form-group">
                  <label >Enter Join Date</label>
                  <input type="date" name="join" id="join" value="" class="form-control" required>
                  
            </div>

            <div class="form-group">
                  <label >Enter Exprience</label>
                  <input type="text" name="exp" id="exp" value="" class="form-control" required>
                  
            </div>
          
            <div class="form-group">
                  <label >Enter Staff Payment</label>
                  <input type="text" name="payment" id="payment" value="" class="form-control" required>
                  
            </div>
            
            <div class="form-group">
                  <label >Enter Staff Other Information</label>
                 <textarea name="staffarea" class="form-control" id="staffarea" cols="30" rows="10"></textarea>
            </div>



          <div class="form-group">
              <input type="submit" class="btn btn-primary" value="Add" >
            </div>
    </div>
      </form>
  </div>
</div>



<script>

function showmodel(){
    $('#createcar').modal("show");
  
}

$('#createcategory').submit(function(e){
         e.preventDefault();

       $.ajax({
            url: "<?php echo base_url('admin/insertstaff'); ?>",   
            data: $('#createcategory').serialize(),
            type: "post",
            datatype: 'json',
            success: function(response){   
                   if(response){
                         $('#createcar').modal("hide");
                         $('#showmessage1').show();
                         setInterval(function() {
                                 location.reload();
                                  }, 3000);
                        
                   }else{  
                              $('#showmessage').show();
                              setInterval(function() {
                                 location.reload();
                                  }, 3000);

                            //  alert('please fill all the fields');
                   }
            }
       });  

});



</script>


</body>

</html>