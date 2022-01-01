<?php require_once('../config.php');?>
<?php 
if( isset($_GET['token']) )
{
    $token = check_string($_GET['token']);
    $query = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `username` = '".$user['username']."' AND `ID_BUY` = '".$token."' ");
    $query_order = $ketnoi->query("SELECT * FROM `orders` WHERE `username` = '".$user['username']."' AND `ID_BUY` = '".$token."' ");
    $array = $query_order->fetch_array();
    $clone = '     Đơn hàng: '.$array['title'].' | Số lượng: '.$array['soluong'].' | Giá: '.format_cash($array['money']).'đ';
    while( $row = $query->fetch_assoc() )
    {
        $clone = $clone.PHP_EOL.$row['note'];
    }
    $file = $token.".txt";
    $txt = fopen($file, "w") or die("Unable to open file!");
    fwrite($txt, $clone);
    fclose($txt);
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename='.basename($file));
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    header("Content-Type: text/plain");
    readfile($file);
    unlink($token.'.txt');
}
/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI CMSNT.CO DEV NTTHANH - LH ZALO 0947838128*/
?>