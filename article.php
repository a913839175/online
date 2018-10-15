<?php
//文章列表
include_once('connect.php'); //连接数据库 

$page = getParam('page');
$epage = getParam('epage');

// var_dump(($page-1)*$epage,$epage*1);die;
$sql = "SELECT * FROM article ORDER BY time desc LIMIT ".($page-1)*$epage.",".$epage."";

$result = mysqli_query($con,$sql);
$records = mysqli_num_rows(mysqli_query($con,"select * from article")); 
$arr = $db->result_array($sql); 

$json = array(
 'request'=>'success',
 'data'=> $arr,
 'total'=>$records
);

header('Access-Control-Allow-Origin:*','Content-type:text/json');
echo json_encode($json,JSON_UNESCAPED_UNICODE); 
 

