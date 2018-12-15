  <?php
  
	 $con=mysqli_connect("localhost","root","");
	 if(!$con){
	echo 'Not connected To server<br/>';
}

if(!mysqli_select_db($con,'buddyshare')){
	echo 'database not selected<br/>';
	
}


  
  
  
  ?>