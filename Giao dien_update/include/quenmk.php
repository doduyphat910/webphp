<?php
$tintuc = new tintuc();
$idUser = $_GET['idUser'];
$tokenLay = $_GET['token'];
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
        <form action="index.php?p=quenmk&idUser=<?php echo $idUser;?>&token=<?php echo $tokenLay; ?>" method="post">
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
foreach ($showInfor as $key => $value) {
    $token = $value['token'];
}
if($tokenLay == $token ){
    if(isset($_POST['btnCapNhatMK']))
    {
        $pwmoi = $_POST['pwmoi'];
        $pwmoi2 = $_POST['pwmoi2'];

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
            if(isset($updatePWUser)){ 
                $token3 = rand(100000000000,999999999999);
                $obj->updateToken($idUser, $token3);
                ?>
                <script type="text/javascript">
                    window.location="dangnhap.php";
             </script>
             <?php
         }
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

}
}else{
    ?>
    <script type="text/javascript">
        alert("link hết hạn");
        window.location="index.php";
    </script>
    <?php
}
?>




