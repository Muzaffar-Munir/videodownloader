<!DOCTYPE html>
<html>
<head>
	<title>enter your URL</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body><br><br><br>
<div class="container">
	<div class="row">
		<div class="col-md-6" style="margin-left: 25%">
		 <form method="post">
			<input type="url" name="url" class="form-control" required="" placeholder="Enter Video Link"><br>
			<!--<input type="text" name="type" class="form-control" placeholder="Enter Type of Content" >
		<select class="form-control" name="type">
			<option>Select Type of File</option>
			<option value="video">Video File</option>
			<option value="file">other File</option>
		</select>
-->

			<br>
			<input type="submit" name="submit" class="form-control btn btn-info">
    	 </form>
<h2>Response</h2><span id="res"></span>
    	 
		</div>
	</div>
</div>
	
</body>
</html>
<?php
if (isset($_POST['submit'])) {

include "post.php";

	//echo "<script>alert('hellp')</script>";
	if (isset($_POST['url']) && !empty($_POST['url'])) {
	$url=$_POST['url'];
	//parse_str(parse_url( $url, PHP_URL_QUERY ), $vidID );
	// echo $vidID['v'];     
	//$data = array("id" =>  $vidID['v']);
	$data=array("id"=>$url);
 	$data_string = json_encode($data);     	
  
$data  = post('http://localhost:3000/video',array('url'=>$data_string));
echo "<script>alert('hu');</script>";
echo $data;

	}
	 else{

	 echo "<script>alert('Kindly Enter Link to download Video')</script>";
	 }
	
}
	

?>
