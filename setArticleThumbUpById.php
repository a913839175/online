<?php
//获取点赞数量
include_once('connect.php'); //连接数据库 

 $id = getParam('id');
$ip = get_client_ip(); //获取客户端IP

$query = mysqli_query($con,"select * from GiveLike where ip='$ip' and Articleid = '$id'"); 

if(!mysqli_num_rows($query)){ //如果不存在访客IP 
	mysqli_query($con,"insert into GiveLike (Articleid,ip) values ('$id','$ip')");
	list($zans) = mysqli_fetch_array(mysqli_query($con,"select count(*) from GiveLike where Articleid = '$id' "));
	mysqli_query($con,"update article set zans = '$zans' where id = '$id'"); 
	$code=true;
}else{//如果存在访客IP
  mysqli_query($con,"DELETE FROM GiveLike WHERE ip='$ip'");
	list($zans) = mysqli_fetch_array(mysqli_query($con,"select count(*) from GiveLike where Articleid = '$id' ")); 
	$code=false;
}
$json = array(
  'zans'=> $zans,
  'code'=>$code
);

header('Access-Control-Allow-Origin:*','Content-type:text/json');
echo json_encode($json,JSON_UNESCAPED_UNICODE); 
 

