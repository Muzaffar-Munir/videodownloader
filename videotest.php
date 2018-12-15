<?php

$a='pakistan';
echo $a;
if (strpos($a, 'pak')!==false)
   {
  echo "<script>alert('$a');</script>";
}
$str = 'This is Main String';
 
if (strpos($str, 'This') !== false) {
    echo 'true';
}
//file_put_contents('images/a.mp4', fopen("http://192.168.252.142/a.mp4", 'r'));
?>