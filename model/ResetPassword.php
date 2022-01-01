<?php
if(isset($_POST['token']) && isset($_POST['btnChangePass']))
{
    $password = check_string($_POST['password']);
    $repassword = check_string($_POST['repassword']);
    $token = check_string($_POST['token']);
    $query = $ketnoi->query("SELECT * FROM users WHERE token = '$token' ");
    $query_array = $query->fetch_array();
    $password = md5($password);
    $repassword = md5($repassword);
    if($query->num_rows == 0)
    {
        echo '<script type="text/javascript">swal("Thất Bại", " Token không hợp lệ !", "error");</script>';
    }
    else if ($password == "" || $repassword == "") 
    {
        echo '<script type="text/javascript">swal("Thất Bại", " Vui lòng điền vào ô dưới!", "error");</script>';
    }
    else if ($password != $repassword) 
    {
        echo '<script type="text/javascript">swal("Thất Bại", " Nhập lại mật khẩu không đúng!", "error");</script>';
    }
    else
    {
        $ketnoi->query("INSERT INTO `log` SET 
        `content` = 'Khôi phục lại mật khẩu IP (".$ip_address."). ',
        `username` =  '".$query_array['username']."',
        `createdate` =  now() ");
        $ketnoi->query("UPDATE users SET `password` =  '$password', `token` = null WHERE `token` = '$token' ");
        die('<script type="text/javascript">swal("Thành Công","Thay đổi mật khẩu thành công!","success");setTimeout(function(){ location.href = "/login/" },1000);</script>');
    }
}
?>