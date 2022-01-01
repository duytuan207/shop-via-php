<?php require_once('../head.php');?>
<title>Nạp Qua Ngân Hàng | <?=$site['site_tenweb'];?></title>
<?php require_once('../sidebar.php');?>
<?php require_once('../cron/AutoVcb.php');?>

<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Nạp Qua Ngân Hàng</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Nạp Tiền</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Ngân Hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">NẠP TIỀN QUA NGÂN HÀNG</h4>
                        <p class="mb-30">Nạp tiền tự động qua tài khoản ngân hàng</p>
                    </div>
                    <?php if(isset($curl_vcb)) { ?>
                    <div class="pull-right">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary" name="btnAutoVcb">XÁC NHẬN TÔI ĐÃ CHUYỂN TIỀN</button>
                        </form>
                    </div>
                    <?php }?>
                </div>
            <!-- Default Basic Forms Start -->
            <div class="row">
                <?php
$result = $ketnoi->query("SELECT * FROM `bank` ORDER BY id desc");
while($row = $result->fetch_assoc() ){ ?>
                <div class="col-md-12 col-sm-12">
                    <div class="pd-20 card-box mb-30">
                        <div class="clearfix">
                            <div class="pull-left">
                                <h4 class="text-blue h4"><?=$row['name'];?></h4>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Số tài khoản:</label>
                            <div class="col-sm-12 col-md-10">
                                <b style="color: blue;" id="copy_<?=$row['stk'];?>"><?=$row['stk'];?></b> <a
                                    class="copy" data-clipboard-target="#copy_<?=$row['stk'];?>"><i
                                        class="fa fa-copy"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chủ tài khoản:</label>
                            <div class="col-sm-12 col-md-10">
                                <b><?=$row['bank_name'];?></b>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nội dung chuyển tiền:</label>
                            <div class="col-sm-12 col-md-10">
                                <b class="text-danger"
                                    style="border: 2px dashed #e04f1a30; padding: 3px; color: #e53e3e!important;"
                                    id="copyNoiDung_<?=$row['stk'];?>"><?=$site['MEMO_PREFIX'].$user['id'];?></b>
                                <a class="copy" data-clipboard-target="#copyNoiDung_<?=$row['stk'];?>"><i
                                        class="fa fa-copy"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chi nhánh:</label>
                            <div class="col-sm-12 col-md-10">
                                <b style="color:red;"><?=$row['chi_nhanh'];?></b>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ NẠP AUTO</h4>
                </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>MÃ GD</th>
                                <th>MONEY</th>
                                <th>THỜI GIAN</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
$i=0;
$result = mysqli_query($ketnoi,"SELECT * FROM `bank_auto` WHERE `username` = '".$user['username']."' ORDER BY id desc");
while($row = mysqli_fetch_assoc($result))
{
?>
                            <tr>
                                <td>
                                    <?=$i; $i++;?>
                                </td>
                                <td>
                                    <?=$row['tid'];?>
                                </td>
                                <td>
                                    <?=format_cash($row['amount']);?>đ
                                </td>
                                <td>
                                    <?=$row['time'];?>
                                </td>

                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Export Datatable End -->
            <?php require_once('../foot.php');?>