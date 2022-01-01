<title><?=$site['site_tenweb'];?></title>
<div class="mobile-menu-overlay"></div>
<?php require_once('model/Buy.php');?>
<div class="main-container">
    <div class="pd-ltr-20">
        <div class="card-box pd-20 height-100-p mb-30">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <p class="font-18 max-width-600"><?=$site['site_thong_bao'];?></p>
                </div>
            </div>
        </div>
        <!-- multiple select row Datatable start -->
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">DANH SÁCH TÀI KHOẢN</h4>
            </div>
            <div class="pd-20 card-box height-100-p">
                <?php 
                if( isset($_GET['loai']) )
                {
                    $loai = check_string($_GET['loai']);
                    $result = $ketnoi->query("SELECT * FROM `category` WHERE `display` = 'show' AND pin = '$loai' ");
                    echo '<div class="alert alert-primary" role="alert">
                            Đang hiển thị nhóm tài khoản (<b style="color:red;">'.$loai.'</b>).
                        </div>';
                }
                else if( isset($_POST['btnTimTaiKhoan']) )
                {
                    $tukhoa = check_string($_POST['btnTimTaiKhoan']);
                    $result = $ketnoi->query("SELECT * FROM `category` WHERE `display` = 'show' AND `title` LIKE '%".$tukhoa."%' ");
                    echo '<div class="alert alert-warning" role="alert">
                            Đang hiển thị từ khóa liên quan (<b style="color:red;">'.$tukhoa.'</b>).
                        </div>';
                }
                else
                {
                    $result = $ketnoi->query("SELECT * FROM `category` WHERE `display` = 'show'");
                }
                ?>
                <?php require_once('public/Buy.php');?>
            </div>
        </div>
        <?php if($site['gdganday'] == 'ON'){?>
        <div class="card-box mb-30">
            <div class="pd-20">
                <h4 class="text-blue h4">50 GIAO DỊCH GẦN ĐÂY</h4>
                <?php $result = $ketnoi->query("SELECT * FROM `ls_mua` ORDER BY id desc "); ?>
            </div>
            <div class="pd-20 card-box height-100-p">
                <div class="table-responsive">
                    <table class="table hover multiple-select-row nowrap">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Khách Hàng</th>
                                <th>Giao Dịch</th>
                                <th>Thời Gian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
			$i = 0;
			$querryy = $ketnoi->query("SELECT * FROM `ls_mua` ORDER BY id desc limit 50 ");
			while ($row = mysqli_fetch_array($querryy)) 
			{
			?>
                            <tr>
                                <td><?=$i;?></td>
                                <td><?=$row['username'];?></td>
                                <td><?=$row['content'];?></td>
                                <td><span data-toggle="tooltip" data-placement="top" title="Thời gian"
                                        class="badge badge-dark"><?=$row['createdate'];?></span></td>
                            </tr>
                            <?php $i++; }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- multiple select row Datatable End -->
         <?php }?>