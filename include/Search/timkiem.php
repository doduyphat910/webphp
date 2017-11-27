<?php
$key = $_GET['timkiem'];
$obj = new tintuc();
$search = $obj->search($key);
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
      foreach ($search as $key => $value) {
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
