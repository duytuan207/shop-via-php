
<?php include('head.php');?>
<?php include('nav.php');?>
<?php
if (isset($_GET['delete'])) 
{
    $delete = $_GET['delete'];
    $create = $ketnoi->query("DELETE FROM `taikhoan` WHERE `id` = '".$delete."' ");
    if ($create)
    {
      echo '<script type="text/javascript">swal("Thành Công","Xóa thành công","success");setTimeout(function(){ location.href = "tai-khoan.php" },500);</script>'; 
    }
    else
    {
      echo '<script type="text/javascript">swal("Thất Bại","Lỗi máy chủ","error");setTimeout(function(){ location.href = "tai-khoan.php" },1000);</script>'; 
    }
}
?>
<?php
if( isset($_POST['btnAddClone']) && isset($_SESSION['admin']) )
{
  $listclone = $_POST['listclone']; 
  $loai = check_string($_POST['loai']);
  $clone = explode(PHP_EOL,$listclone); 
  $countadd = 0;
  $countupdate = 0;
  foreach($clone as $row)
  {
    $row = XoaDauCach($row);
    $get_string_clone = explode("|", $row);
    $check_chung_clone = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `id_fb` = '".$get_string_clone[0]."' ");
    if(mysqli_num_rows($check_chung_clone)  > 0)
    {
      $ketnoi->query("UPDATE `taikhoan` SET 
      `code` = '".$loai."',
      `status` = 'live',
      `ID_BUY` = null,
      `username` = null,
      `createdate` = now(),
      `note` = '".$row."' WHERE `id_fb` = '".$get_string_clone[0]."' ");
      $countupdate++;
    }
    else
    {
      $ketnoi->query("INSERT INTO taikhoan SET 
        code = '$loai',
        status = 'live',
        createdate = now(),
        id_fb = '$get_string_clone[0]',
        note = '$row' ");
      $countadd++;
    }
  }
  echo '<script type="text/javascript">swal("Thành Công","Thêm '.format_cash($countadd).' clone | Cập nhật '.format_cash($countupdate).' clone","success");</script>'; 
}

if( isset($_POST['btnDeleteClone']) && isset($_SESSION['admin']) )
{
  $listclone = $_POST['listclone']; 
  $clone = explode(PHP_EOL,$listclone);
  $count = 0;
  foreach($clone as $row)
  {
    $row = XoaDauCach($row);
    if(explode("|", $row))
    {
      $get_string_clone = explode("|", $row);
      $data = $get_string_clone[0];
    }
    else 
    {
      $data = $row;
    }
    $ketnoi->query("DELETE FROM taikhoan WHERE id_fb = '$data' ");
    $count++;
  }
  echo '<script type="text/javascript">swal("Thành Công","Đã xóa '.format_cash($count).' clone thành công !","success");</script>'; 
}
?>


        <div class="row mb-2">
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DANH SÁCH CLONE</h3>
                <div class="text-right">
                  <button class="btn btn-info" data-toggle="modal" data-target="#modal-default" class="btn btn-info">THÊM TÀI KHOẢN</button>
                  <button class="btn btn-danger" data-toggle="modal" data-target="#xoa_tk" class="btn btn-info">XÓA TÀI KHOẢN</button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">UID</th>
                      <th class="text-center">NHÓM</th>
                      <th class="text-center">STATUS</th>
                      <th class="text-center">THAO TÁC</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 0;
$result = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `username` IS NULL ORDER BY id desc");
while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                      <td class="text-center"><?=$i;?> <?php $i++;?></td>
                      <td class="text-center"><?=$row['id_fb'];?></td>
                      <td class="text-center"><?=$ketnoi->query("SELECT `title` FROM `category` WHERE `code` = '".$row['code']."' ")->fetch_array()['title'];?></td>
                      <td class="text-center">
                        <?php
                          if ($row['status'] == 'die')
                          {
                            echo '<span class="badge bg-danger">DIE</span>';
                          }
                          if ($row['status'] == 'live')
                          {
                            echo '<span class="badge bg-success">LIVE</span>';
                          }
                        ?>
                      </td>
                      <td class="text-center">
                        <a href="tai-khoan.php?delete=<?=$row['id'];?>" class="btn btn-default">
                          <i class="fas fa-trash"></i> Delete
                        </a>
                      </td>  
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                VUI LÒNG THAO TÁC CẨN THẬN
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">THÊM TÀI KHOẢN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post">
          <div class="form-group">
              <label for="exampleInputEmail1">DỊNH DẠNG MỖI DÒNG 1 CLONE:</label>
              <textarea class="form-control" name="listclone" placeholder="ID|PASS|2FA|COOKIE|TOKEN"></textarea>
          </div>
            <div class="form-group">
              <label for="exampleInputEmail1">THỂ LOẠI</label>
              <select class="custom-select"  name="loai" >
                  <?php
                  $result = mysqli_query($ketnoi,"SELECT * FROM `category` ");
                  while ($row1 = mysqli_fetch_array($result) ) { ?>
                  <option value="<?=$row1['code'];?>"><?=$row1['title'];?></option>
                  <?php } ?>
                  </select>
            </div>
            <p>Hệ thống tự cập nhật clone mới nếu trùng ID</p>
            <button type="submit" name="btnAddClone" class="btn btn-primary">ADD</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="xoa_tk">
  <div class="modal-dialog modal-xl ">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">XÓA TÀI KHOẢN</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form" action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">DỊNH DẠNG MỖI DÒNG 1 CLONE:</label>
            <textarea class="form-control" name="listclone" placeholder="UID hoặc TK"></textarea>
         </div>
          <button type="submit" name="btnDeleteClone" class="btn btn-primary">DELETE</button>
        </form>
      </div>
    </div>
  </div>
</div>




<?php include('foot.php');?>