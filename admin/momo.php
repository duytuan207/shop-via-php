
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
                <h3 class="card-title">DANH SÁCH NẠP MOMO</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                <table id="datatable1" class="table table-bordered table-striped">
                  <thead>                  
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">USERNAME</th>
                      <th scope="col">MÃ GD</th>
                      <th scope="col">SDT</th>
                      <th scope="col">TÊN</th>
                      <th scope="col">MONEY</th>
                      <th scope="col">NỘI DUNG</th>

                    </tr>
                  </thead>
                  <tbody>
<?php
$result = mysqli_query($ketnoi,"SELECT * FROM `momo`  ORDER BY id desc");
while($row = mysqli_fetch_assoc($result))
{
?>
                  <tr>
                    <td>
                        <?=$row['id'];?>
                    </td>
                    <td>
                        <?=$row['username'];?>
                    </td>
                    <td>
                        <?=$row['tranId'];?>
                    </td>
                    <td>
                      <?=$row['partnerId'];?>
                    </td>
                    <td>
                        <?=$row['partnerName'];?>
                    </td>
                     <td>
                        <?=$row['amount'];?>đ
                    </td>
                    <td>
                        <?=$row['comment'];?>
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