<?php
$tintuc = new tintuc();
$idUser = $_SESSION['idUser'];
$showInfor = $tintuc->showInfor($idUser);
?>
<div class="container" style="background-color: white">
   <h1>Thông tin người dùng</h1>
   <hr>
   <div class="row">
    <div class="col-md-12 personal-info">
        <form action="index.php?p=profile" method="post">
            <?php
            foreach ($showInfor as $key => $value) {
                ?>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Họ và Tên:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="<?php echo $value['HoTenUser']; ?>" 
                        name="hoten">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Tên đăng nhập:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="<?php echo $value['UserName']; ?>"
                        name="tendangnhap" readonly="true">
                    </div>
                </div>


                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Địa chỉ:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="<?php echo $value['DiaChi']; ?>" 
                        name="diachi">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Số điện thoại:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="<?php echo $value['DienThoai']; ?>"
                        name="sdt">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Email:</label>
                    <div class="col-lg-12">
                        <input class="form-control" type="text" value="<?php echo $value['Email']; ?>"
                        name="email" readonly="true">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Ngày sinh:</label>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" value="<?php echo $value['NgaySinh']; ?>" 
                        name="ngaysinh">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Ngày đăng ký:</label>
                    <div class="col-lg-3">
                        <input class="form-control" type="date" value="<?php echo $value['NgayDangKi']; ?>"
                         name="ngaydangki" readonly="true">
                    </div>
                </div>
                <div>
                    <label label-default="" class="col-lg-3 control-label label-default">Giới tính:</label>
                    <div class="col-lg-12">
                        <?php
                        if($value['GioiTinh']==1)
                        {
                            ?>
                            <label class="radio-inline"><input type="radio" name="gioitinh" value="1" 
                                checked="checked">Nam</label>
                            <label class="radio-inline"><input type="radio" name="gioitinh" value="0" 
                            >Nữ</label>
                            <?php
                        }
                        else
                        {
                             ?>
                            <label class="radio-inline"><input type="radio" name="gioitinh" value="1" 
                             >Nam</label>
                            <label class="radio-inline"><input type="radio" name="gioitinh" value="0" 
                            checked="checked">Nữ</label>
                            <?php
                            }
                            ?>
                    </div>
                </div>
                <div class="form-group">
                        <label label-default="" class="col-md-3 control-label label-default"></label>
                    <div class="col-md-12">
                        <!--<button type="button" class="btn btn-primary"
                        data-toggle="modal" data-target="#confirmDelete" name="btnCapNhat">Cập nhật thông tin 
                         </button>                         
              <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                      <h4 class="modal-title">Xác nhận </h4>
                    </div>
                    <div class="modal-body">
                      <p>Bạn có chắc chắn muốn xóa ?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
                      <a href="trangchu.php?table=tintuc&thaotac=xoa&idTinTuc=<?php echo $value['idTinTuc'];?>"  class="btn btn-danger" id="confirm">Xóa</a>
                    </div>
                  </div>
                </div>
              </div>-->
                        <input type="submit" name="btnCapNhat" class="btn btn-primary" value="Cập nhật thông tin">
                        <a href="index.php?p=doimk">
                            <input type="button" name="btnDoiMK" class="btn btn-warning" value="Thay đổi mật khẩu">
                        </a>
                         <input type="reset" class="btn btn-default" value="Hủy bỏ">   

                    </div>
                </div>
            <?php
            }
            ?>
        </form>
    </div>
</div>
</div>
<hr>

<?php
if(isset($_POST['btnCapNhat']))
{
    $idUser = $_SESSION['idUser'];
    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $sdt = $_POST['sdt'];
    $email = $_POST['email'];
    $ngaysinh = $_POST['ngaysinh'];
    $gioitinh = $_POST['gioitinh'];

    $updateInfor1 = $tintuc->updateInfor($idUser, $hoten, $diachi, $sdt, $email, $ngaysinh, $gioitinh); 
    if(isset($updateInfor1)){
        ?>
       <script type="text/javascript">window.location='index.php'</script>
       <?php
    }
}
?>




