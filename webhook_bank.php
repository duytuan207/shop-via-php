<?php
require_once('config.php');
error_reporting(0);
$txtBody = file_get_contents('php://input');
$jsonBody = json_decode($txtBody); //convert JSON into array
if (!$txtBody || !$jsonBody){
    echo "Request thiếu body";
    die();
}
if ($jsonBody->error != 0){
    echo "Có lỗi xay ra ở phía Casso";
    die();
}
$headers = getHeader();
if ( $headers['Secure-Token'] != $site['SECURE_TOKEN'] )
{
    echo("Thiếu Secure Token hoặc secure token không khớp");
    die(); 
}
foreach ($jsonBody->data as $key => $transaction)
{
    $des = $transaction->description;
    $id = parse_order_id($des);
    /*$file = @fopen('log.txt', 'w');
    if ($file)
    {
        $data = "tid => $transaction->tid description => $transaction->description ($id) amount => $transaction->amount wen => $transaction->wen bank_sub_acc_id => $transaction->bank_sub_acc_id cusum_balance => $transaction->cusum_balance".PHP_EOL;
        fwrite($file, $data);
    }*/
    if (isset($id))
    {
        $check_code = $ketnoi->query("SELECT * FROM bank_auto WHERE tid = '$transaction->tid' ");
        $check_username = $ketnoi->query("SELECT * FROM users WHERE id = '$id' ");
        if($check_username)
        {
            $array_user = $check_username->fetch_array();
            if($check_code->fetch_assoc() == 0)
            {
                $create = $ketnoi->query("INSERT INTO bank_auto SET 
                `tid` = '$transaction->tid',
                `description` = '$des',
                `amount` = '$transaction->amount',
                `time` = now(),
                `bank_sub_acc_id` = '$transaction->subAccId',
                `username` = '".$array_user['username']."',
                `cusum_balance` = '$transaction->cusum_balance' ");
                if ($create)
                {
                    $ketnoi->query("INSERT INTO `log` SET 
                    `content`= '+ ".format_cash($transaction->amount)."  lý do: Nạp Bank Auto ".$transaction->tid." ',
                    `createdate` = now(),
                    `username`= '".$array_user['username']."' ");
                    $ketnoi->query("UPDATE users SET 
                    `money` = `money` + '".$transaction->amount."',
                    `total_nap` = `total_nap` + '".$transaction->amount."' WHERE `username` = '".$array_user['username']."' ");
                }
            }
        }
    } 
}
echo "<div>Xử lý hoàn tất</div>";
die();
?>