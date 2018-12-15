<?php

include 'header.php';
$owner_id=$_SESSION['id'];

	 ?>
<head> 
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>

	


	 <br>
	 <h3 align="center">Upload File</h3>
	 <div class="row" style="border:0.5px solid #AAA;margin-left:2%;margin-right:2%">
	 	<div class="col-md-6">
	 	<div class="col-md-12" style="padding:20px;height:100%" >
			
	 <form method="post" enctype="multipart/form-data">
		
 <div class="controls  " style="width:100%;">
	<div id="filediv">
	<label style="display: inline-block;"><b>File:</b>
	
	</label><br>
	<input type="file" name="myfile"  style="display: inline-block;"></div>

	 </div> 
<br>
</div>
</div>
 <div class="col-md-6">
	 	<div class="col-md-12" style="padding:20px;height:100%">
 <div class="form-group">
                            <label>File Description </label>
                            <textarea id="name" rows="6" placeholder="File description" class="form-control" name="fdescription"></textarea>
                        </div>  
</div>
</div>
   <div class="col-md-12">
   <input type="submit" name="submit" class="form-control btn btn-info" >
<br><br><br>  
  </div>
   
</form>

   </div>
<br><br><br><br><br><br>

 <?php
			
				if (isset($_POST['submit'])) {
					
					$fdescription=$_POST['fdescription'];
					$temp_fname=$_FILES['myfile']['tmp_name'];
					
					$file=$_FILES['myfile']['name'];
					$f_extension=explode('.',$file);
					$f_extension=strtolower(end($f_extension));
					
					$file = time().rand().rand();
					$target1='uploads/'.$file;
					
					$query=mysqli_query($con,"INSERT INTO `filetable`(`fdescription`, `owner_id`,`filepath`,`fileextension`) VALUES ('$fdescription','$owner_id','$file','$f_extension')");
				      echo mysqli_error($con);
				if ($query){
					
				   
					
					if (move_uploaded_file($_FILES['myfile']['tmp_name'],$target1)) {
						echo'<div class="alert alert-success">
												  <strong>Success!</strong> Data  Successfully Uploaded.
										</div>';
					      
					}
				
				}else{
					echo'<div class="alert alert-danger">
												  <strong>Danger!</strong> Data is not Uploaded.
										</div>';
					
				}
					
				}
				
			
			?>

<?php 
include 'footer.php';
?>
