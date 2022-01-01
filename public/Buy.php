<div class="list-group">
    <div class="row">
        <?php while ($row = mysqli_fetch_array($result)) { ?>
        <?php $clone_conlai = mysqli_fetch_assoc($ketnoi->query("SELECT COUNT(*) FROM `taikhoan` WHERE `code` = '".$row['code']."' AND `username` IS NULL AND `status` = 'live' ")) ['COUNT(*)'];?>
        <?php $clone_daban = mysqli_fetch_assoc($ketnoi->query("SELECT COUNT(*) FROM `taikhoan` WHERE `code` = '".$row['code']."' AND `username` IS NOT NULL ")) ['COUNT(*)'];?>
        <div class="col-lg-4 col-md-6 col-sm-12 mb-30">
            <a class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="row">
                    <div class="col-lg-12">
                        <h5 class="mb-1 h5"><?=$row['title'];?> <i class="icon-copy dw dw-question"
                                data-toggle="tooltip" data-placement="top" title="<?=$row['badge'];?>"></i></h5>
                        <div class="pb-1">
                            <small class="weight-600" data-toggle="tooltip" data-placement="top"
                                title="Loại tài khoản">Loại: <?=$row['pin'];?></small>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="mb-1 font-14" data-toggle="tooltip" data-placement="top" title="Đơn giá"><span
                                class="badge badge-lg badge-danger">Giá:
                                <?=format_cash($row['money']);?>đ</span>
                        </p>
                        <?php if($site['site_show_soluong'] == 'ON'){ ?>
                        <p class="mb-1 font-14" data-toggle="tooltip" data-placement="top" title="Số lượng còn lại">
                            <span class="badge badge-lg badge-light ">Số Lượng:
                                <b style="color:red;"><?=format_cash($clone_conlai);?></b> tài khoản</span>
                        </p>
                        <?php }?>
                        <?php if($site['display_daban'] == 'ON'){ ?>
                        <p class="mb-1 font-14" data-toggle="tooltip" data-placement="top" title="Số lượng đã bán">
                            <span class="badge badge-lg badge-light ">Đã Bán:
                                <b style="color:red;"><?=format_cash($clone_daban);?></b> tài khoản</span>
                        </p>
                        <?php }?>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" data-toggle="modal" data-target="#modal_<?=$row['code'];?>"
                            class="btn btn-primary"><i class="icon-copy dw dw-shopping-cart2"></i> MUA
                            NGAY</button>
                    </div>
                </div>
            </a>
        </div>
        <div class="modal fade" id="modal_<?=$row['code'];?>" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <form method="post" action="" id="formMua<?=$row['code'];?>">
                            <h3 class="text-center"><?=$row['title'];?></h3>
                            <br>
                            <?php if($row['note'] != ''){?>
                            <div class="alert alert-info">
                                <?=$row['note'];?>
                            </div>
                            <?php }?>
                            <input type="text" value="<?=$row['code'];?>" name="code" hidden="">
                            <input type="text" value="<?=$row['pin'];?>" name="loai" hidden="">
                            <label>Số lượng cần mua: </label>
                            <div class="input-group custom">
                                <input type="number" id="soluong_<?=$row['code'];?>" name="soluong"
                                    class="form-control form-control-lg" placeholder="Nhập số lượng cần mua" required>
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-question"
                                            data-toggle="tooltip" data-placement="top"
                                            title="<?=$row['badge'];?>"></i></span>
                                </div>
                            </div>
                            <button type="submit" id="btnBuy<?=$row['code'];?>" name="btnBuy"
                                class="btn btn-danger">Thanh
                                toán</button>
                            <button type="button" id="btnDong<?=$row['code'];?>" class="btn btn-secondary"
                                data-dismiss="modal">Đóng</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="swal2-footer" style="display: flex;">
                            Tổng tiền cần thanh <span class="font-weight-bold"><b
                                    id="ketqua_<?=$row['code'];?>">0</b>đ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $('#soluong_<?=$row['code'];?>').keyup(function() {
            var soluong = $("#soluong_<?=$row['code'];?>").val();
            var ketqua1 = <?=$row['money'];?> * soluong;
            var ketqua = ketqua1 - ketqua1 * <?=$user['ck'];?> / 100;
            $('#ketqua_<?=$row['code'];?>').html(ketqua.toString().replace(
                /(.)(?=(\d{3})+$)/g, '$1,'));
        });
        $(document).ready(function($) {
            $('#formMua<?=$row['code'];?>').on('submit', function(evt) {
                $('#btnDong<?=$row['code'];?>').html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Đang check live!'
                ).prop('disabled', true);
                $('#btnBuy<?=$row['code'];?>').hide();
            });
        });
        </script>
        <?php }?>
    </div>
</div>