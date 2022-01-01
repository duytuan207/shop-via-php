<?php session_start(); ?>
<?php

define("DATABASE", "shopclone");
define("USERNAME", "root");
define("PASSWORD", "");
define("LOCALHOST", "localhost");
$ketnoi = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DATABASE);
$ketnoi->query("set names 'utf8'");
date_default_timezone_set('Asia/Ho_Chi_Minh');


include_once('SMTP/class.smtp.php');
include_once('SMTP/PHPMailerAutoload.php');
include_once('SMTP/class.phpmailer.php');

$_SESSION['session_request'] = time();
$lang = $ketnoi->query("SELECT * FROM lang")->fetch_array();
$site = $ketnoi->query("SELECT * FROM setting")->fetch_array();
$site_favicon = $site['site_favicon'];
$site_tenweb = $site['site_tenweb'];
$site_mota = $site['site_mota'];
$site_tukhoa = $site['site_tukhoa'];
$site_api_card = $site['site_api_card'];
$site_api_momo = $site['site_api_momo'];
$site_baotri = $site['site_baotri'];
$site_ck_card = $site['site_ck_card'];
$site_image = $site['site_image'];
$site_logo = $site['site_logo'];
$site_gmail = $site['site_gmail'];
$site_domain = $site['site_domain'];
$site_sdt_momo = $site['site_sdt_momo'];
$site_gmail_momo = $site['site_gmail_momo'];
$site_ten_momo = $site['site_ten_momo'];
$site_qr_momo = $site['site_qr_momo'];
$site_pass_momo = $site['site_pass_momo'];
$site_noidung_momo = $site['site_noidung_momo'];
$site_show_soluong = $site['site_show_soluong'];
$site_thong_bao = $site['site_thong_bao'];
$site_token = $site['site_token'];
$carousel_1 = $site['carousel_1'];
$carousel_2 = $site['carousel_2'];
$carousel_3 = $site['carousel_3'];
$site_show_carousel = $site['site_show_carousel'];
$site_callback = $site_domain.'/callback.php';
function sendCSM($mail_nhan,$ten_nhan,$chu_de,$noi_dung,$bcc)
{
    global $site_gmail_momo, $site_pass_momo;
        // PHPMailer Modify
        $mail = new PHPMailer();
        $mail->SMTPDebug = 0;
        $mail ->Debugoutput = "html";
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $site_gmail_momo; // GMAIL STMP
        $mail->Password = $site_pass_momo; // PASS STMP
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom($site_gmail_momo, $bcc);
        $mail->addAddress($mail_nhan, $ten_nhan);
        $mail->addReplyTo($site_gmail_momo, $bcc);
        $mail->isHTML(true);
        $mail->Subject = $chu_de;
        $mail->Body    = $noi_dung;
        $mail->CharSet = 'UTF-8';
        $send = $mail->send();
        return $send;
}
if(isset($_SESSION['username']))
{ 
    $my_username = $_SESSION['username'];
    $user = $ketnoi->query("SELECT * FROM users WHERE username = '$my_username' ")->fetch_array();
    if(empty($user['id']))
    {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($user['money'] < 0)
    {
        $ketnoi->query("UPDATE users SET banned = 1 WHERE username = '$my_username' ");
        session_start();
        session_destroy();
        header('location: /');
        die();
    }
}
if (!empty($_SERVER['HTTP_CLIENT_IP']))     
{  
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];  
}  
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
{  
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];  
}  
else  
{  
    $ip_address = $_SERVER['REMOTE_ADDR'];  
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png","jpeg","jpg","PNG","JPEG","JPG","gif","GIF");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip","ZIP");
    if(in_array($ext, $valid_ext))
    {
        return true;
    }
}
function display_banned($data)
{
    if ($data == 1)
    {
        $show = '<span class="badge bg-danger">Banned</span>';
    }
    else if ($data == 0)
    {
        $show = '<span class="badge bg-success">Hoạt động</span>';
    }
    return $show;
}
function display($data)
{
    if ($data == 'hide')
    {
        $show = '<span class="badge bg-danger">ẨN</span>';
    }
    else if ($data == 'show')
    {
        $show = '<span class="badge bg-success">HIỂN THỊ</span>';
    }
    return $show;
}

