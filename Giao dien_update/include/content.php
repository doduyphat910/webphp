 <link rel="stylesheet" type="text/css" href="css/style.css"/>
 <script type="text/javascript" src="js/tintuc.js"></script>
 <?php
 $obj = new tintuc();
 $get3NewsColumnLefts = $obj ->get3NewsColumnLefts();
 $idVT = 1;
 $idVTTC = 7;
 $showQuangCaoTrangChu = $obj->showQuangCaoTrangChu($idVT);
 ?>
 <div class="container">   
  <!--Content-->
  <div class = "row">
   <div class = "col-lg-8" style="background-color: white">
     <hr />
     <h5 class="theloai">Tin mới nhất</h5>
     <br>
     <?php
     foreach($get3NewsColumnLefts as $news)
     {
      ?>
      <div class = "row hinhgiua">
       <div class = "col-lg-4 thehinhgiua">
         <a href="index.php?p=tin&idTinTuc=<?php echo $news['idTinTuc']; ?>">
          <img src="images/<?php echo $news['UrlHinh']; ?>" class="img-fluid"/></a>
        </div>
        <div class = "col-lg-8">
         <a href="index.php?p=tin&idTinTuc=<?php echo $news['idTinTuc']; ?>" class="nav-link">
          <p class="tieude"><?php echo $news['TieuDe']; ?></p>
          <p class="mota"><?php echo $news['TomTat']; ?></p>
        </a>
      </div>
    </div>
    <hr />
    <?php
  }
  ?>



  <div class="xemthem float-sm-right">
    <a href="index.php?p=xemthem1">
      <button type="button" class="btn btn-info">Xem Thêm</button>
    </a>  
  </div>
  <br>
  <br>
  <!--the loai khac-->
  <h5 class="theloai">Tin hot</h5><br>
  <?php
  $get3HotNews = $obj->get3HotNews();
  foreach ($get3HotNews as $key => $value) {
    ?>
    <div class = "row hinhgiua" >
     <div class = "col-lg-4 thehinhgiua">
       <a href="index.php?p=tin&idTinTuc=<?php echo $value['idTinTuc']; ?>"><img src="images/<?php echo $value['UrlHinh']; ?>" class="img-fluid" /></a>
     </div>
     <div class = "col-lg-8">
       <a href="index.php?p=tin&idTinTuc=<?php echo $value['idTinTuc']; ?>" class="nav-link">
        <p class="tieude"><?php echo $value['TieuDe']; ?></p>
        <p class="mota"><?php echo $value['TomTat']; ?></p>
      </a>
    </div>
  </div>
  <hr />
  <?php
}
?>



<div class="xemthem float-sm-right">
  <a href="index.php?p=xemthem2">
    <button type="button" class="btn btn-info">Xem Thêm</button>
  </a>  
</div>
<br>
<br>


</div>

<!--Adv-->
<div class = "col-lg-4" id="quangcao" >
  <?php
  foreach ($showQuangCaoTrangChu as $key => $value) {
    ?>
    <a href="<?php echo $value['Url']; ?>" target=_blank>
      <img src="images/quangcao/Trang chu/<?php echo $value['UrlHinh']; ?>" class="img-fluid card" />
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

<!--Adv-->
<div class="col-lg-8" style="background-color: white; margin-top: 30px;" > 
  <?php
  $getAllTL = $obj->getAllTL();
  foreach ($getAllTL as $key => $value) {
    $getAllLT = $obj->getAllLT($value['idTL']);
    $get1TinTL = $obj->get1TinTL($value['idTL']);
    $get2TinTL = $obj->get2TinTL($value['idTL']);
    ?>

    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" href="index.php?p=theloai&idTL=<?php echo $value['idTL'];?>"
         role="tab" data-toggle="tab" style="font-weight: bold;">
         <?php echo $value['TenTL']; ?></a>
       </li>
       <?php foreach ($getAllLT as $key => $LT) { ?>
       <li class="nav-item">
        <a class="nav-link" 
        href="index.php?p=loaitin&idLT=<?php echo $LT['idLT']; ?>&idTL=<?php echo $value['idTL']; ?>" 
        role="tab" data-toggle="tab" ><?php echo $LT['TenLT']; ?></a>
      </li>
      <?php } ?>
    </ul>
    <div class="row">
      <?php foreach ($get1TinTL as $key => $tin) { ?>
      <div class="col-lg-8">
        <div class="row" >
          <div class="col-lg-12">
            <div class="row ">
              <div class="col-lg-12 text-center  text-capitalize tieude">
                <a href="index.php?p=tin&idTinTuc=<?php echo $tin['idTinTuc']; ?>" class="nav-link">
                  <?php echo $tin['TieuDe']; ?></a></div>
                </div>
                <div class="row">
                  <div class="col-lg-4"><a href="index.php?p=tin&idTinTuc=<?php echo $tin['idTinTuc']; ?>">
                    <img src="images/<?php echo $tin['UrlHinh']; ?>" class="img-fluid card m-auto"></a></div>
                    <div class="col-lg-8 text-capitalize m-auto">
                      <a href="index.php?p=tin&idTinTuc=<?php echo $tin['idTinTuc']; ?>" class="nav-link"><?php echo $tin['TomTat']; ?></a> </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php }?>

              <div class="col-lg-4" >
                <?php foreach ($get2TinTL as $key => $tin2) {
                  ?>
                  <div class="row" style=" margin-left: -35px;" >
                    <div class="col-lg-12 text-justify tieude" style="margin-top: 10px;">
                      <a href="index.php?p=tin&idTinTuc=<?php echo $tin2['idTinTuc']; ?>" 
                        class="nav-link" style="font-size: 15;"><?php echo $tin2['TieuDe']; ?></a></div>
                      </div>
                      <?php } ?>
                    </div>                  

                  </div>
                  <hr>
                  <?php
                }
                ?>
              </div>
              <div class="col-lg-4" >
                <div class="row" id="quangcao2" >
                  <?php
                  $showQuangCaoTrangChu2 = $obj->showQuangCaoTrangChu2($idVTTC);
                  foreach ($showQuangCaoTrangChu2 as $key => $value) {
                    ?>
                    <a href="<?php echo $value['Url']; ?>" target=_blank>
                      <img src="images/quangcao/Trang chu 2/<?php echo $value['UrlHinh']; ?>" 
                      class="img-fluid card" />
                    </a>
                    <?php
                  }
                  ?>
                </div>
                <style type="text/css">
                #quangcao2 img{
                  width: 350px;
                  height: 580px;
                  margin-top: 30px;
                  margin-left: 15px;
                }
              </style>

            </div>

          </div>
        </div>

      </div>

<!---->