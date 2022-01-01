<?php require_once('head.php');?>
<?php require_once('nav.php');?>
<?php
if (isset($_POST["submit"]) && isset($_SESSION['admin']))
{
    
    $create = $ketnoi->query("UPDATE `lang` SET
    `side9` = '".$_POST['side9']."',
    `side8` = '".$_POST['side8']."',
    `side7` = '".$_POST['side7']."',
    `side6` = '".$_POST['side6']."',
    `side5` = '".$_POST['side5']."',
    `side4` = '".$_POST['side4']."',
    `side3` = '".$_POST['side3']."',
    `side2` = '".$_POST['side2']."',
    `side1` = '".$_POST['side1']."',
    `14` = '".$_POST['s14']."',
    `15` = '".$_POST['s15']."',
    `16` = '".$_POST['s16']."',
    `17` = '".$_POST['s17']."',
    `18` = '".$_POST['s18']."',
    `19` = '".$_POST['s19']."',
    `20` = '".$_POST['s20']."',
    `msg13` = '".$_POST['msg13']."',
    `msg12` = '".$_POST['msg12']."',
    `msg11` = '".$_POST['msg11']."',
    `msg10` = '".$_POST['msg10']."',
    `msg9` = '".$_POST['msg9']."',
    `msg8` = '".$_POST['msg8']."',
    `msg7` = '".$_POST['msg7']."',
    `msg6` = '".$_POST['msg6']."',
    `msg5` = '".$_POST['msg5']."',
    `msg4` = '".$_POST['msg4']."',
    `msg3` = '".$_POST['msg3']."',
    `msg2` = '".$_POST['msg2']."',
    `msg1` = '".$_POST['msg1']."' ");

    if ($create)
    {
    echo '<script type="text/javascript">swal("Thành Công","Lưu thành công","success");setTimeout(function(){ location.href = "" },1000);</script>'; 
    die;
    }
    else
    {
    echo '<script type="text/javascript">swal("Thất Bại","Lỗi máy chủ","error");setTimeout(function(){ location.href = "" },1000);</script>'; 
    die;
    }
}

?>
<div class="row mb-2">
    <div class="col-sm-6">

    </div><!-- /.col -->
</div><!-- /.row -->
<form action="" method="post">
    <div class="row">
        <div class="col-md-12">
            <button name="submit" type="submit" class="btn btn-info">LƯU THAY ĐỔI</button>
            <br>
        </div>
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">ĐĂNG KÝ</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg1" placeholder="<?=$lang['msg1'];?>"
                                    value="<?=$lang['msg1'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg2" placeholder="<?=$lang['msg2'];?>"
                                    value="<?=$lang['msg2'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg3" placeholder="<?=$lang['msg3'];?>"
                                    value="<?=$lang['msg3'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg4" placeholder="<?=$lang['msg4'];?>"
                                    value="<?=$lang['msg4'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg5" placeholder="<?=$lang['msg5'];?>"
                                    value="<?=$lang['msg5'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">ĐĂNG NHẬP</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg6" placeholder="<?=$lang['msg6'];?>"
                                    value="<?=$lang['msg6'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg7" placeholder="<?=$lang['msg7'];?>"
                                    value="<?=$lang['msg7'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg8" placeholder="<?=$lang['msg8'];?>"
                                    value="<?=$lang['msg8'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg9" placeholder="<?=$lang['msg9'];?>"
                                    value="<?=$lang['msg9'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">QUÊN MẬT KHẨU</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg10" placeholder="<?=$lang['msg10'];?>"
                                    value="<?=$lang['msg10'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg11" placeholder="<?=$lang['msg11'];?>"
                                    value="<?=$lang['msg11'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg12" placeholder="<?=$lang['msg12'];?>"
                                    value="<?=$lang['msg12'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="msg13" placeholder="<?=$lang['msg13'];?>"
                                    value="<?=$lang['msg13'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">THANH TOÁN</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s14" placeholder="<?=$lang['14'];?>"
                                    value="<?=$lang['14'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s15" placeholder="<?=$lang['15'];?>"
                                    value="<?=$lang['15'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s16" placeholder="<?=$lang['16'];?>"
                                    value="<?=$lang['16'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s17" placeholder="<?=$lang['17'];?>"
                                    value="<?=$lang['17'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s18" placeholder="<?=$lang['18'];?>"
                                    value="<?=$lang['18'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s19" placeholder="<?=$lang['19'];?>"
                                    value="<?=$lang['19'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="s20" placeholder="<?=$lang['20'];?>"
                                    value="<?=$lang['20'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        <div class="col-md-6">
            <br>
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">MENU TRÁI</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side1" placeholder="<?=$lang['side1'];?>"
                                    value="<?=$lang['side1'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side2" placeholder="<?=$lang['side2'];?>"
                                    value="<?=$lang['side2'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side3" placeholder="<?=$lang['side3'];?>"
                                    value="<?=$lang['side3'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side4" placeholder="<?=$lang['side4'];?>"
                                    value="<?=$lang['side4'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side5" placeholder="<?=$lang['side5'];?>"
                                    value="<?=$lang['side5'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side6" placeholder="<?=$lang['side6'];?>"
                                    value="<?=$lang['side6'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side7" placeholder="<?=$lang['side7'];?>"
                                    value="<?=$lang['side7'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side8" placeholder="<?=$lang['side8'];?>"
                                    value="<?=$lang['side8'];?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" name="side9" placeholder="<?=$lang['side9'];?>"
                                    value="<?=$lang['side9'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
        <!-- /.row (main row) -->
</form>
<?php require_once('foot.php');?>