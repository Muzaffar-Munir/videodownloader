<?php
$url = "https://www.facebook.com/abdull.razzaq.12/videos/1714502635252189";
$query = parse_url($url, PHP_URL_QUERY);
parse_str($query, $vars);

var_dump($vars);
?>