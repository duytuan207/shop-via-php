<?php
require_once('../config.php');
if (isset($_GET['api']))
{
	$api = check_string($_GET['api']);
}
$query = "SELECT * FROM users WHERE code = '$api' ORDER BY id ";
if (isset($query)) 
{
	$list = [];
	$result = $ketnoi->query($query);
	while ($data = mysqli_fetch_array($result)) 
	{
	  $list[] = [
	  	"status"=> 'success',
	    "username"=>$data["username"],
	    "money"=>$data["money"],
	    "total_money"=>$data["total_nap"],
	    "level"=>$data["level"],
	    "createdate"=>$data["createdate"],
	    "ip"=>$data["ip"]

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