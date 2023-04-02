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
        <a href="#" class="navbar-brand">Edit Staff</a>
    </div>
    </div>
    <div class="container" style="margin-left:500px;">
      <h3>Edit Staff</h3>
      <hr>
      <form method="post" name="createuser" action="<?php  echo base_url('admin/editstaff/'.$user['id']); ?>">
       <div class="row">
      
          <div class="col-md-6">
          <div class="form-group">
             <label >Enter Staff Name</label>
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
             <input type="email" name="email" value="<?php echo set_value('email',$user['email']);?>" class="form-control">
             <?php echo form_error('email'); ?>
          </div>


          <div class="form-group">
             <label >Enter Mobile Number</label>
             <input type="text" name="mobile" value="<?php echo set_value('mobile',$user['mobile']);?>" class="form-control">
             <?php echo form_error('mobile'); ?>
          </div>

          <div class="form-group">
             <label >Enter Staff DOB</label>
             <input type="text" name="dob" value="<?php echo set_value('dob',$user['dob']);?>" class="form-control">
             <?php echo form_error('dob'); ?>
          </div>

          <div class="form-group">
             <label >Enter Join Date</label>
             <input type="text" name="join" value="<?php echo set_value('join',$user['join']);?>" class="form-control">
             <?php echo form_error('join'); ?>
          </div>

          <div class="form-group">
             <label >Enter Exprience</label>
             <input type="text" name="exp" value="<?php echo set_value('exp',$user['exp']);?>" class="form-control">
             <?php echo form_error('exp'); ?>
          </div>
        
          <div class="form-group">
             <label >Enter Staff Payment</label>
             <input type="text" name="payment" value="<?php echo set_value('payment',$user['payment']);?>" class="form-control">
             <?php echo form_error('payment'); ?>
          </div>


          <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('admin/staff');?>" class="btn-secondary btn">cancel</a>
          </div>
          </div>
         
       </div>
       </form>
    </div>
</body>
</html>