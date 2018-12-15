<?php
include 'header.php';
?>
<?php
$del_files=$_GET['del_files'];
$query="delete from filetable where fid='$del_files'";
if(mysqli_query($con,$query) ){
    echo "<script>window.location.href='showfiles.php';</script>";   
  $red = $_GET['red'];
  header("location:$red");
}
?>
