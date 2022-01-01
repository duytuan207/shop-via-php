<?php 
if( isset($_POST['btnBuy']) && isset($_POST['code']) && isset($_POST['loai']) && isset($_SESSION['username']) )
{
    $soluong = check_string($_POST['soluong']);
    $code = check_string($_POST['code']);
    $loai = check_string($_POST['loai']);
    if (!isset($_SESSION['username']))
	{
        die('<script type="text/javascript">swal("Thất Bại", "'.$lang['14'].'", "error");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    if ($soluong <= 0) 
	{
		die('<script type="text/javascript">swal("Thất Bại", "'.$lang['15'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    if ($soluong > 10000) 
	{
		die('<script type="text/javascript">swal("Thất Bại", "'.$lang['16'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    $query_taikhoan = $ketnoi->query("SELECT * FROM taikhoan WHERE `code` = '$code' AND `status` = 'live' AND `ID_BUY` is null ");
    $query_category = $ketnoi->query("SELECT * FROM category WHERE code = '$code' AND display = 'show' ");
    if ($query_category->num_rows <= 0)
	{
		die('<script type="text/javascript">swal("Thất Bại", "'.$lang['17'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
	if ($query_taikhoan->num_rows < $soluong)
	{
		die('<script type="text/javascript">swal("Thất Bại", "'.$lang['18'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    $category_array = $query_category->fetch_array();
    $total_money = $category_array['money'] * $soluong;
    $total_money = $total_money - $total_money * $user['ck'] / 100;
    if ($user['money'] < $total_money)
	{
		die('<script type="text/javascript">swal("Thất Bại", "'.$lang['19'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    else
    {
        if($category_array['pin'] == 'facebook' || $category_array['pin'] == 'clone' || $category_array['pin'] == 'via' )
        {
            $i = 0;
            while ($row = $query_taikhoan->fetch_assoc()) 
            {
                if($i < $soluong)
                {
                    $json = json_decode(curl_get("https://graph.facebook.com/".$row['id_fb']."/picture?redirect=false"), true);
                    if(empty($json['data']['height']) || empty($json['data']['width']))
                    {
                        $ketnoi->query("UPDATE `taikhoan` SET `status` =  'die' WHERE `username` IS NULL AND `id` = '".$row['id']."' AND `code` = '".$row['code']."' ");
                        $ketnoi->query("INSERT INTO `log_die` SET `uid` = '".$row['id_fb']."', `loai` = '".$category_array['title']."', `createdate` = now() ");
                    }
                    else
                    {
                        $i++;
                    }
                }
            }
        }
        else
        {
            $i = $soluong;
        }
        if($i >= $soluong)
        {
            if ($user['money'] < 0)
            {
                $ketnoi->query("UPDATE `users` SET `banned` = 1 WHERE `username` = '".$user['username']."' ");
                session_start();
                session_destroy();
                header('location: /');
                echo '<script type="text/javascript">setTimeout(function(){ location.href = "" },0);</script>';
                die();
            }
            $ID_BUY = random('QWERTYUIOPASDFGHJKLZXCVBNM0123456789', 12);
            $ketnoi->query("UPDATE `users` SET 
            `money` =  `money` - '".$total_money."'
            WHERE `username` =  '".$user['username']."' ");// Trừ Tiền User
            $ketnoi->query("UPDATE `taikhoan` SET 
            `username` =  '".$user['username']."',
            `ID_BUY` = '".$ID_BUY."',
            `createdate` = now()
            WHERE `username` IS NULL AND `code` = '".$code."' AND `status` = 'live' LIMIT ".$soluong." "); // UPDATE CHỦ CLONE
            $ketnoi->query("INSERT INTO `orders` SET 
            `username`= '".$user['username']."',
            `title`= '".$category_array['title']."',
            `soluong`= '".$soluong."',
            `type` = '".$category_array['pin']."',
            `money`= '".$total_money."',
            `ID_BUY`= '".$ID_BUY."',
            `createdate` = now() ");// Tạo Đơn Hàng
            $ketnoi->query("INSERT INTO `log` SET 
            `content`= 'Mua ".$soluong." tài khoản ".$category_array['title']." với giá ".format_cash($total_money)."đ. ',
            `createdate` = now(),
            `username`= '".$user['username']."' ");
            $content = 'Vừa mua '.$soluong.' tài khoản '.$category_array['title'].' với giá '.format_cash($total_money).'đ';
            $username = substr($user['username'], 0, 3).'*****';
            $ketnoi->query("INSERT INTO ls_mua SET username = '$username', content = '$content', createdate = now() ");
            
            #SYSTEM CỘNG TÁC VIÊN
            if($site['ck_ref'] > 0)
            {
                if(isset($user['ref']))
                {
                    $money_ref = $total_money * $site['ck_ref'] / 100;
                    $ketnoi->query("UPDATE `users` SET 
                    `money` =  `money` + '".$money_ref."'
                    WHERE `username` =  '".$user['ref']."' ");
                    $ketnoi->query("INSERT INTO `log` SET 
                    `content`= 'Cộng ".format_cash($money_ref)."đ hoa hồng từ khách hàng ".$user['username']." ',
                    `createdate` = now(),
                    `username`= '".$user['ref']."' ");
                }
            }
            die('<script type="text/javascript">swal("Thành Công","Thanh toán thành công '.$soluong.' '.$category_array['title'].' với giá '.$total_money.'đ","success");setTimeout(function(){ location.href = "/order/view/'.$ID_BUY.'/" },2000);</script>');
        }
        else
        {
            die('<script type="text/javascript">swal("Thất Bại", "'.$lang['20'].'", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
        }
    }
}
?>



