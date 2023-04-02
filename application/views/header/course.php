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
    <div class="container"  style="margin-left:400px;">
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
    <div class="col-6"> <h3>Course(<?php echo sizeof($user);?>)</h3></div>  
        <hr>
        <div id="showmessage1"  class="alert  alert-success  alert-dismissible" style="display:none;">Class Added Successfully </div>
    </div>
           <div class="col-md-6 text-right">
                <a href="javascript:void(0);" onclick="showmodel();" class="btn btn-warning">Add Course</a>
           </div>
    </div>
       
    </div>

    <div class="row">
        <div class="col-md-8">
           <table id="myTable" class="table table-striped">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Course Name</th>
                 <th>Duration</th>
                 <th>Course Fees</th>
                 <th>Course Started</th>
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
                  <td><?php echo $use['duration'] ?></td>
                  <td><?php echo $use['fees'] ?></td>
                  <td><?php echo $use['started'] ?></td>
                  <td><input type="checkbox"  <?php if($use['status'] == 1) { echo "checked" ;}  ?> name="status" ></td> 
                  <td>
                     <a href="<?php echo base_url('admin/deletecourse/'.$use['id']);?>"  class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  </td>
                 <td>
                     <a href="<?php echo base_url('admin/editcourse/'.$use['id']);?>" class="btn btn-success"><i class="fa fa-pencil"></i></a>
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
           <h5 class="modal-title "  id="staticBackdropLabel">Add New Course</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          
          </button>
      </div>
      
      <form action="" method="post"   id="createcategory">
        <div id="showmessage" class="alert alert-success alert-dismissible" style="display:none;">Please Fill All Fields</div>
     <div class="modal-body">
          <div class="form-group">
                  <label >Enter Course Name</label>
                  <input type="text" name="course" id="course" value="" class="form-control" required>
                  <p class="nameError"></p>
            </div>

            <div class="form-group">
                  <label >Enter Course Duration</label>
                  <input type="text" name="duration" id="duration" value="" class="form-control" required>
                  <p class="nameError"></p>
            </div>
            
            <div class="form-group">
                  <label >Enter Course Fees</label>
                  <input type="text" name="fees" id="fees" value="" class="form-control" required>
                  <p class="nameError"></p>
            </div>


            <div class="form-group">
                  <label > Course Started</label>
                  <input type="text" name="started" id="started" value="" class="form-control" required>
                  <p class="nameError"></p>
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
            url: "<?php echo base_url('admin/insertcourse'); ?>",   
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