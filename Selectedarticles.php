<?php
//精选文章
include_once('connect.php'); //连接数据库 

$sql = "SELECT id,title,photo FROM article order by zans desc limit 3";

$data = $db ->result_array($sql);
$json = array(
 'data'=> $data 
);

// header('Access-Control-Allow-Origin:*','Content-type:text/json');
echo json_encode($json); 