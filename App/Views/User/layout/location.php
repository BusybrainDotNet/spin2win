<?php 
/*
$query = @unserialize (file_get_contents('http://ip-api.com/php/'));

if ($query && $query['status'] == 'success') {
	$ip = ''. $query['city'] .', '. $query['country'] .'';
}else{
	$ip = 'Unknown Location';
}

foreach ($query as $data) {
    echo $data . "<br>";
}*/

//Location
$ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];




?>