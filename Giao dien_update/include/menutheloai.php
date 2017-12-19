<?php
$obj = new tintuc();
$idTL = $_GET['idTL'];
$data = $obj->getOneCategorys($idTL);
$getLoaiTin = $obj->getLoaiTin($idTL);
?>
<style type="text/css"></style>
<div class="navbar navbar-expand-xl container">
  <a class="navbar-brand tieude" style="color: black" href="index.php?p=theloai&idTL=<?php echo $idTL?>">
    <?php 
      foreach ($data as $value) {
        echo $value['TenTL'];
      }
    ?>

  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
   <ul class="navbar-nav">
    <?php
    foreach ($getLoaiTin as $key => $value) {
    ?>
     <li class="nav-item">
       <a class="nav-link active" href="index.php?p=loaitin&idLT=<?php echo $value['idLT'];?>&idTL=<?php echo $value['idTL'];?>"><?php echo $value['TenLT']?></a>
     </li>
     <?php
      }
     ?>
   </ul>
 </div>
</div>