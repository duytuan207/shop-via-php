<?php
require_once('../config.php');
if ( isset($_GET['api']) )
{
	$api = check_string($_GET['api']);
	$get_username = $ketnoi->query("SELECT username FROM users WHERE code = '$api' ")->fetch_array()["username"];
}
$query = "SELECT * FROM orders WHERE username = '$get_username'  ORDER BY id ";
if (isset($query)) 
{
	$list = [];
	$result = $ketnoi->query($query);
	while ($data = mysqli_fetch_array($result)) 
	{
	  $list[$data['ID_BUY']] = [
	  	"code"=>$data["ID_BUY"],
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
	echo json_encode([
            'status' => 'error',
            'msg'    => 'API KEY không hợp lệ !',
        ]);
	die();
}
?>