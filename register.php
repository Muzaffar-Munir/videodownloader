 <?php include('database/connection.php');
   ?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sufee Admin - HTML5 Admin Template</title>
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
             <h3 align='center'>Register Here</h3>                
				<form method="post" action="register.php" enctype="multipart/form-data">
				
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="fname" placeholder="First Name" required>
                        </div>
						<div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="lname" placeholder="Last Name" required>
                        </div>
						<div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" name="uname" placeholder="Last Name" required>
                        </div>
						<div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" required>
                        </div>
                        
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" required> Agree the <a href="#">terms</a> and <a href="#">policy</a>
                            </label>
                        </div>
                        <button type="submit"  name="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Register</button><br><br>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>Already have account ? <a href="login.php"> Sign in</a></p>
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
if(isset($_POST['submit'])){
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
    $uname=$_POST['uname'];
    $pass=$_POST['password'];
	$email=$_POST['email'];
    $query=	"INSERT INTO `user`(`firstname`, `lastname`, `uname`, `password`, `email`) VALUES ('$fname','$lname','$uname','$pass','$email')";
	 $insert=mysqli_query($con,$query);
	 
    if($insert){
		
	echo "<script>alert('Sign up Completed!');
                 window.location.href='login.php';    	</script>";}
		else{
			echo "<script>alert('Something Goes wrong'); </script>";
		}
                                        }
                                       
          //$query = mysqli_real_escape_string($con,$query);      

?>