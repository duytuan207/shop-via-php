
<?php include('head.php');?>
<?php include('nav.php');?>

        <div class="row mb-2">
          <div class="col-sm-6">
         
          </div><!-- /.col -->
        </div><!-- /.row -->
<?php
if (isset($_GET['username'])) 
{
    $usernamer = $_GET['username'];
}

$AADDCC = mysqli_query($ketnoi,"SELECT * FROM `users` WHERE `username` = '".$usernamer."' ");
while ($row = mysqli_fetch_array($AADDCC) ) 
{
  if (isset($_POST["btn_submit"])) 
  {

   
    $fullname = $_POST["fullname"]; 
    $banned = $_POST["banned"]; 
    $level = $_POST["level"];
    $ck = $_POST["ck"]; 


    mysqli_query($ketnoi,"UPDATE `users` SET 
    `banned` = '$banned',
    `level`= '$level',
    `ck` = '$ck',
    `fullname` = '$fullname' WHERE `username` = '".$usernamer."' ");

    mysqli_query($ketnoi,"INSERT INTO `log` SET 
              `content`= 'Thay đổi thông tin tài khoản bởi Admin ".$_SESSION['admin']."',
              `createdate` = now(),
              `username`= '".$row['username']."' ");

    echo '<script type="text/javascript">swal("Thành Công","Save Thành Công","success");
    setTimeout(function(){ location.href = "" },500);</script>';
      
  }

?>
<?php
if(isset($_POST['btn_congtien']))
{
    $sotien = $_POST['sotien'];
    $content = $_POST['content'];


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `money`=`money`+ '$sotien', `total_nap` = `total_nap` + '$sotien' WHERE `username`='".$row['username']."'");

    $create = mysqli_query($ketnoi,"INSERT INTO `log` SET 
              `content`= 'Cộng ".number_format($sotien, 0, '.', '.')." từ ".$_SESSION['admin'].", lý do ".$content."',
              `createdate` = now(),
              `username`= '".$row['username']."' ");

    if ($create)
    {
       echo '<script type="text/javascript">swal("Thành Công","Cộng tiền thành công","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
    }
    else
    {
      echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }       
}
if(isset($_POST['btn_trutien']))
{
    $sotien = $_POST['sotien'];
    $content = $_POST['content'];


    $create = mysqli_query($ketnoi,"UPDATE `users` SET `money`=`money`- '$sotien' WHERE `username`='".$row['username']."'");

    $create = mysqli_query($ketnoi,"INSERT INTO `log` SET 
              `content`= 'Trừ ".number_format($sotien, 0, '.', '.')." từ ".$_SESSION['admin'].", lý do ".$content."',
              `createdate` = now(),
              `username`= '".$row['username']."' ");

    if ($create)
    {
       echo '<script type="text/javascript">swal("Thành Công","Trừ tiền thành công","success");
            setTimeout(function(){ location.href = "" },1000);</script>';
    }
    else
    {
      echo '<script type="text/javascript">swal("Lỗi","Lỗi máy chủ","error");
            setTimeout(function(){ location.href = "" },2000);</script>';
    }
}
?>

<div class="row">

<section class="col-lg-12 connectedSortable">
  
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">THÀNH VIÊN</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" value="<?=$row['username'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Số Dư</label>
                    <input type="text" class="form-control" value="<?php echo number_format($row['money'], 0, '.', '.');?>đ"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ngày Đăng Ký</label>
                    <input type="text" class="form-control" value="<?=$row['createdate'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">IP Đăng Nhập</label>
                    <input type="text" class="form-control" value="<?=$row['ip'];?>"  disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Full Name</label>
                    <input type="text" class="form-control" name="fullname" value="<?=$row['fullname'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Banned</label>
                    <select class="custom-select" name="banned">
                       <option value="<?=$row['banned'];?>">
                      <?php
                      if($row['banned'] == "0"){ echo 'Hoạt động';}
                      if($row['banned'] == "1"){ echo 'Banned';}
                      ?>  
                      </option> 
                          <option value="0">Hoạt động</option>
                          <option value="1">Banned</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Rank (admin = Quản Trị Website)</label>
                    <input type="text" class="form-control" name="level" value="<?=$row['level'];?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chiết Khấu Đại Lý</label>
                    <input type="text" class="form-control" name="ck" value="<?=$row['ck'];?>">
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="btn_submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</section>


<section class="col-lg-6 connectedSortable">
<form class="form-horizontal" action="" method="post">  
<div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">CỘNG TIỀN</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Số Tiền Cộng</label>
                    <input type="number" class="form-control" name="sotien" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ghi chú</label>
                  <textarea name="content" class="form-control"></textarea>
                </div>
                 <div class="card-footer">
                  <button type="submit" name="btn_congtien" class="btn btn-primary">Submit</button>
                </div>
              </div>

              <!-- /.card-body -->
            </div>
</form>            
</section>  

<section class="col-lg-6 connectedSortable">
<form class="form-horizontal" action="" method="post">  
<div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">TRỪ TIỀN</h3>
              </div>
              <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Số Tiền Trừ</label>
                    <input type="number" class="form-control" name="sotien" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Ghi chú</label>
                  <textarea name="content" class="form-control"></textarea>
                </div>
                 <div class="card-footer">
                  <button type="submit" name="btn_trutien" class="btn btn-primary">Submit</button>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</form>
</section>

<section class="col-lg-12 connectedSortable">
<form class="form-horizontal" action="" method="post">  
<div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">LOG</h3>
              </div>
              <div class="card-body">
                <div class="card-body table-responsive p-0">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Content</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
<?php $A12A6 = mysqli_query($ketnoi,"SELECT * FROM `log` WHERE `username` = '".$row['username']."'  ORDER BY id desc limit 0, 1000 ");
while ($row1 = mysqli_fetch_array($A12A6) ) 
{?>
                    <tr>
                      <td><?=$row1['content'];?></td>
                      <td><?=$row1['createdate'];?></td>
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
</form>
</section>



</div>
<?php }?>


<?php include('foot.php');?>