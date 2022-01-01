<?php
require_once('../config.php');
if ( isset($_GET['api']) && isset($_GET['code']))
{
	$api = check_string($_GET['api']);
	$code = check_string($_GET['code']);
	$get_username = $ketnoi->query("SELECT username FROM users WHERE code = '$api' ")->fetch_array()["username"];
}
$query = "SELECT * FROM orders WHERE username = '$get_username' AND ID_BUY = '$code' ORDER BY id ";
if (isset($query)) 
{
	$list = [];
	$result = $ketnoi->query($query);
	while ($data = mysqli_fetch_array($result)) 
	{
	  $list[] = [
	    "title"=>$data["title"],
	    "type"=>$data["type"],
	    "soluong"=>$data["soluong"],
	    "money"=>$data["money"],
	    "createdate"=>$data["createdate"]
	  ];
	}
	echo json_encode($list);
}
else
{
	die();
}
?>