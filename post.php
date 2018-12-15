<?php

// post function to server
function post($url, $jsonData=array()){
//$url = 'localhost:1000/XuClkkFgLkjrdlktKJhekjfrytf5jhJhrrdkJgfTFTFjhgftFhbYf';
//Initiate cURL.
$ch = curl_init($url);

$jsonDataEncoded = json_encode($jsonData);
//Tell cURL that we want to send a POST request.
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
//Attach our encoded JSON string to the POST fields.
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
//Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
//Execute the request
$result = curl_exec($ch);
curl_close($ch);
return json_decode($result);
}
?>