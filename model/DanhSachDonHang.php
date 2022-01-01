<?php
if( isset($_POST['btnDeleteOrder']) && isset($_SESSION['username']) )
{
    $create = $ketnoi->query("UPDATE `orders` SET `display` = 'hide' WHERE `username` = '".$user['username']."' ");
    if($create)
    {
        //GHI NHẬT KÝ HOẠT ĐỘNG
        $ketnoi->query("INSERT INTO `log` SET `content`= 'Thực hiện dọn dẹp lịch sử đơn hàng ! ', `createdate` = now(), `username`= '".$user['username']."' ");
        die('<script type="text/javascript">swal("Thành Công","Dọn dẹp dữ liệu thành công!","success");setTimeout(function(){ location.href = "" },1000);</script>');
    }
    else
    {
        die('<script type="text/javascript">swal("Thất Bại","Vui lòng kết nối với cơ sỡ dữ liệu","warning");setTimeout(function(){ location.href = "" },1000);</script>');
    }
}
?>