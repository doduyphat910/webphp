<?php
include "library/dbCon.php";
include "classes/autoload.php";
$obj = new tintuc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>

  <title>Newspaper</title>
</head>
<body>
	<!--Top-->
	<div>
   <nav id="top">
     <div class="container">
      <div class="row">
       <div class="col-sm-6 loichao"><h5>Welcome to Tin Tức 247</h5></div>
       <div class="col-sm-6 text-center"><a class="nav-link" href="#"><h6>Đăng nhập</h6></a></div>
     </div>
   </div>
 </nav>
</div>
<div style="clear:both"></div>
<!--Banner-->
<div>
 <img src="images/bild_header.png" class="img-fluid" alt="Responsive image">
</div>
<div style="clear:both"></div>
<!--Menu Tổng -->
<div>
  <nav class="navbar navbar-expand-xl navbar-light bg-faded">
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-content" aria-controls="nav-content" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
<?php
/*$data = $obj->getCategorys();
foreach ($data as $key => $value) {
  echo $value['TenTL'];
}*/
?>
  <!-- Brand -->
  <a class="navbar-brand" href="index.html"><strong>Home</strong></a>
  <!-- Links -->
  <div class="collapse navbar-collapse" id="nav-content">   
   <ul class="navbar-nav">
    <li class="nav-item">
     <a class="nav-link" href="thoisu.html">Thời Sự</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="gocnhin.html">Góc nhìn</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="thoigioi.html">Thới Giới</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="kinhdoanh.html">Kinh Doanh</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="giaodung.html">Giáo dục</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="phapluat.html">Phát Luật</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="congnghe.html">Công Nghệ</a>
   </li> 
   <li class="nav-item">
     <a class="nav-link" href="thethao.html">Thể Thao</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="video.html">Video</a>
   </li>                              
 </ul>
 <!-- Search -->
 <form class="form-inline" role="search">
  <input type="text" class="form-control">
  <button type="submit" class="btn btn-secondary">Search</button>
</form>
</nav>
</div>
<div style="clear:both"></div>
<div class="container">   
  <!--Side-->
  <div class="featured">
   <div class="row">
    <div class="col-sm-8" >
      <!-- Carousel -->
      <div id="demo" class="carousel slide" data-ride="carousel">
       <!-- Indicators -->
       <ul class="carousel-indicators">
         <li data-target="#demo" data-slide-to="0" class="active"></li>
         <li data-target="#demo" data-slide-to="1"></li>

       </ul>
       <!-- Wrapper for slides -->

       <div class="carousel-inner">
         <div class="carousel-item active">
          <img src="images/IpX.jpg">
          <div class="carousel-caption d-none d-md-block">
            <h3 style="color:#09F">Iphone X chưa về Việt Nam</h3>
            <p style="color:#09F">iPhone X sắp bán ở Campuchia và 13 thị trường</p>
          </div>
        </div>
        <div class="carousel-item">
         <img src="images/Jack_Ma.jpg">
         <div class="carousel-caption d-none d-md-block">
          <h3 style="color:#09F">Jack Ma - nguồn cảm hứng bất tận</h3>
          <p style="color:#09F">Jack Ma - doanh nhân thành công hàng đầu Trung Quốc</p>
        </div>
      </div>
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
    <div class="col-sm-4 tinmoinhat">    
        <div class="row">
        <div class="col-sm-12">
          <a href="#" class="nav-link">
            <img src="images/12.jpg" class="img-fluid"><br>
            <p class="tieude">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p>
          </a>
        </div>
      </div>     
      <div class="row">
        <div class="col-sm-12">
          <a href="#" class="nav-link">
            <img src="images/12.jpg" class="img-fluid"><br>
            <p class="tieude">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p>
          </a>
        </div>
      </div>     
    </div>

  </div>
</div>  

<div style="clear:both"></div>
<!--Content-->
<div class = "row">
 <div class = "col-lg-8">
   <hr />
   <h5 class="theloai">Tin trong ngày</h5>
   <div class = "row hinhgiua">
     <div class = "col-lg-4 thehinhgiua">
       <a href="iphonex.html"><img src="images/iphonex.jpg" class="img-fluid"/></a>
     </div>
     <div class = "col-lg-8">
       <a href="iphonex.html" class="nav-link">
        <p class="tieude">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p>
        <p class="mota">Thêm 14 thị trường bán iPhone X đợt 2 từ 23/11, ngay trước lễ Tạ ơn. Việt Nam không có trong danh sách này.</p>
      </a>
    </div>
  </div>

  <hr />

  <div class = "row hinhgiua">
   <div class = "col-lg-4 thehinhgiua">
     <a href="congnghe.html"><img src="images/iphonex.jpg" class="img-fluid"/></a>
   </div>
   <div class = "col-lg-8">
     <a href="congnghe.html" class="nav-link">
      <p class="tieude">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p>
      <p class="mota">Thêm 14 thị trường bán iPhone X đợt 2 từ 23/11, ngay trước lễ Tạ ơn. Việt Nam không có trong danh sách này.</p>
    </a>
  </div>
