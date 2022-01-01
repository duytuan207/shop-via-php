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
                <h3 class="card-title">DANH SÁCH ĐƠN HÀNG</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th class="text-center">ID</th>
                      <th class="text-center">USERNAME</th>
                      <th class="text-center">ID_BUY</th>
                      <th class="text-center">SỐ LƯỢNG</th>
                      <th class="text-center">TỔNG TIỀN</th>
                      <th class="text-center">THỜI GIAN</th>
                    </tr>
                  </thead>
                  <tbody>
<?php
$result = mysqli_query($ketnoi,"SELECT * FROM `orders` ORDER BY id desc ");
while($row = mysqli_fetch_assoc($result))
{
?>
                    <tr>
                      <td class="text-center"><?=$row['id'];?></td>
                      <td class="text-center"><a href="edit-thanh-vien.php?username=<?=$row['username'];?>"><?=$row['username'];?></a></td>
                      <td class="text-center"><a href="view-order.php?id=<?=$row['ID_BUY'];?>"><?=$row['ID_BUY'];?></a></td>
                      <td class="text-center"><?=format_cash($row['soluong']);?></td>
                      <td class="text-center"><?=format_cash($row['money']);?>đ</td>
                      <td class="text-center"><?=$row['createdate'];?></td> 
                    </tr>
<?php }?>
                  </tbody>
                </table>
              </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->

<?php include('foot.php');?>