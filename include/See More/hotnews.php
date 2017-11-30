<?php
$newsinpage = 8;
$obj = new tintuc();
if(isset($_GET['trang'])){
  $page = $_GET['trang'];
}
else{
  $page = 1;
}
$from = ($page-1)*$newsinpage;
$seeMoreHotNews_paging = $obj->seeMoreHotNews_paging($from ,$newsinpage);
?>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<div class="container">  
  <!--Content-->

  <div class = "row">
    <div class = "col-lg-8">
      <hr />
      <?php
      foreach ($seeMoreHotNews_paging as $key => $value) {
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
    <div class = "col-lg-4" style = "background-color: green">Ads</div>
  </div>
</div>

<div class="paging">
  <?php
    $seeMoreHotNews = $obj->seeMoreHotNews();
    $count = count($seeMoreHotNews);
    $totalPage = ceil($count/$newsinpage);
    for($i=1; $i<=$totalPage; $i++){
  ?>
  <a <?php if($i==$page){ echo "style='background-color: #2E9AFE'"; } ?> 
    href="index.php?p=xemthem2&trang=<?php echo $i;?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
</div>