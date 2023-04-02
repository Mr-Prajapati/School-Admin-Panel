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
        <a href="#" class="navbar-brand">Edit Course</a>
    </div>
    </div>
    <div class="container" style="margin-left:500px;">
      <h3>Edit Course</h3>
      <hr>
      <form method="post" name="createuser" action="<?php  echo base_url('admin/editcourse/'.$user['id']); ?>">
       <div class="row">
      
          <div class="col-md-6">
          <div class="form-group">
             <label >Enter Course Name</label>
             <input type="text" name="course" value="<?php echo set_value('course',$user['name']);?>" class="form-control">
             <?php echo form_error('course'); ?>
          </div>
              
          <div class="form-group">
             <label >Enter Course Duration</label>
             <input type="text" name="duration" value="<?php echo set_value('duration',$user['duration']);?>" class="form-control">
             <?php echo form_error('duration'); ?>
          </div>

          <div class="form-group">
             <label >Enter Course Fees</label>
             <input type="text" name="fees" value="<?php echo set_value('fees',$user['fees']);?>" class="form-control">
             <?php echo form_error('fees'); ?>
          </div>


          <div class="form-group">
             <label >Course Started</label>
             <input type="text" name="started" value="<?php echo set_value('started',$user['started']);?>" class="form-control">
             <?php echo form_error('started'); ?>
          </div>



          <div class="form-group">
            <button class="btn btn-primary">Update</button>
            <a href="<?php echo base_url('admin/course');?>" class="btn-secondary btn">cancel</a>
          </div>
          </div>
         
       </div>
       </form>
    </div>
</body>
</html>