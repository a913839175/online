<?php
//文章详情
include_once('connect.php'); //连接数据库 

$id = getParam('id');
// var_dump(($page-1)*$epage,$epage*1);die;
$sql = "SELECT * FROM article where id='$id'";

$result = mysqli_query($con,$sql);
$arr = array(); 

while($row = mysqli_fetch_array($result)) { 
  $count=count($row);//不能在循环语句中，由于每次删除 row数组长度都减小 
  for($i=0;$i<$count;$i++){ 
    unset($row[$i]);//删除冗余数据 
  }   
  array_push($arr,$row);   
}

$json = array(
 'data'=> $arr,
);

header('Access-Control-Allow-Origin:*','Content-type:text/json');
echo json_encode($json,JSON_UNESCAPED_UNICODE); 