<?php
if(isset($_POST['btnNapCard']) && isset($_SESSION['username']))
{
    $loaithe = check_string($_POST['loaithe']);
    $menhgia = check_string($_POST['menhgia']);
    $seri = check_string($_POST['seri']);
    $pin = check_string($_POST['pin']);
    $code = random('qwertyuiopasdfghjklzxcvbnm1234567890QWERTYUIOPASDFGHJKLZXCVBNM', 12);
    $thucnhan = $menhgia - $menhgia * $site['site_ck_card'] / 100;
    if (strlen($seri) < 5 || strlen($pin) < 5)
    {
        echo '<script type="text/javascript">swal("Thất Bại","Mã thẻ hoặc seri không đúng định dạng!","error");</script>';
    }
    else
    {
        $json = json_decode(curl_get('https://card2406.tk/api/card-auto.php?auto=true&type='.$loaithe.'&menhgia='.$menhgia.'&seri='.$seri.'&pin='.$pin.'&APIKey='.$site['site_api_card'].'&callback='.$site_callback.'&content='.$code), true);
        if (isset($json['data']))
        {
            if ($json['data']['status'] == 'error')
            {
                echo '<script type="text/javascript">swal("Thất Bại","'.$json['data']['msg'].'","error");</script>';
            }
            else if ($json['data']['status'] == 'success')
            {
              $create = $ketnoi->query("INSERT INTO `cards` SET 
              `code` = '".$code."',
              `seri` = '".$seri."',
              `pin` = '".$pin."',
              `loaithe` = '".$loaithe."',
              `menhgia` = '".$menhgia."',
              `thucnhan` = '".$thucnhan."',
              `username` = '".$my_username."',
              `status` = 'xuly',
              `note` = '',
              `createdate` = now() ");
              if($create)
              {
                die('<script type="text/javascript">swal("Thành Công","'.$json['data']['msg'].'","success");setTimeout(function(){ location.href = "" },1000);</script>');
              }
              else
              {
                echo '<script type="text/javascript">swal("Thất Bại","Không thẻ lưu card vào data!","error");</script>';
              }
            }
        }
    }
}
/*MÃ NGUỒN ĐƯỢC PHÁT TRIỂN BỞI CMSNT.CO DEV NTTHANH - LH ZALO 0947838128*/
?>