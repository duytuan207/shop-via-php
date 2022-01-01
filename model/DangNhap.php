<?php 
if(isset($_POST['btnDangNhap']))
{
    $username = check_string($_POST['username']);
    $password = check_string($_POST['password']);
    $password = md5($password);
    $query = $ketnoi->query("SELECT * FROM users WHERE username = '$username' ")->fetch_array();
    if ($username == "" || $password =="") 
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg6'].'", "error");</script>';
    }
    else if(empty($query))
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg7'].'", "error");</script>';
    }
    if( isset($_SESSION['CheckSpamLogin']) )
    {
        if($_SESSION['CheckSpamLogin'] > 20)
        {
            die('<script type="text/javascript">swal("Thất Bại", "Bạn đã bị chặn đăng nhập vì SPAM", "error");setTimeout(function(){ location.href = "" },2000);</script>');
        }
    }
    else if($password != $query['password'])
    {
        if(isset($_SESSION['CheckSpamLogin']))
        {
            $_SESSION['CheckSpamLogin']++;
        }
        else
        {
            $_SESSION['CheckSpamLogin'] = 1;
        }
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg8'].'", "error");</script>';
    }
    else
    {
        $ketnoi->query("UPDATE users SET ip = '$ip_address' WHERE username = '$username' ");
        $_SESSION['username'] = $username;
        //GHI NHẬT KÝ HOẠT ĐỘNG
        $ketnoi->query("INSERT INTO `log` SET `content` = 'Thực hiện đăng nhập vào hệ thống ! ', `createdate` = now(), `username` = '$username' ");
        die('<script type="text/javascript">swal("Thành Công","Đăng nhập thành công!","success");setTimeout(function(){ location.href = "/" },1000);</script>');
    }
}
?>

