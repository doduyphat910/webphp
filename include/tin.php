<?php
$cookie_name = "user";
$cookie_value = "Số lần xem tin";
setcookie($cookie_name, $cookie_value, time() + 900);
?>

<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<?php
$idTinTuc = $_GET['idTinTuc'];
$obj = new tintuc();
$get1News= $obj->get1News($idTinTuc);
//print_r($get1News);
foreach ($get1News as $key => $value) {
  $idLT= $value['idLT'];
}
$RelationsNews = $obj->RelationsNews($idLT);
$showComment = $obj->showComment($idTinTuc);

$idVT=6;
$showQuangCaoTin = $obj->showQuangCaoTin($idVT);
?>



<?php
if(!isset($_COOKIE[$cookie_name])) {
      $obj->updateCount($idTinTuc);
}
?>

<?php

if(isset($_POST['btnSendComment'])){
  if(empty($_POST['txtMess'])){
    ?>
    <script type="text/javascript">
      alert("Bạn chưa bình luận gì");
    </script>
    <?php
  }
  else{
   date_default_timezone_set('Asia/Ho_Chi_Minh').
   $time = date("Y-m-d");  
   $idUser = $_SESSION['idUser'];
   $Mess = $_POST['txtMess'];
   $addComment = $obj->addComment($idTinTuc, $idUser, $Mess, $time, '0');
   ?>
   <script type="text/javascript">
    alert("Bình luận của bạn đã được gửi đi và đang được xử lý");
  </script>
  <?php
}
}


if(isset($_POST['btnReplyComment'])){
  if(empty($_POST['txtRepCMT'])){
    ?>
    <script type="text/javascript">
      alert("Bạn chưa trả lời bình luận gì");
    </script>
    <?php
  }else{
   date_default_timezone_set('Asia/Ho_Chi_Minh').
   $time = date("Y-m-d");  
   $idUser = $_SESSION['idUser'];
   $RepCMT = $_POST['txtRepCMT'];
   $idBL = $_POST['idCMT'];
   $addComment = $obj->addReply($idBL, $idUser, $RepCMT, $time, '0');
   ?>
   <script type="text/javascript">
    alert("Câu trả lời của bạn đã được gửi đi và đang được xử lý");
  </script>
  <?php
}
}

?>

<script type="text/javascript">
  $(document).ready(function() {
    $(".reply").click(function() {
      idBL = $(this).attr("data-a");
      $(".reply-form"+idBL).slideToggle();
    });
  });
</script>

<?php
foreach ($get1News as $key => $value) {
  ?>
  <div class="container">         
    <div class="row container box text-center canhgiua">
     <div class="col-md-8" style="background-color: white">
      <div class="tintuc"> <strong style="font-size:30px;"><?php echo $value['TieuDe'];?></strong>

        <p style="font-weight:bold" class="text-justify"><?php echo $value['TomTat']; ?></p>
        <?php echo $value['NoiDung']; ?>
        <!--<p class="font-weight-bold text-right">Văn Chương</p>-->
        <?php
      }
      ?>

      <div class="col-lg-12 row" style="font-size:30px;"><strong>Tin liên quan</strong></div>
      <div class="row">
        <?php
        foreach ($RelationsNews as $key => $value) {
          ?>
          <div class="col-lg-3 col-xs-12">        
            <a href="index.php?p=tin&idTinTuc=<?php echo $value['idTinTuc']; ?>"
             class="nav-link"><img src="images/<?php echo $value['UrlHinh'] ;?>" class="img-fluid card"  align= "center">
             <p class="mota"><?php echo $value['TieuDe'] ;?></p></a>
           </div>
           <?php
         }
         ?>

       </div>
       <!--form binh luan-->
       <?php
       if(isset($_SESSION['idUser'])){
        ?>
        <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
         <div class="form-group">
          <label for="comment">Bình Luận:</label>
          <textarea class="form-control" rows="5" id="comment" name="txtMess" class="Mess"></textarea>
        </div>
        <input type="submit" value="Gửi bình luận" class="btn btn-default" name="btnSendComment" 
        id="SendComment"></input>
      </form>
      <?php
    }
    ?>

    <!--khu vuc cac binh luan khac-->               
    <div class="container box canhgiua">
      <div class="row">
        <div class="col-md-12">

          <h3 class="text">Ý kiến các đọc giả</h3>
          <hr/>

          <ul class="comments">
            <?php
            foreach ($showComment as $key => $value) {
              $idBL = $value['idBL'];
              $showReply = $obj->showReply($idBL);
              ?>
              <li class="clearfix">
                <div>
                  <p class="meta"><?php echo $value['NgayDang'];?> <a href="#">
                    <?php echo $value['HoTenUser']; ?></a> 
                    đã bình luận : <i class="pull-right">
                      <a href="javascript:void(0)" class="reply" data-a="<?php echo $value['idBL'];?>">
                        <small>Trả lời</small></a></i></p>
                    <p>
                      <?php $NoiDung = nl2br($value['NoiDung']);
                      echo $NoiDung; ?>
                    </p>

                  </div>

                  <?php
                  foreach ($showReply as $key => $value) {
                    ?>
                    <ul class="repcomments">
                      <li class="clearfix">

                        <div>
                          <p class="meta"><?php echo $value['NgayDang']?> 
                            <a href="#"><?php echo $value['HoTenUser']; ?></a> đã trả lời : </p>
                          <p>
                             <?php 
                             $NoiDung = nl2br($value['NoiDung']);
                              echo $NoiDung; 
                              ?>
                          </p>
                        </div>
                      </li>
                    </ul>
                  <?php
                  }
                  ?>
                  <fieldset style="display: none;" class="reply-form<?php echo $value['idBL']; ?>">
                    <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
                     <div class="form-group">
                      <label for="comment">Trả lời bình luận:</label>
                      <textarea class="form-control" rows="4"  name="txtRepCMT" ></textarea>
                      <input type="hidden" name="idCMT" value="<?php echo $value['idBL'];?>">
                    </div>
                    <input type="submit" value="Trả lời bình luận" class="btn btn-default" 
                    name="btnReplyComment" id="ReplyComment"></input>
                  </form>
                </li>
                </fieldset>

                <?php
              }
              ?>
          </ul>
        </div>
      </div>
    </div>  
  </div>    
</div>
<!--qc-->
      <div class="col-lg-4" id="quangcao">
        <?php 
        foreach ($showQuangCaoTin as $key => $value) {
        ?>
        <a href="<?php echo $value['Url']; ?>">
          <img src="images/quangcao/Tin/<?php echo $value['UrlHinh']; ?>" 
          class="img-fluid card" /> 
        </a>
        <?php
        }
        ?>
      </div>
      <style type="text/css">
      #quangcao img{
        width: 350px;
        height: 250px;
        margin-top: 15px;
      }
    </style>
</div>
</div>
</div>
