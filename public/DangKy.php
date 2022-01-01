<?php require_once('../head.php'); ?>
<title>Đăng Ký | <?=$site['site_tenweb'];?></title>

<body class="login-page" style="background:<?=$site['color'];?>;">
    <?php require_once('../model/DangKy.php');?>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 col-lg-7">
                    <img src="/vendors/images/register-page-img.png" alt="">
                </div>
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <div class="login-title">
                            <h2 class="text-center" style="color:<?=$site['color'];?>">Đăng Ký Tài Khoản</h2>
                        </div>
                        <form action="" method="POST">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" name="username"
                                    placeholder="Username" required="">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="email" class="form-control form-control-lg" name="email"
                                    placeholder="Email" required="">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy ion-ios-email"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" name="password"
                                    placeholder="Password" required="">
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" name="btnDangKy"
                                            value="Đăng Ký">
                                    </div>
                                    <div class="font-16 weight-600 pt-10 pb-10 text-center" data-color="#707373">OR
                                    </div>
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