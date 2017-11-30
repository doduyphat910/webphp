
<?php
$obj = new tintuc();
$get3NewsColumnLefts = $obj ->get3NewsColumnLefts();
?>
<div class="container">   
<!--Content-->
<div class = "row">
 <div class = "col-lg-8">
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
<div class = "row hinhgiua">
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
<div class = "col-lg-4" >

  <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
  <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
  <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
  <img src="images/quangcao/poster-quang-cao-khuyen-mai-123456789jpg.jpg" class="img-fluid card" />

</div>

<!--Adv-->

</div>

</div>