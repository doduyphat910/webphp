<?php
if(isset($_GET['trang'])){
  $page = $_GET['trang'];
}
else{
  $page = 1;
}
$newsinpage = 8;
$from = ($page-1)*$newsinpage;
$idTL = $_GET['idTL'];
$obj = new tintuc();
$getNewsFollowCategorys_paging = $obj->getNewsFollowCategorys_paging($idTL, $from, $newsinpage);
?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<div class="container">  

    <!--BreadCrumb-->
  <?php
  $breadCrumbTL = $obj->breadCrumbTL($idTL);
  ?>
  <hr>
<!-- with images -->  
<?php
foreach ($breadCrumbTL as $key => $value) {
?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="index.php">Trang chủ</a>
  <span class="breadcrumb-item active"><?php echo $value['TenTL']; ?></span>
</nav>
<?php
}
?>
  <!--Content-->
  <div class = "row">
    <div class = "col-lg-8">
      <hr />
      <?php
      foreach ($getNewsFollowCategorys_paging as $key => $value) {
        ?>
        <div class = "row hinhgiua">
          <div class = "col-lg-4 thehinhgiua">
            <a href="index.php?p=tin&idTinTuc=<?php echo $value['idTinTuc']; ?>"><img src="images/<?php echo $value['UrlHinh']; ?>" class="img-fluid"/></a>
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
    </div>
    <!--Adv-->
     <div class = "col-lg-4">
      <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
      <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
      <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />
      <img src="images/quangcao/mua-laptop-xin-nhan-dong-ho-cool-large.gif" class="img-fluid card" />  
    </div>

  <!--Adv-->

  </div>

</div>

<div class="paging">
<?php
$getNewsFollowCategorys = $obj->getNewsFollowCategorys($idTL);
$count = count($getNewsFollowCategorys);
$totalPage = ceil($count/$newsinpage);
for ($i=1; $i <= $totalPage; $i++) { 
?>
  <a <?php if($page == $i){ echo "style='background-color: #2E9AFE'"; }?> 
    href="index.php?p=theloai&idTL=<?php echo $idTL; ?>&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
<?php
}
?>
</div>