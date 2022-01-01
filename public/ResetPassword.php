<?php require_once('../head.php'); ?>
<title>Thay Đổi Mật Khẩu | <?=$site['site_tenweb'];?></title>
<?php 
if(isset($_GET['token']))
{
    $token = check_string($_GET['token']);
    $query = $ketnoi->query("SELECT * FROM users WHERE token = '$token' ");

    if($query->num_rows == 0)
    {
        die('<script type="text/javascript">setTimeout(function(){ location.href = "/" },0);</script>');
    }
}
?>

<body class="login-page" style="background:<?=$site['color'];?>;">
    <?php require_once('../model/ResetPassword.php');?>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/vendors/images/forgot-password.png" alt="">
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center" style="color:<?=$site['color'];?>">Đặt lại mật khẩu</h2>
                        </div>

                        <form action="" method="post">
                            <div class="input-group custom">
                                <input type="text" name="token" value="<?=$token;?>" hidden="">
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="password" class="form-control form-control-lg"
                                    placeholder="New Password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" name="repassword" class="form-control form-control-lg"
                                    placeholder="Confirm New Password">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit"
                                            name="btnChangePass" value="Xác Nhận">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="/vendors/scripts/core.js"></script>
    <script src="/vendors/scripts/script.min.js"></script>
    <script src="/vendors/scripts/process.js"></script>
    <script src="/vendors/scripts/layout-settings.js"></script>
</body>

</html>