<?php

include 'header.php';


?>
<div class="content">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">

      <div class="row">
              <?php 
			  
			 
			 
			  
            $id=$_SESSION['id'];
     $query=mysqli_query($con,"select * from user where id='$id' ");
     if(mysqli_num_rows($query)>0){
			$obj = mysqli_fetch_object($query);
			

   
?>

		<div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title mb-3"><i class="fa fa-user"></i> User Profile</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="images/profile.png" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">User Name: <?=$obj->uname?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-envelope-o"></i> <?=$obj->email?></div>
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                   <a id="up"><b>Change Profile Info</b> </a>
                                </div>
                            </div>
                        </div>
                    </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="nav-tabs-custom">
            
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  
                  <!-- /.user-block -->
				     <p id="info"></p>
                   
                  <p>
                  <div class="tab-pane" id="updateProfile">
                <form class="" method="post">
                                 <div class="form-group">
                    <div class="col-sm-10">
					 <label>First Name</label>
                      <input type="text" class="form-control" name="fname" required placeholder="First Name" value="<?=$obj->firstname?>" >
                    </div>
                  </div>
				    <div class="form-group">
                       <div class="col-sm-10">
                        <label>Last Name</label>                     
					 <input type="text" class="form-control" name="lname" required placeholder="Last Name" value="<?=$obj->lastname?>" >
                    </div>
                  </div>
				     <div class="form-group">
                      <div class="col-sm-10">
					<label>User Name</label>
                      <input type="text" class="form-control" name="uname" required placeholder="Name" value="<?=$obj->uname?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10">
					<label>Email</label>
                      <input type="email" class="form-control" name="email" required splaceholder="Email" value="<?=$obj->email?>">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    
                    <div class="col-sm-10">
					<label>Password</label>
                      <input type="text" class="form-control"  placeholder="Password" name="password">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10"><br>
                      <button type="submit" class="btn btn-danger" name="submit">Submit</button>
                    </div>
                  </div>
                </form>
              </div> 
                  </p>
                 
                

                
              
              
              <?php
        }
        ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include 'footer.php';
?>
<script type="text/javascript">
  $('#updateProfile').hide();
  $('#up').click(function () {
      $('#updateProfile').show();
  })
</script>
<?php
if (isset($_POST['submit'])) {
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$email=$_POST['email'];

    if (isset($_POST['password'])& !empty(trim($_POST['password']))) 
    {
		
    $pass=$_POST['password'];
	//UPDATE `user` SET `firstname`=[value-2],`lastname`=[value-3],`uname`=[value-4],`password`=[value-5],`email`=[value-6]
    $q1=mysqli_query($con,"UPDATE `user` SET `firstname`='$fname',`lastname`='$lname',`uname`='$uname',`password`='$pass',`email`='$email' WHERE id='$id'");
          if ($q1)
           {?>

	   
		  		   <script>
				   
				$('#info').html('<div class="alert alert-success"><strong>Success!</strong>Profile  Successfully Updated</div>');
				window.setTimeout(function() {
       window.location.href =  'profile.php';
          }, 3000);
			</script>
										<?php
            	   
       
			
           }
		   
	    else{?>
		
		 <script>$('#info').html('<div class="alert alert-danger"><strong>Danger!</strong>Profile  Not Updated.</div>');</script>	 <?php }
    }

      else{
      $q2=mysqli_query($con,"UPDATE `user` SET `firstname`='$fname',`lastname`='$lname',`uname`='$uname',`email`='$email' WHERE id='$id'");
          if ($q2)
           {   ?>
	  
           <script>
				$('#info').html('<div class="alert alert-success"><strong>Success!</strong>Profile  Successfully Updated</div>');
				window.setTimeout(function() {
       window.location.href =  'profile.php';
          }, 2000);
			</script>
		
<?php
       	  
		
       
           }
		   else{
		 ?>
		 
		 <script>$('#info').html('<div class="alert alert-danger"><strong>Danger!</strong> Profile  Not Updated.</div>');</script>
		 <?php
	  }
        } 
}
?>



