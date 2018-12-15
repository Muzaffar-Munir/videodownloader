
<?php
$string='Hello Pakistan how are you';
if(preg_match('/are/',$string)){
 	?><script>window.alert("found")</script>
	<?php
}
else{
	echo "not found";
}

?>