function TypeNick($data)
{
    $row = array(
        'clone',
        'via',
        'hotmail',
        'yahoo',
        'bm',
        'azure',
        'gmail',
        'aws',
        'zalo',
        'youtube',
        'traodoisub',
        'tuongtaccheo',
        'shopee',
        'yandex',
        'vps',
        'hosting',
        'tiki',
        'lazada',
        'rentcode',
        'textnow',
        'game',
        'garena',
        'riot'
    );

    return $row[$data];
}
function status($data)
{
    if ($data == 'xuly'){
        $show = '<span class="badge badge-info">Đang xử lý</span>';
    }
    else if ($data == 'hoantat'){
        $show = '<span class="badge badge-success">Hoàn tất</span>';
    }
    else if ($data == 'thatbai'){
        $show = '<span class="badge badge-danger">Thất bại</span>';
    }
    else{
        $show = '<span class="badge badge-warning">Khác</span>';
    }
    return $show;
}
function check_string($data)
{
    return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/',' ', $text));
}
function random($string, $int)
{  
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function show_type_value($value)
{
    if ($value == 'none')
    {
        $data = '';
    }
    else if ($value == 0)
    {
        $data = 'ID';
    }
    else if ($value == 1)
    {
        $data = 'PASS';
    }
    else if ($value == 2)
    {
        $data = '2FA';
    }
    else if ($value == 3)
    {
        $data = 'COOKIE';
    }
    else if ($value == 4)
    {
        $data = 'TOKEN';
    }
    else
    {
        $data = 'KHÁC';
    }
    return $data;
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    
    curl_close($ch);
    return $data;
}
function getHeader(){
    $headers = array();
    $copy_server = array(
        'CONTENT_TYPE'   => 'Content-Type',
        'CONTENT_LENGTH' => 'Content-Length',
        'CONTENT_MD5'    => 'Content-Md5',
    );
    foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) === 'HTTP_') {
            $key = substr($key, 5);
            if (!isset($copy_server[$key]) || !isset($_SERVER[$key])) {
                $key = str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', $key))));
                $headers[$key] = $value;
            }
        } elseif (isset($copy_server[$key])) {
            $headers[$copy_server[$key]] = $value;
        }
    }
    if (!isset($headers['Authorization'])) {
        if (isset($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
            $headers['Authorization'] = $_SERVER['REDIRECT_HTTP_AUTHORIZATION'];
        } elseif (isset($_SERVER['PHP_AUTH_USER'])) {
            $basic_pass = isset($_SERVER['PHP_AUTH_PW']) ? $_SERVER['PHP_AUTH_PW'] : '';
            $headers['Authorization'] = 'Basic ' . base64_encode($_SERVER['PHP_AUTH_USER'] . ':' . $basic_pass);
        } elseif (isset($_SERVER['PHP_AUTH_DIGEST'])) {
            $headers['Authorization'] = $_SERVER['PHP_AUTH_DIGEST'];
        }
    }
    return $headers;
}
$MEMO_PREFIX = $site['MEMO_PREFIX'];
function parse_order_id($des){
    global $MEMO_PREFIX;
    $re = '/'.$MEMO_PREFIX.'\d+/im';
    preg_match_all($re, $des, $matches, PREG_SET_ORDER, 0);
    if (count($matches) == 0 )
        return null;
    // Print the entire match result
    $orderCode = $matches[0][0];
    $prefixLength = strlen($MEMO_PREFIX);
    $orderId = intval(substr($orderCode, $prefixLength ));
    return $orderId ;
}
function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^\+?(\d.*){3,}$/', $data, $matches))
    {
        return True;
    }
    else
    {
        return False;
    }
}

?>