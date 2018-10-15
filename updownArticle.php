<?php

include_once('connect.php'); //连接数据库 

$photo = getParam('photo'); 
$title = getParam('title');  
$content = getParam('content');
$addtime = date('Y-m-d',time()); 

// $sql = "insert into LeaveMessage (articleid,username,email,text,ip,addtime) values ('$artid','$username','$eamil','$test','$ip','$addtime')"
$arr = array('photo'=>$photo,'title'=>$title,'time'=>$addtime,'auth'=>'沈鑫荣','zans'=>'0','view'=>'0','content'=>$content); 
$bool = $db->insert('article',$arr);

$json = array(
  'success'=>$bool
);

echo json_encode($json,JSON_UNESCAPED_UNICODE); 
 

