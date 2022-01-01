<?php require_once('../head.php'); ?>
<title>Quên Mật Khẩu | <?=$site['site_tenweb'];?></title>

<body class="login-page" style="background:<?=$site['color'];?>;">
    <?php require_once('../model/QuenMatKhau.php');?>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <img src="/vendors/images/forgot-password.png" alt="">
                </div>
                <div class="col-md-6">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center" style="color:<?=$site['color'];?>">Quên mật khẩu</h2>
                        </div>
                       
                        <form action="" method="POST">
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email" placeholder="Email" required="">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="fa fa-envelope-o"
                                            aria-hidden="true"></i></span>
                                </div>
                            </div>
                            <div class="row align-items-center">
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="btnQuenMatKhau" value="Xác Nhận">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="font-16 weight-600 text-center" data-color="#707373">OR</div>
                                </div>
                                <div class="col-5">
                                    <div class="input-group mb-0">
                                        <a class="btn btn-outline-primary btn-lg btn-block" href="/login/">Đăng Nhập</a>
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