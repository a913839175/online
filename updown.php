<?php
//精选文章
include_once('connect.php'); //连接数据库 


 
$id = getParam('id');

$oneid = $db->get_one("SELECT id FROM article LIMIT 1");
$lastid = $db->get_one("SELECT id FROM article order by id DESC LIMIT 1");

if($id == $oneid){

	$sql = "SELECT * FROM article WHERE id > '$id' ORDER BY id LIMIT 1";
	$sql2 = "SELECT * FROM article ORDER BY id DESC LIMIT $lastid";

}else if($id == $lastid){

	$sql = "SELECT * FROM article  ORDER BY id LIMIT $oneid";
	$sql2 = "SELECT * FROM article WHERE id < '$id' ORDER BY id DESC LIMIT 1";

}else{	

	$sql = "SELECT * FROM article WHERE id > '$id' ORDER BY id LIMIT 1";
	$sql2 = "SELECT * FROM article WHERE id < '$id' ORDER BY id DESC LIMIT 1";
		
}


$next = $db->row_array($sql);

$prev = $db->row_array($sql2);


$json = array(
  'next'=> $next,
  'prev'=>$prev
);

echo json_encode($json,JSON_UNESCAPED_UNICODE); 
 

