
<?php include('head.php');?>
<?php include('nav.php');?>



        <div class="row mb-2">
          <div class="col-sm-6">
  
          </div><!-- /.col -->
        </div><!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DANH SÁCH NẠP THẺ CÀO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th class="text-center">STT</th>
                      <th class="text-center">CODE</th>
                      <th class="text-center">USERNAME</th>
                      <th class="text-center">TYPE</th>
                      <th class="text-center">MỆNH GIÁ</th>
                      <th class="text-center">THỰC NHẬN</th>
                      <th class="text-center">SERI</th>
                      <th class="text-center">PIN</th>
                      <th class="text-center">CREATE</th>
                      <th class="text-center">NOTE</th>
                      <th class="text-center">STATUS</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$i = 0;
$result = mysqli_query($ketnoi,"SELECT * FROM `cards` ORDER BY id desc");
while($row = mysqli_fetch_assoc($result))
{
?>
                    <tr>
                      <td class="text-center"><?=$i; $i++;?></td>
                      <td class="text-center"><?=$row['code'];?></td>
                      <td class="text-center"><?=$row['username'];?></td>
                      <td class="text-center"><?=$row['loaithe'];?></td>
                      <td class="text-center"><?=$row['menhgia'];?></td>
                      <td class="text-center"><?=$row['thucnhan'];?></td>
                      <td class="text-center"><?=$row['seri'];?></td>
                      <td class="text-center"><?=$row['pin'];?></td>
                      <td class="text-center"><?=$row['createdate'];?></td>
                      <td class="text-center"><?=$row['note'];?></td>
                      <td class="text-center">
                        <?php
                          if ($row['status'] == 'xuly')
                          {
                            echo '<span class="badge bg-primary">ĐANG XỬ LÝ</span>';
                          }
                          if ($row['status'] == 'thatbai')
                          {
                            echo '<span class="badge bg-danger">THẤT BẠI</span>';
                          }
                          if ($row['status'] == 'thanhcong')
                          {
                            echo '<span class="badge bg-success">THÀNH CÔNG</span>';
                          }
                        ?>
                        
                      </td>
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
     
<?php include('foot.php');?>