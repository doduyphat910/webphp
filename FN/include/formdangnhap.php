<?php
ob_start();
$obj = new tintuc();

?>
<script src="css/css2/js/bootstrap.min.js"  ></script>

<?php
if(isset($mail))
{
  if(!$mail->Send())
  {
    ?>
    <div class="container">
      <div class="alert alert-danger">
        Gửi không thành công
      </div>
    </div>
    <?php
  }
  else{
    ?>
    <div class="container" >
      <div class="alert alert-success">
        Gửi thành công
      </div>
    </div>
    <?php
  }
}
?>
<div class="container py-3">
  <div class="row">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <span class="anchor" id="formLogin"></span>
          <!-- form card login -->
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0 text-center">Đăng nhập</h3>
            </div>
            <div class="card-body">
              <form class="form" role="form" autocomplete="off" id="formLogin" method="post" 
              action="welcome.php">
              <div class="form-group">
                <label for="uname1">Tên đăng nhập</label>
                <input type="text" class="form-control form-control-lg rounded-0" name="uname1" id="uname1" required="">
              </div>
              <div class="form-group">
                <label>Mật khẩu</label>
                <input type="password" class="form-control form-control-lg rounded-0" id="pwd1" name="pwd1" required="" autocomplete="new-password">
              </div>
              <div>
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator"></span>
                  <span class="custom-control-description small">Nhớ tài khoản trên máy tính</span>
                </label><br>
                               <!--<a href="#">
                                  <span class="custom-control-description small">Quên mật khẩu</span>
                                </a>-->
                                <button type="button" id="btnQuenMatKhau" data-toggle="modal" data-target="#exampleModal"
                                class="btn btn-primary btn-sm">Quên mật khẩu</button><br>
                                <br>
                              </div>

                              <?php
                              $obj = new tintuc();
                              if(isset($_POST['btnDangNhap'])){
                                $un = $_POST['uname1'];
                                $pw = $_POST['pwd1'];
                                $Login = $obj->Login($un, $pw);
                                if(count($Login) == 0){
                                  ?>
                                  <div class="alert alert-danger">
                                    Tên đăng nhập hoặc mật khẩu sai
                                  </div>    
                                  <?php
                                }
                              }
                              ?>
                              <button type="submit" name="btnDangNhap" class="btn btn-primary btn-lg float-right">Đăng nhập</button>
                            </form>
                          </div>
                          <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                      </div>

                    </div>
                    <!--/row-->

                  </div>
                  <!--/col-->
                </div>
                <!--/row-->
              </div>
              <!--/container-->


              <div class="row">
                <div class="container col-lg-5 " id="quenmatkhau" style="display: none;">
                  <form action="dangnhap.php" method="post">
                    <label>Nhập tên đăng nhập</label>
                    <input type="text" class="form-control form-control-ls" name="txtQuenMatKhau"><br>
                    <input type="submit" name="btnSMQuenMK" class="btn-primary">
                  </form>
                </div>
              </div>



              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Quên mật khẩu</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form action="dangnhap.php" method="post">
                      <label>Nhập tên đăng nhập</label>
                      <input type="text" class="form-control form-control-ls" name="txtQuenMatKhau"><br>
                      <input type="submit" name="btnSMQuenMK" class="btn btn-primary">
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                  </div>
                </div>
              </div>
            </div>


            <?php
            if(isset($_POST['btnSMQuenMK'])){
              $tendangnhap = $_POST['txtQuenMatKhau'];
              $getEmail = $obj->getEmail($tendangnhap);
              $getAllUser = $obj->getAllUser();
              foreach ($getEmail as $key => $value) {
               $email = $value['Email'];
             }
             foreach ($getEmail as $key => $value) {
               $idUserMK = $value['idUser'];
             }

             global $i;
             foreach ($getAllUser as $key => $value) {
               if($tendangnhap == $value['UserName']){
                 $i++;
               }
             }
             if($i==0){
               ?>
               <script language="JavaScript" type="text/javascript">
                setInterval('window.scroll(0, Math.pow(10,10))', 1000);
              </script>
              <div class="col-md-5" style="margin: auto;">
                <div class="alert alert-danger">
                  <div align="center">Không tồn tại tên đăng nhập</div>
                </div>
              </div>
              <?php
            }




            if(isset($email)){
              include ROOT."/library/PHPMailerAutoload.php";


              $mail = new PHPMailer();
                  $mail->IsSMTP(); // set mailer to use SMTP
                  //$mail->SMTPDebug  = 1;

                  $mail->Host = "smtp.gmail.com"; // specify main and backup server
                  $mail->Port = 465; // set the port to use
                  $mail->SMTPAuth = true; // turn on SMTP authentication
                  $mail->SMTPSecure = 'ssl';
                  $mail->Username = "webtintuc247@gmail.com"; //your SMTP username or your gmail username
                  $mail->Password = "doduyphat@1"; // your SMTP password or your gmail password
                  $from = "webtintuc247@gmail.com"; // Reply to this email
                  $to= $email; // Email người nhận
                  foreach ($getEmail as $key => $value) {
                  $name=$value['HoTenUser']; // Tên người nhận
                  $token = $value['token'];
                }
                $mail->From = $from;
                  $mail->FromName = "webtintuc247"; // Tên người gửi 
                  $mail->AddAddress($to,$name);
                  $mail->AddReplyTo($from,"Phong cham soc khach hang");
                  $mail->CharSet = 'UTF-8';
                  $mail->WordWrap = 50; // set word wrap
                  $mail->IsHTML(true); // send as HTML
                  $subject = "Thay đổi mật khẩu webtintuc247!";
                  $mail->Subject = $subject;
                  //$mkmoi = "User123456";
                  //$mail->Body = "Mật khẩu của bạn đã được thay đổi là User123456";
                  //$link = "http://localhost/GiaoDien_ChinhSuaLink/index.php?p=quenmk&idUser=$idUserMK";
                  $body = 'Click '.
                  "<a href='http://localhost/GiaoDien_ChinhSuaLink/index.php?p=quenmk&idUser=$idUserMK&token=$token'>Link</a>".' này để đổi mật khẩu của bạn' ;
                  $mail->Body= $body;
                  if(!$mail->Send())
                  {
                    ?>
                    <script language="JavaScript" type="text/javascript">
                      setInterval('window.scroll(0, Math.pow(10,10))', 1000);
                    </script>
                    <div class="col-md-5" style="margin: auto;">
                      <div class="alert alert-danger">
                        <div align="center">Gửi không thành công</div>
                      </div>
                    </div>
                    <?php
                  }
                  else{

                   //$cookie_name3= "token";
                   //$cookie_value3 = "Cập nhật token";
                     //$obj->updatePWUser($idUserMK, md5($mkmoi));
                    ?>
                    <?php echo "không tồn tại";?>
                    <script language="JavaScript" type="text/javascript">
                        //setInterval('window.scroll(0, Math.pow(10,10))', 1000);
                      </script>
                      <div class="col-md-5" style="margin: auto;">
                        <div class="alert alert-success">
                          <div align="center">Gửi thành công</div>
                        </div>
                      </div>
                      <?php

                      ?>
                      <script type="text/javascript">
                        alert("Link đã gửi đến mail ");
                      </script>                       
                      <?php
                      ?>
                      <?php
                    }
                  }
                }
                ?>
                <?php ob_flush(); ?>
