<?php
if(isset($_GET['trang'])){
  $page = $_GET['trang'];
  settype($page, "int");
}else{
  $page = 1;
}
$newsinpage = 8;
$from = ($page -1)*$newsinpage;
$obj = new tintuc();
$seeMoreNews_paging = $obj->seeMoreNews_paging($from ,$newsinpage);
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
      foreach ($seeMoreNews_paging as $key => $value) {
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
  $seeMoreNews= $obj->seeMoreNews();
  $count = count($seeMoreNews);
  $totalPage = ceil($count/$newsinpage);
  for($i=1; $i<=$totalPage; $i++){
?>
  <a <?php if($i==$page) echo "style='background-color: #2E9AFE' "; ?>
  href="index.php?p=xemthem1&trang=<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php
  }
  ?>
</div>


<style>
.paging{
  width: 420px;
  height: 30px;
  margin-left: 250px;
  margin-bottom: 10px;
  margin-top: 1px;
  text-align: center;
}
.paging a{
  line-height: 10px;
  color: black;
  margin-left: 5px;
  padding: 7px;
  background-color:#BDBDBD; 
  border-radius: 5px;
}
.paging a:hover{
  background-color: #2E9AFE;
}
</style>