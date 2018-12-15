
<?php
include"header.php";
$owner_id=$_SESSION['id'];

?>     
   <head> 
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

</head>



	   <div class="content">
        <div class="container-fluid">
          <h3> Shared With me</h3><hr>
			<div class="row">
				
				<?php

 $query2=" SELECT * from s_file_table WHERE  to_share_id='$owner_id' ";
 $run2=mysqli_query($con,$query2);
 if (mysqli_num_rows($run2)>0) {
	 
 while($row2=mysqli_fetch_array($run2)){
	 
	 $shared_file_id=$row2['shared_file_id']; 
	 $query3=" SELECT * from filetable WHERE  fid='$shared_file_id' ";
     $run3=mysqli_query($con,$query3);
 if (mysqli_num_rows($run3)>0) {
	 
 while($row3=mysqli_fetch_array($run3)){
 
  $fdescription=substr($row3['fdescription'],0,50);
	 $file=$row3['filepath'];	
	 $file_extension=$row3['fileextension'];
	 $data=$file.'.'.$file_extension;

	 ?>
	 
				<div class="col-md-3">

                        <div class="card">
	
                             
                            <div class="card-body">
																				 <?php 
 if($file_extension=='mp4'|| $file_extension=='3gp'|| $file_extension=='mkv'){
  ?>
 <video   controls="controls" width="234" height="200">
    <source src="uploads/<?php echo $file;?>" type="video/mp4"  />
 </video>
 <?php 
 }
 else if($file_extension=='jpg'||$file_extension=='jpeg'||$file_extension=='png'||$file_extension=='gif'){
	 ?>
 <img src="uploads/<?php echo $file;?>" width="234" height="200">
 <?php 
 }
 else{
	      ?> <img src="uploads/file.png" width="234" height="200">
 <?php }
 ?>
							    <hr>
                                
    
	</div>        
	</div> 
    </div>
 <?php 
 }
 }
	 ?>
	
				
						<?php
 }
 }
  
  ?>
                   
 	 </div>
	 
							
                </div>
           
        

    
	  
            <div class="container-fluid">
			<h3>My Uploaded Files</h3><hr>
                <div class="row">
                   
 <?php
 $i=0;
 $query1="select * from filetable where owner_id=$owner_id";
 $run1=mysqli_query($con,$query1);
 if (mysqli_num_rows($run1)>0) {
	 
 while($row1=mysqli_fetch_array($run1)){
	 
	 $fid=$row1['fid'];
	$_SESSION['file_ID']=$fid; 
	 $fdescription=substr($row1['fdescription'],0,50);
	 $file=$row1['filepath'];	
	 $file_extension=$row1['fileextension'];
	 $data=$file.'.'.$file_extension;

	 ?>
	
					<div class="col-md-3">

                        <div class="card">
	
                            
                            <div class="card-body">
																				 <?php 
 if($file_extension=='mp4'|| $file_extension=='3gp'|| $file_extension=='mkv'){
  ?>
 <video   controls="controls" width="234" height="200">
    <source src="uploads/<?php echo $file;?>" type="video/mp4"  />
 </video>
 <?php 
 }
 else if($file_extension=='jpg'||$file_extension=='jpeg'||$file_extension=='png'||$file_extension=='gif'){
	 ?>
 <img src="uploads/<?php echo $file;?>" width="234" height="200">
 <?php 
 }
 else{
	      ?> <img src="uploads/file.png" width="234" height="200">
 <?php }
 ?>
							    <hr>
                                <div class="card-text text-sm-center">
                                   <a ><b><?php //echo $file.','; echo $fid;?></a> 
							   <a href="#" name="sharefile" data-dismiss="modal" data-backdrop="false" data-toggle="modal"  <?=$i++?> data-target="#myModal<?=$i?>">Share</a>||
								   <a href='del_files.php?del_files=<?php  echo $fid; ?>&red=showfiles.php?show_file' onclick=" return confirm('Are you sure you want  to delete this item?');">Delete</a>
                                </div>
	
    
	</div>        
	</div> 
    </div>
	
<!-- Modal start-->
  <div class="modal fade"  id="myModal<?=$i?>"    role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Share File</h4>
		  <!-- Sea Box start-->
		  <div class="form-group">
       <div class="input-group">
      <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Users" class="form-control" />
    </div>
   </div>
   <!-- Modal content-->
        </div>
        <div class="modal-body">
		<form method="post" action="showfiles.php" enctype="multipart/form-data">               
 <?php
 $i++;
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($con, $_POST["query"]);
 $query = "
  SELECT * FROM user 
  WHERE uname LIKE '%".$search."%'
  
 ";
}
else
{
 $query = "
 select * from user where id!='$owner_id'
 ";
}
$result = mysqli_query($con, $query);
if(mysqli_num_rows($result) > 0)
{
 

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
							     <div class="checkbox">
									<label><input type="checkbox"  class="get_value" value="<?=$uid.",".$fid?>" name="chkid[]">
									<?php echo $username; ?><br></label>
       
								  </div>
							 </div>        
						</div> 
								
 
         </div>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
							<br>	<div class="col-md-2">
									<input type="submit" name="submit" class="form-control btn btn-info" > 
								 </div>  
  </form>   
							
   
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
	</div>
	<!-- Modal End-->
			<?php
 }
 }
  
  ?> 		
							
                </div>
            </div>
        </div>

      
<?php
include"footer.php";
?> 



<?php
        if(isset($_POST['submit']))
        {
        $id=$_POST['chkid'];
        for($i=0;$i<count($id);$i++)
        {
        $exp=explode(',',$id[$i]);//Explode id and name
       //  'to_share_id='.$exp[0].',shared_file_id='.$exp[1];
	   $first  = $exp[0];
	   $second  = $exp[1];
         $query="INSERT INTO `s_file_table`(`owner_id`, `to_share_id`, `shared_file_id`) VALUES ('$owner_id','$first','$second')";
          $Done=mysqli_query($con,$query);
		}
		if($Done){
			echo '<script>alert("File Share");</script>';
			
		}else{
		echo '<script>alert("File  not Share");</script>';
			
		}
        }
        ?>
		