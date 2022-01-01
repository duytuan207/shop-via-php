
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
    <button class="btn btn-outline-danger btn-block" type="button" onclick="myFunction()" onmouseout="outFunc()">Sao chép toàn bộ</button><br>
    <textarea id="myInput" rows="100%" cols="100%" class="form-control" readonly="">
<?php 
$QUERY_TAIKHOAN = $ketnoi->query("SELECT * FROM `taikhoan` WHERE `code` = '$id' AND `username` IS NULL ");
while($row = mysqli_fetch_array($QUERY_TAIKHOAN))
{ ?>
<?=$row['note'];?>

<?php }?>
</textarea>
  </div>
</div>



    </div>
</div>     

<script>
function myFunction() {
var copyText = document.getElementById("myInput");
copyText.select();
copyText.setSelectionRange(0, 99999);
document.execCommand("copy");

var tooltip = document.getElementById("myTooltip");
tooltip.innerHTML = "Copied: " + copyText.value;
}

function outFunc() {
var tooltip = document.getElementById("myTooltip");
tooltip.innerHTML = "Copy to clipboard";
}
</script>
<?php include('foot.php');?>