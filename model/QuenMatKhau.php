<?php
if(isset($_POST['btnQuenMatKhau']))
{
    $email = check_string($_POST['email']);
    $get_token = random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', '32');
    $query = $ketnoi->query("SELECT * FROM users WHERE email = '$email' ");
    if ($email == "") 
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg10'].'", "error");</script>';
    }
    else if(strlen($email) < 5)
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg11'].'", "error");</script>';
    }
    else if($query->num_rows == 0)
    {
        echo '<script type="text/javascript">swal("Thất Bại", "'.$lang['msg12'].'", "error");</script>';
    }
    else
    {
        $ketnoi->query("UPDATE `users` SET `token` = '".$get_token."' WHERE `email` = '".$email."' ");
        $guitoi = $email;   
        $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
        $bcc = $site_tenweb;
        $hoten ='Client';
        $noi_dung = '<h3>Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhấn vào liên kết dưới đây để xác minh</h3>
        <table >
        <tbody>
        <tr>
        <td>Liên Kết Xác Minh:</td>
        <td><b style="color:blue;"><a href="'.$_SERVER['HTTP_HOST'].'/reset-password/'.$get_token.'">'.$_SERVER['HTTP_HOST'].'/reset-password/'.$get_token.'</a></b></td>
        </tr>
        </tbody>
        </table>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
        die('<script type="text/javascript">swal("Thành Công","'.$lang['msg13'].'","success");
        setTimeout(function(){ location.href = "" },3000);</script>');
    }
}
?>