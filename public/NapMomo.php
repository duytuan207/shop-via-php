<?php require_once('../head.php');?>
<title>Nạp MOMO | <?=$site['site_tenweb'];?></title>
<?php require_once('../sidebar.php');?>
<?php require_once('../model/NapCard.php');?>

<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Nạp Momo</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Nạp Tiền</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Momo</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">NẠP TIỀN BẰNG MOMO</h4>
                        <p class="mb-30">Nạp tiền qua ví momo tự động</p>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                            role="button">Auto</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Số điện thoại:</label>
                    <div class="col-sm-12 col-md-10">
                        <b style="color: blue;" id="copySDT"><?=$site_sdt_momo;?></b> <a class="copy"
                            data-clipboard-target="#copySDT"><i class="fa fa-copy"></i></a> <a data-toggle="collapse"
                            data-target="#qr"><i class="fa fa-qrcode" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Chủ tài khoản:</label>
                    <div class="col-sm-12 col-md-10">
                        <b><?=$site_ten_momo;?></b>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Nội dung chuyển tiền:</label>
                    <div class="col-sm-12 col-md-10">
                        <b class="text-danger"
                            style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;"
                            id="copyNoiDung"><?=$site['MEMO_PREFIX'].$user['id'];?></b>
                        <a class="copy" data-clipboard-target="#copyNoiDung"><i class="fa fa-copy"></i></a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Thực nhận:</label>
                    <div class="col-sm-12 col-md-10">
                        <b style="color:red;">100%</b>
                    </div>
                </div>
                <div id="qr" class="collapse">
                    <img src="<?=$site_qr_momo;?>" width="100%">
                </div>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ NẠP MOMO</h4>
                </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                                <th>MÃ GD</th>
                                <th>THỰC NHẬN</th>
                                <th>THỜI GIAN</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `momo` WHERE `username` = '".$user['username']."' ORDER BY id desc");
while($row = mysqli_fetch_assoc($result)){ ?>
                            <tr>
                                <td><?=$i;?> <?php $i++;?></td>
                                <td><?=$row['tranId'];?></td>
                                <td><?=format_cash($row['amount']);?>đ</td>
                                <td><span class="badge badge-dark"><?=$row['time'];?></span></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
        </div>


        <?php require_once('../foot.php');?>