<?php
if(isset($_SESSION['username']) && isset($_POST['btnChangePass']))
{
    $password = check_string($_POST['password']);
    $newpassword = check_string($_POST['newpassword']);
    $repassword = check_string($_POST['repassword']);

    $password = md5($password);
    $newpassword = md5($newpassword);
    $repassword = md5($repassword);

    if ($password == "" || $repassword == "" || $newpassword == "") 
    {
        echo '<script type="text/javascript">swal("Thất Bại", " Vui lòng điền vào ô dưới!", "error");</script>';
    }
    else if ($password != $user['password']) 
    {
        echo '<script type="text/javascript">swal("Thất Bại", " Mật khẩu hiện tại không chính xác!", "error");</script>';
    }
    else
    {
        $ketnoi->query("INSERT INTO `log` SET 
        `content` = 'Thay đổi mật khẩu, IP (".$ip_address."). ',
        `username` =  '".$user['username']."',
        `createdate` =  now() ");

        $ketnoi->query("UPDATE users SET `password` =  '$newpassword' WHERE `username` = '".$user['username']."' ");
        die('<script type="text/javascript">swal("Thành Công","Thay đổi mật khẩu thành công!","success");setTimeout(function(){ location.href = "" },1000);</script>');
    }
}
?>