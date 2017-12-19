<?php
$tintuc = new tintuc();
$idUser = $_SESSION['idUser'];
$showInfor = $tintuc->showInfor($idUser);
function dem (array $a)
{
    $i =0;
    foreach ($a as $m => $value) {
      foreach ($value as $d => $v) {
        $i++;
    }
}
if($i>=1){
  return true;
}
else{
  return false;
}
}
function checkPassWord($string)
{
  preg_match_all('/[a-z+]/',$string ,$match1) ;
  preg_match_all('/[A-Z+]/',$string ,$match2) ;
  preg_match_all('/[0-9+]/',$string ,$match3) ; 
  if(strlen($string) >= 8 & dem($match1) >=1 & dem($match2) >=1 & dem($match3) >=1)
    return true;
return false;
}
?>

<div class="container" style="background-color: white">
 <h1>Thay đổi mật khẩu</h1>
 <hr>
 <div class="row">
    <div class="col-md-12 personal-info">
        <form action="index.php?p=doimk" method="post">
            <div class="form-group">
                <label for="uname1">Mật khẩu cũ</label>
                <input type="password" class="form-control form-control-lg rounded-0" name="pwcu" >
            </div>
            <div class="form-group">
                <label for="uname1">Mật khẩu mới</label>
                <input type="password" class="form-control form-control-lg rounded-0" name="pwmoi">
            </div>
            <div class="form-group">
                <label for="uname1">Nhập lại mật khẩu mới</label>
                <input type="password" class="form-control form-control-lg rounded-0" name="pwmoi2">
            </div>
            <input type="submit" name="btnCapNhatMK" class="btn btn-primary" value="Cập nhật mật khẩu">
        </form>
    </div>
</div>
</div>
<hr>

<?php
if(isset($_POST['btnCapNhatMK']))
{
    $pwcu = $_POST['pwcu'];
    $pwmoi = $_POST['pwmoi'];
    $pwmoi2 = $_POST['pwmoi2'];
    foreach ($showInfor as $key => $value) {
        $pw = $value['Password'];
    }
    if(md5($pwcu) == $pw){
        if($pwmoi == $pwmoi2){
            if(checkPassWord($pwmoi) == false)
            {
                ?>
                <div class="col-md-10" style="margin: auto;">
                    <div class="alert alert-danger">
                        <div align="center">Mật khẩu phải gồm 1 kí tự hoa 1 kí tự thường và 1 số</div>
                    </div>
                </div>
                <?php
            }
            else{
              $updatePWUser = $obj->updatePWUser($idUser, md5($pwmoi));
              ?>
              <div class="col-md-10" style="margin: auto;">
                <div class="alert alert-success">
                    <div align="center">Cập nhật thành công</div>
                </div>
            </div>
            <?php
        }
    }else{
        ?>
        <div class="col-md-10" style="margin: auto;">
            <div class="alert alert-danger">
                <div align="center">Mật khẩu mới và nhập lại mật khẩu không giống nhau</div>
            </div>
        </div>
        <?php
    }
}else{
    ?>
    <div class="col-md-10" style="margin: auto;">
        <div class="alert alert-danger">
            <div align="center">Mật khẩu cũ sai hoặc rỗng</div>
        </div>
    </div>
    <?php
}
}
?>




