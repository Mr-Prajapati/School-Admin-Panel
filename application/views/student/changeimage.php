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
        <a href="#" class="navbar-brand">change profile image</a>
    </div>
    </div>
    <div class="container" style="margin-left:500px;">
      <h3>profile upload</h3>
      <?php if($this->session->flashdata('error')):?>
                <div class="alert  alert-success  alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <?php echo $this->session->flashdata('error'); ?>
  </div>
                <?php endif; ?>
      <hr>
      
           <?php echo @$error; ?> 
	      <?php echo form_open_multipart('student/changeimage',['class' =>'form-control']);?>
       <div class="row">
      
          <div class="col-md-6">
          
          <div class="form-group">
             <label >Upload profile Image</label>
             <input type="file" name="profile_pic" value="<?php echo set_value('profile_pic');?>"  size="5" class="form-control">
             
                
          </div>
          <div class="form-group">  
            <?php echo "<input type='submit' name='submit' value='upload' /> ";?>
	        <?php echo "</form>"?>       
            <a href="<?php echo base_url('users/viewimage');?>" class="btn-secondary btn">cancel</a>
          </div>
          </div>
         
       </div>
       </form>
    </div>
</body>
</html>



















