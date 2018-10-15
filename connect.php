<?php
// $con = mysqli_connect("127.0.0.1","root","root","sxr"); 
// if (mysqli_connect_errno($con)) 
// { 
//     echo "连接 MySQL 失败: " . mysqli_connect_error(); 
// } 
header('Access-Control-Allow-Origin:*','Content-type:text/json');

require_once ("dp.class.php");

$db = new mysql('127.0.0.1','root','root','sxr','3306');

$con = $db->con();

// mysqli_query($con,"set names utf8");

function getParam($key, $defaultValue = '') {
    if (!isset($key) OR empty($key) OR !is_string($key))
        return '';
    $ret = (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $defaultValue));

    return $ret;
}

function get_client_ip() { 
  if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown")) 
    $ip = getenv("HTTP_CLIENT_IP"); 
  else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), 
"unknown")) 
    $ip = getenv("HTTP_X_FORWARDED_FOR"); 
  else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown")) 
    $ip = getenv("REMOTE_ADDR"); 
  else if (isset ($_SERVER['REMOTE_ADDR']) && 
$_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown")) 
    $ip = $_SERVER['REMOTE_ADDR']; 
  else
    $ip = "unknown"; 
  return ($ip); 
} 
//时区为东八区
date_default_timezone_set('Asia/Shanghai');