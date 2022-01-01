<?php
/* ĐÂY LÀ PHIÊN BẢN OPTION THEO YÊU CẦU*/
$sdt = ''; // Tài khoản Banking
$pass = ''; // PASS Banking
$stk = ''; // STK ngân hàng VCB
$key = '';      // API giải capchat
$domain = ''; // Tên miền Website
$curl_vcb = ''; // VD: http://phanmemmarketing.net/decaptcha.php
/* ĐÂY LÀ PHIÊN BẢN OPTION THEO YÊU CẦU*/









if (isset($_POST['btnAutoVcb']) && $_SESSION['username'])
{
    if(isset($_SESSION['Check_Spam_Vcb']))
    {
        if($_SESSION['Check_Spam_Vcb'] > 50)
        {
            die('<script type="text/javascript">swal("Thất Bại", "Bạn bị cấm sử dụng chức năng này!", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
        }
    }
    else
    {
        $_SESSION['Check_Spam_Vcb'] = 1;
    }
    if(empty($sdt) || empty($pass) || empty($stk) || empty($key) || empty($domain) )
    {
        die('<script type="text/javascript">swal("Thất Bại", "Dữ liệu nhập vào API thiếu, vui lòng liên hệ chủ web.", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
    }
    $dataVcb = json_decode(file_get_contents("$curl_vcb?domain=$domain&sdt=$sdt&stk=$stk&pass=$pass&key=$key"), true);
    if (empty($dataVcb['data']['error']))
    {
        $_SESSION['Check_Spam_Vcb']++;
        foreach ($dataVcb['data'] as $data)
        {
            if ($data['Loai'] == '+')
            {
                $cash =  str_replace(array(',', '.', ' ', 'VND'), array(''), $data['SoTienGhiCo']);
                $SoThamChieu = $data['SoThamChieu'];
                $MoTa = $data['MoTa'];
                $id = parse_order_id($data['MoTa']);
                if (isset($id))
                {
                    $check_username = $ketnoi->query("SELECT * FROM users WHERE id = '$id' ");
                    if($check_username)
                    {
                        $check_code = $ketnoi->query("SELECT * FROM bank_auto WHERE tid = '$SoThamChieu' ");
                        if($check_code->fetch_assoc() == 0)
                        {
                            $array_user = $check_username->fetch_array();
                            $create = $ketnoi->query("INSERT INTO bank_auto SET 
                            `tid` = '$SoThamChieu',
                            `description` = '$MoTa',
                            `amount` = '$cash',
                            `time` = now(),
                            `username` = '".$array_user['username']."' ");
                            if ($create)
                            {
                                $ketnoi->query("INSERT INTO `log` SET 
                                `content`= '+ ".$cash."  lý do: Nạp Bank Auto ".$SoThamChieu." ',
                                `createdate` = now(),
                                `username`= '".$array_user['username']."' ");
                                $ketnoi->query("UPDATE users SET 
                                `money` = `money` + '".$cash."',
                                `total_nap` = `total_nap` + '".$cash."' WHERE `username` = '".$array_user['username']."' ");
                            }
                            die('<script type="text/javascript">swal("Thành Công","Nạp tiền thành công","success");setTimeout(function(){ location.href = "" },2000);</script>');
                            break;
                        }
                    }
                }
                else
                {
                    die('<script type="text/javascript">swal("Thất Bại", "Không tìm thấy giao dịch của bạn!", "warning");setTimeout(function(){ location.href = "" },2000);</script>');
                }
            }
        }
    }
}