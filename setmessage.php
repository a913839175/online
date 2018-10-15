<?php
//发布留言
include_once('connect.php'); //连接数据库 

$artid = getParam('artid'); 
$username = getParam('username');
$eamil = getParam('eamil');
$test = getParam('test');
$ip = get_client_ip(); //获取客户端IP
$addtime = date('Y-m-d H:i:s',time()); 


// $sql = "insert into LeaveMessage (articleid,username,email,text,ip,addtime) values ('$artid','$username','$eamil','$test','$ip','$addtime')"
$arr = array('articleid'=>$artid,'username'=>$username,'email'=>$eamil,'text'=>$test,'ip'=>$ip,'addtime'=>$addtime); 
$bool = $db->insert('LeaveMessage',$arr);

$json = array(
  'success'=>$bool
);

echo json_encode($json,JSON_UNESCAPED_UNICODE); 
 

