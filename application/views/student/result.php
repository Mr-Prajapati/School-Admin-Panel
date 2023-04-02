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
        <a href="#" class="navbar-brand">Result</a>
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
    <div class="col-6"> <h3>Student Result</h3></div>  
        <hr>
       
    </div>
          
    </div>
       
    </div>

    <div class="row">
        <div class="col-md-8">
           <table id="myTable" class="table table-striped">
           <thead>
              <tr>
                 <th>Sno</th>
                 <th>Name</th>
                 <th>Exam Name</th>
                 <th>Result</th>
                 
                
              </tr>
              </thead>
              <tbody>
            
              <?php $i=1; if(!empty($user)) {  foreach($user as $use) {  ?>
               <tr>
               <?php if($use['sname']==$this->session->userdata('name')){ ?>
               <td><?php echo $i; ?></td>
                  <td><?php echo $use['sname'] ?></td>
                  <td><?php echo $use['exam'] ?></td>
                  <td><?php echo $use['result'] ?></td>
                   
               </tr>
               <?php $i++ ?>
               <?php } ?>
               <?php  }  }  ?>
        
               </tbody>
              </table>
              

        <script>

           $(document).ready( function() {
             $('#myTable').DataTable();
           } );

       </script>

       
                
         </div>
       </div>  


 


</body>

</html>