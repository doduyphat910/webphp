<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<?php
$idTinTuc = $_GET['idTinTuc'];
$obj = new tintuc();
$get1News= $obj->get1News($idTinTuc);
//print_r($get1News);
?>
<?php
foreach ($get1News as $key => $value) {
  ?>
  <div class="container">         
    <div class="row container box text-center canhgiua">
     <div class="col-md-8">
      <div class="tintuc"> <strong style="font-size:30px;"><?php echo $value['TieuDe'];?></strong>
        
        <p style="font-weight:bold" class="text-justify"><?php echo $value['TomTat']; ?></p>
        <?php echo $value['NoiDung']; ?>
        <!--<p class="font-weight-bold text-right">Văn Chương</p>-->
        <?php
      }
      ?>
      <div class="col-md-12 row" style="font-size:30px;"><strong>Tin liên quan</strong></div>
      <div class="row">
        <div class="col-md-3 col-sm-12">        
          <a href="#" class="nav-link"><img src="images/IpX.jpg" class="img-fluid card"><p class="mota">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p></a>
        </div>
        <div class="col-md-3 col-sm-12">
          <a href="#" class="nav-link"><img src="images/IpX.jpg" class="img-fluid card"><p class="mota">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p></a>
        </div>
        <div class="col-md-3 col-sm-12">
          <a href="#" class="nav-link"><img src="images/IpX.jpg" class="img-fluid card-img"><p class="mota">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p></a>
        </div>
        <div class="col-md-3 col-sm-12">
          <a href="#" class="nav-link"><img src="images/IpX.jpg" class="img-fluid card"><p class="mota">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p></a>
        </div>
      </div>
      <!--form binh luan-->
      <form>
       <div class="form-group">
        <label for="comment">Bình Luận:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <button type="button" class="btn btn-default">Gữi bình luận</button>
    </form>



    <!--khu vuc cac binh luan khac-->               
    <div class="container box canhgiua">
      <div class="row">
        <div class="col-md-12">

          <h3 class="text">Ý kiến các đọc giả</h3>
          <hr/>
          <ul class="comments">
            <li class="clearfix">
              
              <div>
                <p class="meta">Dec 18, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Etiam a sapien odio, sit amet
                </p>
              </div>
            </li>
            <li class="clearfix">
              
              <div>
                <p class="meta">Dec 19, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Etiam a sapien odio, sit amet
                </p>
              </div>
              
              <ul class="comments">
                <li class="clearfix">
                  
                  <div>
                    <p class="meta">Dec 20, 2014 <a href="#">JohnDoe</a> says : <i class="pull-right"><a href="#"><small>Reply</small></a></i></p>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                      Etiam a sapien odio, sit amet
                    </p>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>  

  </div>		
  
</div>
<!--qc-->
</div>
</div>


</div>