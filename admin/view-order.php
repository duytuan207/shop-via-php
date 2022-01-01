
<?php include('head.php');?>
<?php include('nav.php');?>
<style type="text/css">
  .scroll-cards {
  width: 370px;
  height: 100%;
  overflow: auto;

  padding: 20px 0px 5px 0px;
}
.card {
  background-color: white;
  border-radius: 4px;
  margin-top: 8px;
  margin-bottom: 5px;
  padding: 25px 25px 15px 25px;
  transition: 0.3s;
}


.mail-names {
  color: grey;
  font-weight: bold;
  font-size: 15px;
  margin-left: 10px;
}

.mails {
  display: flex;
  align-items: center;
}
.mails > img {
  width: 35px;
  border-radius: 10px;
}
.mail-info {
  margin: 10px 65px;
  margin-left: 0px;
  line-height: 1.7;
  font-weight: 600;
}

</style>
<?php
if (isset($_GET['id'])) 
{
    $id = str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($_GET['id']))));
}
?>
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card card-profile shadow">
            <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
              <div class="d-flex justify-content-between">
                <h2 class="float-left">CHI TIẾT ĐƠN #<?=$id;?></h2>
              </div>
            </div>
<?php $QUERY_ORDERS = $ketnoi->query("SELECT * FROM `orders` WHERE  `ID_BUY` = '".$id."' ");
while($row = mysqli_fetch_array($QUERY_ORDERS))
{?>            
<ul>
<li>Loại tài khoản: <b><?=$row['title'];?></b></li>
<li>Số lượng: <b><?=$row['soluong'];?></b></li>
<li>Số tiền: <b><?=format_cash($row['money']);?></b></li>
<li>Người mua: <b><?=$row['username'];?></b></li>
<li>Thời gian thanh toán: <b><?=$row['createdate'];?></b></li>
</ul>
<?php }?>
          </div>
        </div>
<div class="col-xl-12">
<div class="card card-profile shadow">

<?php 

$QUERY_TAIKHOAN = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `ID_BUY` = '".$id."' ");
while($row = mysqli_fetch_array($QUERY_TAIKHOAN))
{ ?>
<?=$row['note'];?>
<?php }?>
</div>
</div>



    </div>
</div>     

<?php include('foot.php');?>