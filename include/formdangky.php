
<?php
$dk = postIndex("dk");
$hoten = postIndex("hoten");
$tendangnhap = postIndex("tendangnhap");
$pw = postIndex("pw");
$nlpw = postIndex("nlpw");
$diachi = postIndex("diachi");
$email = postIndex("email");
$sdt = postIndex("sdt");
$gt = postIndex("gioitinh");
$ngaysinh = postIndex("ngaysinh");


$errhoten= "";
$errtendangnhap= "";
$errnlpw = "";
$errpw="";
$errdiachi= "";
$erremail="";
$errsdt= "";
$errgt="";
$errngaysinh="";
$errdieukhoan="";
if($dk != ""){

    if (strlen($hoten)<6 ) $errhoten .=" Họ tên ít nhất phải 6 ký tự!<br>";
    if ($nlpw!= $pw)    $errnlpw .="Mật khẩu và mật khẩu nhập lại không khớp. <br>";
    if(strlen($pw)<8)        $errpw .="Mật khẩu phải ít nhất 8 ký tự.<br>";
    if(strlen($tendangnhap)<5 || strlen($tendangnhap)>50)       
       $errtendangnhap .="Tên đăng nhập không lớn hơn 50 kí tự và nhỏ 5 kí tự.<br>";
   if (strlen($diachi)<6 ) $errdiachi .=" Địa chỉ ít nhất phải 6 ký tự!<br>";

}


function postIndex($index, $value="")
{
    if (!isset($_POST[$index])) return $value;
    return trim($_POST[$index]);
}

function checkUserName($string)
{
    if (preg_match("/^[a-zA-Z0-9._-]*$/",$string)) 
      return true;
  return false;
}

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

function checkPhoneNumber($string)
{
  preg_match_all('/[0-9+]/',$string ,$match);
  if(dem($match) & strlen($string)>=10)
      return true;
  return false;
}
function checkEmail($string)
{  
    if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $string))
       return true;
   return false;   
}

function checkDieuKhoan(){
    if(isset($_POST['cboDieuKhoan']) && $_POST['cboDieuKhoan'] == 'dieukhoan')
        return true;
    return false;
}

if($dk != ""){

    if(checkPassWord($pw) == false)
    {
      $errpw.= "mật khẩu phải gồm 1 kí tự hoa 1 kí tự thường và 1 số";
  }
  if(checkUserName($tendangnhap) == false)
  {
    $errtendangnhap.= "tên đăng nhập không được có kí tự đặc biệt";
}
if(checkEmail($email) == false)
{
    $erremail.= "Không đúng định dạng email";
}
if(checkPhoneNumber($sdt) == false)
{
    $errsdt.="Số điện thoại không đúng";
}
if(checkDieuKhoan() == false)
{
    $errdieukhoan.="Bạn chưa đồng ý điều khoản";
}

}

?>




<!-- Include Date Range Picker -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="ngaysinh"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'yyyy-mm-dd',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<div class="container py-3">
    <div class="row">
        <div class="col-md-12 col-lg-6 mx-auto">
            <div class="card card-body">

                <h3 class="text-center mb-4">Đăng ký</h3>
                    <!--<div class="alert alert-danger">
                        <a class="close" data-dismiss="alert" href="#">×</a>Password is too short.
                    </div>-->
                    <form action="dangky.php" method="post" enctype="multipart/form-data">
                        <fieldset>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Họ và tên" name="hoten" type="text">
                            </div>
                            <?php
                            if($errhoten != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errhoten; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Tên đăng nhập" 
                                name="tendangnhap" type="text">
                            </div>
                            <?php
                            if($errtendangnhap != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errtendangnhap; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Mật khẩu" name="pw" value="" type="password">
                            </div>
                            <?php
                            if($errpw != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errpw; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Nhập lại mật khẩu" 
                                name="nlpw" value="" type="password">
                            </div>
                            <?php
                            if($errnlpw != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errnlpw; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group  has-success">
                                <input class="form-control input-lg" placeholder="Địa chỉ " name="diachi" type="text">
                            </div>
                            <?php
                            if($errhoten != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errdiachi; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Địa chỉ E-mail" name="email" type="text">
                            </div>
                            <?php
                            if($erremail != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $erremail; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <input class="form-control input-lg" placeholder="Số điện thoại" name="sdt" type="text">
                            </div>
                            <?php
                            if($errsdt != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errsdt; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <div class="form-group has-success">
                                <label class="form-check">Giới tính:</label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gioitinh" 
                                    value="1" checked="checked">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gioitinh" 
                                    value="0">
                                    Nữ
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="gioitinh" 
                                    value="2">
                                    Khác
                                </label>
                            </div>
                            <div > 
                                <label class="control-label" for="date">Ngày sinh:</label>
                                <input class="form-control input-lg" id="date" name="ngaysinh" 
                                placeholder="YYYY-MM-DD" type="text"  />
                            </div>

                            <div class="form-group"> 
                            </div>
                            <div class="checkbox">
                                <label class="small">
                                    <input type="checkbox" name="cboDieuKhoan" 
                                    value="dieukhoan">
                                    Tôi đã đọc và đồng ý với các <a href="#">điều khoản của trang web
                                    </a>
                                </label>
                            </div>
                            <?php
                            if($errdieukhoan != ""){
                                ?>
                                <div class="alert alert-danger">
                                    <?php echo $errdieukhoan; ?>
                                </div>
                                <?php
                            }
                            ?>
                            <input class="btn btn-lg btn-primary btn-block" value="Đăng ký" 
                            type="submit" name="dk">
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh').
    $time = date("Y-m-d");
    $obj = new tintuc();

    if($errhoten == "" && $errtendangnhap== "" && $errnlpw == "" && $errpw=="" && $errdiachi== "" && 
        $erremail=="" &&$errsdt== "" && $errgt=="" && $errngaysinh=="" && $errdieukhoan=="" && $dk!="")
    {
        $pw= md5($pw);
        $Register = $obj->Register($hoten, $tendangnhap, $pw, $diachi, $email, $sdt, $gt, $ngaysinh, $time, '1');
    }
?>

<?php
if(isset($Register)){
    ?>
    <script type="text/javascript">
        alert("Bạn đã đăng kí thành công");
    </script>
    <?php
}
?>
