<?php 
//首页
include_once('connect.php'); //连接数据库 

$ip = get_client_ip(); //获取客户端IP 

$time = time(); 
// //查询表中是否有ip为当前访客IP的记录 
$query = mysqli_query($con,"select id from online where ip='$ip'"); 
if(!mysqli_num_rows($query)){//如果不存在访客IP 
  mysqli_query($con,"insert into online (ip,addtime) values ('$ip','$time')"); 
}else{//如果存在，则更新该用户访问时间 
  mysqli_query($con,"update online set addtime='$time' where ip='$ip'"); 
}
// //统计总记录数，即在线用户数 
list($totalOnline) = mysqli_fetch_array(mysqli_query($con,"select count(*) from online")); 
mysqli_close($con); 
$data =array(
	'request'=>'success',
	'total'=> $totalOnline
);
$data_json = json_encode($data);
echo $data_json;

 

