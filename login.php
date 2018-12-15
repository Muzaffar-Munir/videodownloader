 <?php
  session_start();

  include('database/connection.php');
 ?>
 
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="asset/css/normalize.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/font-awesome.min.css">
    <link rel="stylesheet" href="asset/css/themify-icons.css">
    <link rel="stylesheet" href="asset/css/flag-icon.min.css">
    <link rel="stylesheet" href="asset/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="asset/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="asset/scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">


    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                
                <div class="login-form">
				
				<h3 align='center'>Login Here</h3>
                    <form method="post" action="login.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>User Name<?php ?> </label>
                            <input type="text" class="form-control" name="name" placeholder="User Name" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div><br>
                        <button type="submit" name="submit" class="btn btn-success ">Sign in</button>
                       <br><br>
                        <div class="register-link m-t-15 text-center">
                            <p>Don't have account ? <a href="register.php"> Sign Up Here</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="asset/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/plugins.js"></script>
    <script src="asset/js/main.js"></script>


</body>
</html>
<?php  
if (isset($_POST['submit'])) {
$name=$_SESSION['name']=$_POST["name"];
$pass=$_POST["password"];

$query=mysqli_query($con,"SELECT * FROM `user` WHERE uname='$name' AND password='$pass'");
	if(mysqli_num_rows($query)>0){
			
			$obj = mysqli_fetch_object($query);
			
			$_SESSION['id'] = $obj->id;
				//echo "<script>alert(' username and password');</script>";

			echo " <script>window.location.href='index.php';</script>";					 
		}else{
				
			echo "<script>alert('Invalid username and password');</script>";	
		}
									  
}
?>
