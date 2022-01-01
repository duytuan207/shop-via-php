<?php require_once('../head.php');?>
<title>Chi Tiết Đơn Hàng | <?=$site['site_tenweb'];?></title>
<?php require_once('../sidebar.php');?>
<?php require_once('../model/XemDonHang.php');?>




<div class="mobile-menu-overlay"></div>
<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="title">
                            <h4>Chi tiết đơn hàng #<?=$id;?></h4>
                        </div>
                        <nav aria-label="breadcrumb" role="navigation">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="/history/orders/">Lịch sử đơn hàng</a></li>
                                <li class="breadcrumb-item active" aria-current="page">#<?=$id;?></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Default Basic Forms Start -->
            <div class="pd-20 card-box mb-30">
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li>Loại tài khoản: <b><?=$array['title'];?></b></li>
                            <li>Số lượng: <b style="color: blue;"><?=$array['soluong'];?></b></li>
                            <li>Số tiền: <b style="color: red;"><?=format_cash($array['money']);?>đ</b></li>
                            <li>Người mua: <b><?=$array['username'];?></b></li>
                            <li>Thời gian thanh toán: <b><?=$array['createdate'];?></b></li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <form action="" method="post">
                            <button class="btn btn-info copy" type="button" data-clipboard-target="#copyClone"><i class="icon-copy dw dw-copy"></i> Copy</button>
                            <a class="btn btn-danger" type="button" target="_blank" href="/file/DownloadFile.php?token=<?=$id;?>"><i class="icon-copy dw dw-download"></i> Download</a>
                        </form><br>
                    </div>
                    <?php if ($array['type'] == 'facebook' || $array['type'] == 'clone' || $array['type'] == 'via') { ?>
                    <div class="col-md-12">
                        <br>
                        <form method="post" action="">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="type_0" class="form-control">
                                            <option value="<?=$type_0;?>"><?=show_type_value($type_0);?></option>
                                            <option value="0">ID</option>
                                            <option value="1">PASS</option>
                                            <option value="2">2FA</option>
                                            <option value="3">COOKIE</option>
                                            <option value="4">TOKEN</option>
                                            <option value="none"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="type_1" class="form-control">
                                            <option value="<?=$type_1;?>"><?=show_type_value($type_1);?></option>
                                            <option value="none"></option>
                                            <option value="0">ID</option>
                                            <option value="1">PASS</option>
                                            <option value="2">2FA</option>
                                            <option value="3">COOKIE</option>
                                            <option value="4">TOKEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="type_2" class="form-control">
                                            <option value="<?=$type_2;?>"><?=show_type_value($type_2);?></option>
                                            <option value="none"></option>
                                            <option value="0">ID</option>
                                            <option value="1">PASS</option>
                                            <option value="2">2FA</option>
                                            <option value="3">COOKIE</option>
                                            <option value="4">TOKEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="type_3" class="form-control">
                                            <option value="<?=$type_3;?>"><?=show_type_value($type_3);?></option>
                                            <option value="none"></option>
                                            <option value="0">ID</option>
                                            <option value="1">PASS</option>
                                            <option value="2">2FA</option>
                                            <option value="3">COOKIE</option>
                                            <option value="4">TOKEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <select name="type_4" class="form-control">
                                            <option value="<?=$type_4;?>"><?=show_type_value($type_4);?></option>
                                            <option value="none"></option>
                                            <option value="0">ID</option>
                                            <option value="1">PASS</option>
                                            <option value="2">2FA</option>
                                            <option value="3">COOKIE</option>
                                            <option value="4">TOKEN</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-primary btn-block" type="submit"
                                        name="sapxep_type">SUBMIT</button><br>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php }?>
                    <div class="col-md-12">
                        <br>
                        <textarea id="copyClone" class="form-control" readonly="">
<?php while( $row = $query->fetch_assoc() ){ $show_clone_type = $row['note'];

if (isset($_POST['sapxep_type']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_type_0 = '';
    $show_type_1 = '';
    $show_type_2 = '';
    $show_type_3 = '';
    $show_type_4 = '';
    $type_0 = $_POST['type_0'];
    $type_1 = $_POST['type_1'];
    $type_2 = $_POST['type_2'];
    $type_3 = $_POST['type_3'];
    $type_4 = $_POST['type_4'];
    if($type_0 != 'none')
    {
    $show_type_0 = $get_string_clone[$type_0];
    }
    if($type_1 != 'none')
    {
    $show_type_1 = "|".$get_string_clone[$type_1];
    }
    if($type_2 != 'none')
    {
    $show_type_2 = "|".$get_string_clone[$type_2];
    }
    if($type_3 != 'none')
    {
    $show_type_3 = "|".$get_string_clone[$type_3];
    }
    if($type_4 != 'none')
    {
    $show_type_4 = "|".$get_string_clone[$type_4];
    }
    $show_clone_type = $show_type_0.$show_type_1.$show_type_2.$show_type_3.$show_type_4;
}
if (isset($_POST['idpass']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[0]."|".$get_string_clone[1];
    $show_text_type = 'ID|PASS';
}
else if (isset($_POST['idpasscookie']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[0]."|".$get_string_clone[1]."|".$get_string_clone[3];
    $show_text_type = 'ID|PASS|COOKIE';
}
else if (isset($_POST['idpasstoken']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[0]."|".$get_string_clone[1]."|".$get_string_clone[4];
    $show_text_type = 'ID|PASS|TOKEN';
}
else if (isset($_POST['idpass2fa']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[0]."|".$get_string_clone[1]."|".$get_string_clone[2];
    $show_text_type = 'ID|PASS|2FA';
}
else if (isset($_POST['cookie']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[3];
    $show_text_type = 'COOKIE';
}
else if (isset($_POST['token']))
{
    $get_string_clone = explode("|", $row['note']);
    $show_clone_type = $get_string_clone[4];
    $show_text_type = 'TOKEN';
}
?>
<?=$show_clone_type;?>

<?php }?>
</textarea>
                    </div>
                </div>
            </div>

        </div>








        <?php require_once('../foot.php');?>