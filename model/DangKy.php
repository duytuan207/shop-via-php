<?php
if( isset($_GET['ref']) )
{
    $id = check_string($_GET['ref']);
    $row = $ketnoi->query("SELECT * FROM users WHERE id = '$id' ")->fetch_array();
    $_SESSION['ref'] = $row['username'];
    $ref = $_SESSION['ref'];
}
if( isset($_SESSION['ref']) )
{
    $ref = $_SESSION['ref'];
}
else 
{
    $ref = NULL;
}

if(isset($_POST['btnDangKy']))
{
    $username = check_string($_POST['username']);
    $email = check_string($_POST['email']);
    $password = check_string($_POST['password']);
    $password = md5($password);
    $query_username = $ketnoi->query("SELECT * FROM users WHERE username = '$username' ");
    $query_email = $ketnoi->query("SELECT * FROM users WHERE email = '$email' ");
    $query_ip = $ketnoi->query("SELECT * FROM users WHERE ip = '$ip_address' ");
    $code = random('QWERTYUIOPASDFGHJKLZXCVBNM','12');
    if(check_username($username) == False)
    {
        die('<script type="text/javascript">swal("Thất Bại", "Vui lòng nhập Username hợp lệ", "error");setTimeout(function(){ location.href = "" },1000);</script>');
    }
    if(check_email($email) == False)
    {
        die('<script type="text/javascript">swal("Thất Bại", "Vui lòng nhập Email hợp lệ", "error");setTimeout(function(){ location.href = "" },1000);</script>');
    }
    if ($username == "" || $email == "" || $password =="") 
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg1'].'", "error");</script>';
    }
    else if($query_username->num_rows != 0)
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg2'].'", "error");</script>';
    }
    else if($query_email->num_rows != 0)
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg3'].'", "error");</script>';
    }
    else if($query_ip->num_rows > 5)
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg4'].'", "error");</script>';
    }
    else
    {
        $create = $ketnoi->query("INSERT INTO `users` SET 
        `password` = '".$password."',
        `username` = '".$username."',
        `ref` = '$ref',
        `email` = '".$email."',
        `code` = '".$code."',
        `money` = '0',
        `ip` = '".$ip_address."',
        `createdate` = now() ");
        if ($create)
        {
            $_SESSION['username'] = $username;
            die('<script type="text/javascript">swal("Thành Công", "'.$lang['msg5'].'","success");setTimeout(function(){ location.href = "/" },1000);</script>');
        }
    }
}
?>