</div>

<hr />

<div class = "row hinhgiua">
 <div class = "col-lg-4 thehinhgiua">
   <a href="congnghe.html"><img src="images/iphonex.jpg" class="img-fluid"/></a>
 </div>
 <div class = "col-lg-8">
   <a href="congnghe.html" class="nav-link">
    <p class="tieude">iPhone X sắp bán ở Campuchia và 13 thị trường, chưa có VN</p>
    <p class="mota">Thêm 14 thị trường bán iPhone X đợt 2 từ 23/11, ngay trước lễ Tạ ơn. Việt Nam không có trong danh sách này.</p>
  </a>
</div>
</div>
<br>
<div class="xemthem float-sm-right">
  <a href="#">
    <button type="button" class="btn btn-info">Xem Thêm</button>
  </a>  
</div>
<br>
<hr/>
<!--the loai khac-->
<h5 class="theloai">Tin hot</h5>
<div class = "row hinhgiua">
 <div class = "col-lg-4 thehinhgiua">
   <a href="#"><img src="images/tsgt.jpg" class="img-fluid" /></a>
 </div>
 <div class = "col-lg-8">
   <a href="#" class="nav-link">
    <p class="tieude">Nhà đầu tư sợ rủi ro khi tham gia dự án cao tốc Bắc - Nam</p>
    <p class="mota">Dự án cao tốc Bắc - Nam sẽ chủ yếu thực hiện đầu tư bằng hình thức PPP. Các nhà đầu tư cho rằng nếu không minh bạch họ sẽ khó lòng tham gia dự án 15 tỷ USD này.</p>
  </a>
</div>
</div>
<hr />

<div class = "row hinhgiua">
 <div class = "col-lg-4 thehinhgiua">
   <a href="#"><img src="images/tsgt.jpg" class="img-fluid" /></a>
 </div>
 <div class = "col-lg-8">
   <a href="#" class="nav-link">
    <p class="tieude">Nhà đầu tư sợ rủi ro khi tham gia dự án cao tốc Bắc - Nam</p>
    <p class="mota">Dự án cao tốc Bắc - Nam sẽ chủ yếu thực hiện đầu tư bằng hình thức PPP. Các nhà đầu tư cho rằng nếu không minh bạch họ sẽ khó lòng tham gia dự án 15 tỷ USD này.</p>
  </a>
</div>
</div>
<hr />


<div class = "row hinhgiua">
 <div class = "col-lg-4 thehinhgiua">
   <a href="#"><img src="images/tsgt.jpg" class="img-fluid" /></a>
 </div>
 <div class = "col-lg-8">
   <a href="#" class="nav-link">
    <p class="tieude">Nhà đầu tư sợ rủi ro khi tham gia dự án cao tốc Bắc - Nam</p>
    <p class="mota">Dự án cao tốc Bắc - Nam sẽ chủ yếu thực hiện đầu tư bằng hình thức PPP. Các nhà đầu tư cho rằng nếu không minh bạch họ sẽ khó lòng tham gia dự án 15 tỷ USD này.</p>
  </a>
</div>
</div>
<div class="xemthem float-sm-right">
  <a href="#">
    <button type="button" class="btn btn-info">Xem Thêm</button>
  </a>  
</div>
<br>
<hr />


</div>
<div class = "col-lg-4" style = "background-color: green">Ads</div>
</div>

</div>
<!--footer-->
<div class="container-fluid text-center box" style="background-color:#CCF;">
  Tin tức 247: Tin nhanh nóng Shock Hot nhất trong ngày<br>Xem thêm :
  <a style="color:#000"><a href="Newspaper.html">Tin tuc 247</a></a><br />
  Liên hệ: Tin tức 247 trong ngày: Cập nhật tin nhanh 24h, tin NÓNG 24h, đọc tin SOCK, tin HOT nhất, Tin tuc 24h mới nhất hôm nay, mời bạn bấm xem ngay.
</body>
</html>