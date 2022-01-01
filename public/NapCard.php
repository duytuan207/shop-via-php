<?php require_once('../head.php');?>
<title>Nạp Thẻ | <?=$site['site_tenweb'];?></title>
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
                            <h4>Nạp Thẻ Cào</h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Nạp Tiền</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Thẻ Cào</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-blue h4">NẠP THẺ</h4>
                        <p class="mb-30">Nạp tiền qua thẻ cào tự động</p>
                    </div>
                    <div class="pull-right">
                        <a href="#" class="btn btn-primary btn-sm scroll-click" rel="content-y" data-toggle="collapse"
                            role="button">Auto</a>
                    </div>
                </div>
                
                <form action="" method="POST">
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nhập seri:</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="seri" placeholder="10006139342354">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Nhập mã thẻ:</label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="pin" placeholder="313036630666891">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Loại thẻ:</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="loaithe" required="">
                                <option value="">Chọn loại thẻ *</option>
                                <option value="Viettel">Viettel</option>
                                <option value="Vinaphone">Vinaphone</option>
                                <option value="Mobifone">Mobifone</option>
                                <option value="Zing">Zing</option>
                                <option value="Vietnamobile">Vietnamobile</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Mệnh giá:</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="menhgia" id="menhgia" required="">
                                <option value="">Chọn mệnh giá *</option>
                                <option value="10000">10.000</option>
                                <option value="20000">20.000</option>
                                <option value="30000">30.000</option>
                                <option value="50000">50.000</option>
                                <option value="100000">100.000</option>
                                <option value="200000">200.000</option>
                                <option value="300000">300.000</option>
                                <option value="500000">500.000</option>
                                <option value="1000000">1.000.000</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Thực nhận:</label>
                        <div class="col-sm-12 col-md-10">
                            <b id="ketqua" style="color:red;">0</b>
                        </div>
                    </div>
                    <div class="form-group row">
                        <button type="submit" name="btnNapCard" class="btn btn-success btn-lg btn-block">Nạp
                            Ngay</button>
                    </div>
                </form>
            </div>
            <!-- Export Datatable start -->
            <div class="card-box mb-30">
                <div class="pd-20">
                    <h4 class="text-blue h4">LỊCH SỬ NẠP THẺ</h4>
                </div>
                <div class="pd-20 card-box height-100-p">
                    <table class="table hover multiple-select-row data-table-export nowrap">
                        <thead>
                            <tr>
                                <th class="table-plus datatable-nosort">STT</th>
                                <th>SERI</th>
                                <th>PIN</th>
                                <th>LOẠI THẺ</th>
                                <th>MỆNH GIÁ</th>
                                <th>THỰC NHẬN</th>
                                <th>THỜI GIAN</th>
                                <th>TRẠNG THÁI</th>
                                <th>GHI CHÚ</th>
                            </tr>
                        </thead>
                        <tbody>
<?php
$i = 0;
$result = $ketnoi->query("SELECT * FROM `cards` WHERE `username` = '".$user['username']."' ORDER BY id desc ");
while( $row = $result->fetch_assoc() ){
?>
                            <tr>
                                <td><?=$i;?> <?php $i++;?></td>
                                <td><?=$row['seri'];?></td>
                                <td><?=$row['pin'];?></td>
                                <td><span class="badge badge-danger"><?=$row['loaithe'];?></span></td>
                                <td><?=format_cash($row['menhgia']);?></td>
                                <td><?=format_cash($row['thucnhan']);?></td>
                                <td><span class="badge badge-dark"><?=$row['createdate'];?></span></td>
                                <td><?=status($row['status']);?></td>
                                <td><?=$row['note'];?></td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- Export Datatable End -->
        </div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript">
$('#menhgia').on('change', function() {
    var menhgia = $('#menhgia').val();
    var ck = <?=$site_ck_card;?>;
    var ketqua = menhgia - menhgia * ck / 100;
    $('#ketqua').html(ketqua.toString().replace(/(.)(?=(\d{3})+$)/g, '$1,'));


});
</script>
<?php require_once('../foot.php');?>