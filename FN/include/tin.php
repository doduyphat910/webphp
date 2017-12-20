<?php
ob_start();
$cookie_name = "user";
$cookie_value = "Số lần xem tin";
setcookie($cookie_name, $cookie_value, time() + 900);
?>
<script src="css/css2/js/bootstrap.min.js"  ></script>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
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
   $idUser = $_SESSION['idUser'];
   $Mess = $_POST['txtMess'];
   $addComment = $obj->addComment($idTinTuc, $idUser, $Mess, '0');
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
   $idUser = $_SESSION['idUser'];
   $RepCMT = $_POST['txtRepCMT'];
   $idBL = $_POST['idCMT'];
   $addComment = $obj->addReply($idBL, $idUser, $RepCMT, '0');
   ?>
   <script type="text/javascript">
    alert("Câu trả lời của bạn đã được gửi đi và đang được xử lý");
  </script>
  <?php
}
}
?>


<!--Update CMT-->
<?php
if(isset($_POST['btnUpdateComment'])){
  $noiDungUpdate = $_POST['txtUpdateCMT'];
  $idBL = $_POST['idUpdateCMT'];
  $updateComment = $obj->updateComment($idBL, $noiDungUpdate);
}
?>
<!--Update REP CMT-->

<?php
if(isset($_POST['btnUpdateRepComment'])){
  $noiDungRepUpdate = $_POST['txtUpdateREPCMT'];
  $idTLBL = $_POST['idUpdateRepCMT'];
  $updateRepCMT = $obj->updateRepCMT($idTLBL, $noiDungRepUpdate);
}
?>

<!--Delete CMT-->
<?php
if(isset($_POST['btnXoa'])){
  $idBLXoa = $_POST['idXoa'];
  $idTinTuc = $_GET['idTinTuc'];
  $deleteCMT = $obj->deleteCMT($idBLXoa); 
  if(isset($deleteCMT)){
    ?>
    <script>
      window.location.replace('index.php?p=tin&idTinTuc=<?php echo $idTinTuc;?>');
    </script>
    <?php

  }
}
?>

