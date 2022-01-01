<?php require_once('../head.php');?>
<title>Danh Sách Đơn Hàng | <?=$site['site_tenweb'];?></title>
<?php require_once('../sidebar.php');?>
<?php require_once('../model/DanhSachDonHang.php');?>
<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Lịch sử đơn hàng</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lịch sử đơn hàng</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ ĐƠN HÀNG</h4>
                </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                                <th>MÃ GD</th>
                                <th>TÀI KHOẢN</th>
                                <th>LOẠI</th>
                                <th>SỐ LƯỢNG</th>
                                <th>GIÁ</th>
                                <th>THỜI GIAN</th>
                                <th>THAO TÁC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
$i = 0;
$querryy = $ketnoi->query("SELECT * FROM `orders` WHERE `username` = '".$user['username']."' AND `display` = 'show' ORDER BY id desc ");
while ($row = mysqli_fetch_array($querryy)) 
{
?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><span class="badge badge-light"><a
                                            href="/order/view/<?=$row['ID_BUY'];?>/"><?=$row['ID_BUY'];?></a></span>
                                </td>
                                <td><a href="/order/view/<?=$row['ID_BUY'];?>/"><b><?=$row['title'];?></b></a></td>
                                <td><span class="badge badge-warning"><b><?=$row['type'];?></b></span></td>
                                <td><span class="badge badge-info"><b><?=$row['soluong'];?></b></span></td>
                                <td><span class="badge badge-danger"><?=format_cash($row['money']);?>đ</span></td>
                                <td><span class="badge badge-dark"><?=$row['createdate'];?></span></td>
                                <td>
                                    <a type="button" href="/order/view/<?=$row['ID_BUY'];?>/" class="btn btn-primary"><i
                                            class="icon-copy dw dw-magnifying-glass"></i> XEM</a>
                                    <a type="button" target="_blank"
                                        href="/file/DownloadFile.php?token=<?=$row['ID_BUY'];?>"
                                        class="btn btn-danger"><i class="icon-copy dw dw-download"></i> DOWNLOAD</a>
                                </td>
                            </tr>

                            <?php 
$i++; 
}?>
                        </tbody>
                    </table>
                    <button type="button" data-toggle="modal" data-target="#modal-delete" class="btn"
                        data-bgcolor="#bd081c" data-color="#ffffff"><i class="icon-copy dw dw-delete-3"></i> DỌN
                        DẸP</button>
                </div>
            </div>
            <!-- Export Datatable End -->
        </div>

        <div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center font-18">
                        <h4 class="padding-top-30 mb-30 weight-500">Bạn có đồng ý dọn dẹp hết lịch sử giao dịch không?
                        </h4>
                        <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                            <div class="col-6">
                                <form action="" method="post">
                                    <button type="submit"
                                        class="btn btn-primary border-radius-100 btn-block confirmation-btn"
                                        name="btnDeleteOrder"><i class="fa fa-check"></i></button>
                                    OK
                                </form>
                            </div>
                            <div class="col-6">
                                <button type="button"
                                    class="btn btn-secondary border-radius-100 btn-block confirmation-btn"
                                    data-dismiss="modal"><i class="fa fa-times"></i></button>
                                CANCEL
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php require_once('../foot.php');?>