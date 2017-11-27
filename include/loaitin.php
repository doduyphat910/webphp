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
$idLT = $_GET['idLT'];
$obj = new tintuc();
$getNewsByType_paging = $obj->getNewsByType_paging($idLT, $from, $newsinpage);
?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<div class="container">  
  <!--BreadCrumb-->
  
  <?php
  $breadCrumbLT = $obj->breadCrumbLT($idLT);
  ?>
  <hr>
<?php
foreach ($breadCrumbLT as $key => $value) {
?>
<nav class="breadcrumb">
  <a class="breadcrumb-item" href="index.php">Trang chủ</a>
  <a class="breadcrumb-item" href="index.php?p=theloai&idTL=<?php echo $value['idTL']; ?>">
    <?php echo $value['TenTL']; ?></a>
  <span class="breadcrumb-item active"><?php echo $value['TenLT']; ?></span>
</nav>
<?php
}
?>
  <!--Content-->
  <div class = "row">
    <div class = "col-lg-8">
      <hr />
      <?php
      foreach ($getNewsByType_paging as $key => $value) {
        ?>
        <div class = "row hinhgiua">
          <div class = "col-lg-4 thehinhgiua">
            <a href="iphonex.html"><img src="images/<?php echo $value['UrlHinh']; ?>" class="img-fluid"/></a>
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
    <div class = "col-lg-4" style = "background-color: green">Ads</div>
  </div>
</div>

<div class="paging">
  <?php
  $getNewsByType = $obj->getNewsByType($idLT);
  $count = count($getNewsByType);
  $totalNews = ceil($count/$newsinpage);
  for ($i=1; $i <= $totalNews; $i++) { 
    ?>
        <a <?php if($page == $i ){ echo "style='background-color:#2E9AFE'";}?> 
        href="index.php?p=loaitin&idLT=<?php echo $idLT; ?>&trang=<?php echo $i; ?>&idTL=<?php echo $idTL; ?>">
      <?php echo $i;?></a>
      <?php
    }
    ?>
  </div>