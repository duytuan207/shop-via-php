<?php
require_once('../config.php');
if ( isset($_GET['api']) && isset($_GET['code']))
{
	$api = check_string($_GET['api']);
	$code = check_string($_GET['code']);
	$get_username = $ketnoi->query("SELECT username FROM users WHERE code = '$api' ")->fetch_array()["username"];
}
$query = "SELECT * FROM taikhoan WHERE username = '$get_username' AND ID_BUY = '$code' ORDER BY id ";
if (isset($query)) 
{
	$list = [];
	$result = $ketnoi->query($query);
	while ($data = mysqli_fetch_array($result)) 
	{
	  $list[] = [
	    "clone"=>$data["note"],
	    "status"=>$data["status"],
	    "gender"=>$data["gender"],
	    "friends"=>$data["friends"],
	    "name"=>$data["name"]

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