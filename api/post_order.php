<?php 
if (isset($_POST['post_order']))
{
	$api = check_string($_POST['api']);
	$soluong = check_string($_POST['soluong']);
	$type = check_string($_POST['type']);


	if (!isset($_SESSION['username']))
	{
		echo '<script type="text/javascript">swal("Thất Bại", "Vui lòng đăng nhập!", "error");
        setTimeout(function(){ location.href = "/dang-nhap/" },2000);</script>';
        die();
	}
	else if ($check_taikhoanconlai < $soluong)
	{
		echo '<script type="text/javascript">swal("Thông Báo", "Số tài khoản trong hệ thống không đủ!", "warning");</script>';
	}
	else if ($soluong <= 0)
	{
		echo '<script type="text/javascript">swal("Thông Báo", "Số lượng không hợp lệ!", "warning");</script>';
	}
	else if ($soluong > 1000000)
	{
		echo '<script type="text/javascript">swal("Thông Báo", "Số lượng không hợp lệ!", "warning");</script>';
	}
	else if ($my_money < $total_money)
	{
		echo '<script type="text/javascript">swal("Thất Bại", "Số dư không đủ thanh toán!", "error");
        setTimeout(function(){ location.href = "/" },2000);</script>';
        die();
	}
}

?>