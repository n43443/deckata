<?php 
$login_successful = false; 
// check user & pwd: 
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])){ 
    $usr = $_SERVER['PHP_AUTH_USER']; 
    $pwd = $_SERVER['PHP_AUTH_PW']; 
    if ($usr == 'test' && $pwd == '123'){ 
        $login_successful = true; 
    } 
} 
// login ok? 
if (!$login_successful){ 
    // send 401 headers: 
    // realm="something" will be shown in the login box 
    header('WWW-Authenticate: Basic realm="Secret page"'); 
    header('HTTP/1.0 401 Unauthorized'); 
	die("Login failed!n");
} 
