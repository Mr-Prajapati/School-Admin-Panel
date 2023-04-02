<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>crud application</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</head>
<body>
    <div class="navbar navbar-dark bg-dark">
    <div class="container" style="padding-top: 10px; margin-left:400px;">
        <a href="#" class="navbar-brand">Edit Student</a>
    </div>
    </div>
    <div class="container" style="margin-left:500px;">
      <h3>Edit Student</h3>
      <hr>
      <form method="post" name="createuser" action="<?php  echo base_url('admin/editstudent/'.$user['id']); ?>">
       <div class="row">
      
          <div class="col-md-6">
          <div class="form-group">
             <label >Enter Student Name</label>
             <input type="text" name="sname" value="<?php echo set_value('sname',$user['name']);?>" class="form-control">
             <?php echo form_error('sname'); ?>
          </div>
              
          <div class="form-group">
             <label >Enter Father Name</label>
             <input type="text" name="fname" value="<?php echo set_value('fname',$user['fname']);?>" class="form-control">
             <?php echo form_error('fname'); ?>
          </div>


          <div class="form-group">
             <label >Enter Email</label>
             <input type="text" name="email" value="<?php echo set_value('email',$user['email']);?>" class="form-control">
             <?php echo form_error('email'); ?>
          </div>



          <div class="form-group">
             <label >Enter Category Name</label>
             <input type="text" name="cat" value="<?php echo set_value('cat',$user['category']);?>" class="form-control">
             <?php echo form_error('cat'); ?>
          </div>


          <div class="form-group">
             <label >Enter Class Name</label>
             <input type="text" name="class" value="<?php echo set_value('class',$user['class']);?>" class="form-control">
             <?php echo form_error('class'); ?>
          </div>

          <div class="form-group">
             <label >Enter Student DOB</label>
             <input type="date" name="dob" value="<?php echo set_value('dob',$user['dob']);?>" class="form-control">
             <?php echo form_error('dob'); ?>
          </div>

          <div class="form-group">
             <label >Enter Join Date</label>
             <input type="date" name="join" value="<?php echo set_value('join',$user['joindate']);?>" class="form-control">
             <?php echo form_error('join'); ?>
          </div>



          <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('admin/student');?>" class="btn-secondary btn">cancel</a>
          </div>
          </div>
         
       </div>
       </form>
    </div>
</body>
</html>