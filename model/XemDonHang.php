<?php 
if(isset($_GET['id']))
{
    $id = check_string($_GET['id']);
    $type_0 = '0';
    $type_1 = '1';
    $type_2 = '2';
    $type_3 = '3';
    $type_4 = '4';
    
    $query = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `username` = '".$user['username']."' AND `ID_BUY` = '".$id."' ");
    $query_order = $ketnoi->query("SELECT * FROM `orders` WHERE `username` = '".$user['username']."' AND `ID_BUY` = '".$id."' AND `display` = 'show' ");
    if($query_order->num_rows == 0)
    {
        die('<script type="text/javascript">setTimeout(function(){ location.href = "/" },0);</script>');
    }
    else
    {
        $array = $query_order->fetch_array();
    }

}
?>