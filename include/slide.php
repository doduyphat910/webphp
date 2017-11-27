<?php
$obj = new tintuc();
$getImagesSliderActive= $obj -> getImagesSliderActive();
$getImagesSliderItem = $obj->getImagesSliderItem();
?>

<div class="container">
 <div class="row">
  <div class="col-sm-8" >
    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-ride="carousel">
     <!-- Indicators -->
     <ul class="carousel-indicators">
       <li data-target="#demo" data-slide-to="0" class="active"></li>
       <li data-target="#demo" data-slide-to="1"></li>
       <li data-target="#demo" data-slide-to="1"></li>

     </ul>
     <!-- Wrapper for slides -->
     <style>.carousel-inner > .carousel-item > img { width:750px; height:500px;} </style>
     <div class="carousel-inner">
      <?php foreach($getImagesSliderActive as $ImgS)
      {
      ?>
        <div class="carousel-item active">
          <img src="images/<?php echo $ImgS['UrlHinh'];?>">
          <div class="carousel-caption d-none d-md-block">
            <a href="index.php?p=tin&idTinTuc=<?php echo $ImgS['idTinTuc']; ?>" class="nav-link">
              <h3 style="color:#FFF"><?php echo $ImgS['TieuDe'];?> </h3>
              <p style="color:#FFF"><?php echo $ImgS['TomTat']; ?></p>
            </a>
          </div>
        </div>
        <?php
        }
        ?>

        <?php
        foreach($getImagesSliderItem as $Img)
        {
          ?>

          <div class="carousel-item ">
           <img src="images/<?php echo $Img['UrlHinh'];?>">
           <div class="carousel-caption d-none d-md-block">
            <a href="index.php?p=tin&idTinTuc=<?php echo $Img['idTinTuc']; ?>" class="nav-link">
              <h3 style="color:#FFF"><?php echo $Img['TieuDe']; ?></h3>
              <p style="color:#FFF"><?php echo $Img['TomTat'];?></p>
            </a>
          </div>
        </div>


        <?php
      }
      ?>
      <!-- Controls -->
      <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span></a>
        <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span></a>						
        </div>
      </div>
    </div>
    <style> 
    .tinmoinhat{
      height: 520px;
    }
  </style>

  <div class="col-sm-4 tinmoinhat">
    <?php
    $get2NewsColumnRights = $obj ->get2NewsColumnRights();
    foreach ($get2NewsColumnRights as $key => $value) {
      ?>    
      <div class="row">
        <div class="col-md-12">
          <a href="index.php?p=tin&idTinTuc=<?php echo $value['idTinTuc']; ?>" class="nav-link">
            <img src="images/<?php echo $value['UrlHinh'];?>" class="img-fluid card-img"><br>
            <p class="tieude"><?php echo $value['TieuDe']; ?></p>
          </a>
        </div>
      </div>  
      <?php
    }
    ?>

  </div>
</div> 
</div> 