<!--Delete RepCMT-->
<?php
if(isset($_POST['btnXoaTL'])){
  $idXoaTL = $_POST['idXoaTL'];
  $deleteRepCMT = $obj->deleteRepCMT($idXoaTL);
  if(isset($deleteRepCMT)){
    ?>
    <script>
      window.location.replace('index.php?p=tin&idTinTuc=<?php echo $idTinTuc;?>');
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



<script type="text/javascript">
  $(document).ready(function() {
    $(".update").click(function() {
      idBL = $(this).attr("data-a");
      $(".update-form"+idBL).slideToggle();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".update").click(function() {
      idBL = $(this).attr("data-a");
      $(".update"+idBL).slideToggle();
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $(".updateRep").click(function() {
      idTLBL = $(this).attr("data-a");
      $(".updateREP-form"+idTLBL).slideToggle();
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


      <?php 
      $getQuestion = $obj->getQuestion($idTinTuc);
      if(count($getQuestion) == 1)
      {
        foreach ($getQuestion as $key => $value) {
          ?>
          <div class="col-lg-12" >
            <div class="row">
              <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc;?>" method= "post">
                <div class="form-group"> <!-- Radio group !-->
                  <label class="control-label"><?php echo $value['MoTa']; ?></label>
                  <?php 
                  $getAnswer = $obj->getAnswer($value['idBC']);
                  foreach ($getAnswer as $key => $da) {?>
                  <div class="radio">
                    <label>
                      <input type="radio" name="PA" value="<?php echo $da['idCTBC']; ?>">
                      <?php echo $da['MoTa']; ?>
                    </label>
                  </div>
                  <?php }?>
                </div>    
                <div class="form-group"> <!-- Submit button !-->
                  <button class="btn btn-sm btn-outline-primary" name="btnBinhChon" value="Gửi bình chọn" 
                  type="submit" >
                Gửi bình chọn</button>
                <button type="button" class="btn btn-info btn-lg-4" data-toggle="modal" data-target="#xemketqua">Xem kết quả</button>
              </div>
            </form>
          </div>  
        </div>
        <?php 
      }
    }
    $cookie_name2 = "user_bc";
    $cookie_value2 = "Số lần bình chọn";
    if(isset($_POST['btnBinhChon'])){
      setcookie($cookie_name2,$cookie_value2, time() + 90);
      if(!isset($_POST['PA'])){
        ?>
        <script type="text/javascript">
          alert("bạn chưa chọn");
        </script>
        <?php
      }else{
        if(!isset($_COOKIE[$cookie_name2]))
        {
          $idCTBC = $_POST['PA'];
          $updateVote = $obj->updateVote($idCTBC);
          if(isset($updateVote)){
            ?>
            <script type="text/javascript">
              alert("bạn đã bình chọn thành công");
            </script>
            <?php
          }
        }else{
          ?>
          <script type="text/javascript">
            alert("bạn đã bình chọn, vui lòng quay lại sau");
          </script>
          <?php
        }
      }
    }
    ?>



    <div class="modal fade" id="xemketqua" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Kết quả bình chọn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!--Biểu đồ ở đây-->
            <?php $totalVote1 = $obj->totalVote();
            $totalVote2 = $totalVote1['total'];
            $arr = array();
            foreach ($getAnswer as $key => $value) {
              $value['SoLanChon'];
              ?>
              <?php $percent = round(($value['SoLanChon']/$totalVote2)*100,2);?>
              <?php array_push($arr, $percent) ?>
              <h3 style='color:blue; font:12px verdana; '>
                <?php echo $value['MoTa']; ?>:
                <?php echo $value ['SoLanChon']; ?> số lần chọn
                (<?php echo $percent?>%)
              </h3>
              <script type="text/javascript" src="https://www.google.com/jsapi"></script>
              <script type="text/javascript">
               /* google.load('visualization', '1.0', {'packages':['corechart']});
                google.setOnLoadCallback(drawChart);
                function drawChart() {
                  var data = new google.visualization.DataTable();
                  data.addColumn('string', 'Topping');
                  data.addColumn('number', 'Slices');
                  data.addRows([              
                    <?php foreach ($getAnswer as $key => $value2) {?>
                      ['<?php echo $value2['MoTa']?>', <?php echo $value2['SoLanChon']; ?>],
                      <?php } ?>                  
                      ]);
                  var options = {'title':'<?php foreach($getQuestion as $value){ echo $value['MoTa']; }?>',
                  'width':480,
                  'height':350};
                  var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                  chart.draw(data, options);
                }*/
              </script>
              <?php
            }
            ?>
            <!--<div id="chart_div"></div>-->
            <canvas id="canvas" height="360" width="450" style="margin-top: 20px; "></canvas>


            <script>

              var LineChart = {
                labels : [<?php foreach ($getAnswer as $key => $value) {?>"<?php echo $value['MoTa'] ?>", <?php } ?> ],
                datasets : [
                {
                  fillColor : "rgba(151,249,190,0.5)",
                  strokeColor : "rgba(255,255,255,1)",
                  pointColor : "rgba(220,220,220,1)",
                  pointStrokeColor : "#fff",
                  data : [<?php foreach ($getAnswer as $key => $value) {?> <?php echo $value["SoLanChon"]; ?> , <?php } ?> ]
                }
                ]

              }

              var myLineChart = new Chart(document.getElementById("canvas").getContext("2d")).Line(LineChart, {scaleFontSize : 13,  scaleFontColor : "#ffa45e"});

            </script>


            <!--line chart-->
            <?php

            ?>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>


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
      <input type="submit" value="Gửi bình luận" class="btn btn-success" name="btnSendComment" 
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
                        <?php 
                        if(isset($_SESSION['idUser']))
                        {
                          if($_SESSION['idUser'] == $value['idUser'])
                          {
                            ?>  
                              <a href="javascript:void(0)" class="update btn btn-warning" data-a="<?php echo $value['idBL'];?>">
                                <small>Sửa</small></a>
                                <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">                
                                  <input type="hidden" name="idXoa" value="<?php echo $value['idBL'];?>">
                                  <input type="submit" class="btn btn-block btn-danger col-lg-6" value="Xóa"  
                                  onclick="return confirm('Bạn có chắc chắn muốn xóa?');" name="btnXoa">
                                </form>
                              </p>
                            <?php
                          }
                        }
                        ?>


                      </p>
                      <fieldset  style="display: none;"  class="update-form<?php echo $value['idBL']; ?>">
                       <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
                         <div class="form-group">
                          <label for="comment">Sửa bình luận:</label>
                          <textarea class="form-control" rows="4"  name="txtUpdateCMT"><?php echo $value['NoiDung'];?></textarea>
                          <input type="hidden" name="idUpdateCMT" value="<?php echo $value['idBL'];?>">
                        </div>
                        <input type="submit" value="Sửa bình luận" class="btn btn-success" 
                        name="btnUpdateComment" id="UpdateComment"></input>
                      </form>
                    </fieldset>
                  </div>

                  <?php
                  foreach ($showReply as $key => $value2) {
                    ?>
                    <ul class="repcomments">
                      <li class="clearfix">

                        <div>
                          <p class="meta"><?php echo $value2['NgayDang']?> 
                            <a href="#"><?php echo $value2['HoTenUser']; ?></a> đã trả lời : </p>
                            <p>
                             <?php 
                             $NoiDung2 = nl2br($value2['NoiDung']);
                             echo $NoiDung2; ?>
                             <?php 
                             if(isset($_SESSION['idUser']))
                             {
                              if($_SESSION['idUser'] == $value2['idUser'])
                              {
                                ?>
                                <a href="javascript:void(0)" class="updateRep btn btn-outline-warning" 
                                data-a="<?php echo $value2['idTLBinhLuan'];?>">
                                  <small>Sửa trả lời</small></a></i>
                                  <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
                                    <input type="hidden" name="idXoaTL" value="<?php echo $value2['idTLBinhLuan'];?>">
                                    <input type="submit" class="btn btn-block btn-outline-danger col-lg-4" value="Xóa trả lời"  onclick="return confirm('Bạn có chắc chắn muốn xóa?');" name="btnXoaTL">
                                  </form>
                                </p>
                                <?php
                              }
                            }
                            ?>
                          </p> 
                          <fieldset style="display: none;" class="updateREP-form<?php echo $value2['idTLBinhLuan']; ?>">
                           <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
                             <div class="form-group">
                              <label for="comment">Sửa bình luận đã trả lời:</label>
                              <textarea class="form-control" rows="4"  name="txtUpdateREPCMT"><?php echo $value2['NoiDung'];?></textarea>
                              <input type="hidden" name="idUpdateRepCMT" value="<?php echo $value2['idTLBinhLuan'];?>">
                            </div>
                            <input type="submit" value="Sửa trả lời bình luận" class="btn btn-outline-success" 
                            name="btnUpdateRepComment" id="UpdateRepComment"></input>
                          </form>
                        </fieldset>                        
                      </div>
                    </li>
                  </ul>
                  <?php
                }
                ?>
                <?php if(isset($_SESSION['idUser'])){?>
                <fieldset style="display: none;" class="reply-form<?php echo $value['idBL']; ?>">
                  <form action="index.php?p=tin&idTinTuc=<?php echo $idTinTuc?>" method="post">
                   <div class="form-group">
                    <label for="comment">Trả lời bình luận:</label>
                    <textarea class="form-control" rows="4"  name="txtRepCMT" ></textarea>
                    <input type="hidden" name="idCMT" value="<?php echo $value['idBL'];?>">
                  </div>
                  <input type="submit" value="Trả lời bình luận" class="btn btn-success" 
                  name="btnReplyComment" id="ReplyComment"></input>
                </form>
              </li>
            </fieldset>
            <?php } ?>

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
    <a href="<?php echo $value['Url']; ?>" target=_blank>
      <img src="images/quangcao/6/<?php echo $value['UrlHinh']; ?>" 
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
<?php ob_flush(); ?>