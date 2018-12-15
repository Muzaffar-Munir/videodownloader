<?php
session_start();
session_destroy();
header('location:login.php?error=You are not Admin !');


?>