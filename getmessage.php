<?php
//获取留言
include_once('connect.php'); //连接数据库 

$artid = getParam('id'); 
$list = "select * from leavemessage where articleid = '$artid' order by id desc";

$list2 = $db->result_array($list);

$json = array(
  'List'=>$list2
);

echo json_encode($json,JSON_UNESCAPED_UNICODE); 

