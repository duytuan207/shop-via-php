<?php 

require_once 'GoogleAuthenticator.php';

if (isset($_GET['key']))
{
	$key = trim($_GET['key']);
	$ga = new PHPGangsta_GoogleAuthenticator();
	$code = $ga->getCode($key);
	$list = [
	"key"=>$key,
	"code"=>$code
	];
	echo json_encode($list, JSON_PRETTY_PRINT);
}
?>