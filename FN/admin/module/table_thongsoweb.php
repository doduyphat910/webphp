<?php
$tintuc = new tintuc();
$showalltintuc =$tintuc->showalltintuc();
$theloai = new theloai();
$showalltheloai =$theloai->showalltheloai();
$loaitin = new loaitin();
$showallloaitin =$loaitin->showallloaitin();
$quangcao= new quangcao();
$ShowallQC=$quangcao->ShowallQC();
$binhluan = new binhluan();
$showallbinhluan =$binhluan->showallbinhluan();
$binhchon= new binhchon();
$showallbinhchon=$binhchon->showallbinhchon();
function dem ($show){
      $max = 0;
  for ($i=1; $i <= sizeof($show) ; $i++) { 
    if($max < $i){
      $max = $i;
    }
  }
  return $max;
}

//echo dem($showalltintuc);
?>
<script type="text/javascript" src="./assets/js/Chart.min.js"></script>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
<body>
<div class="container-fluid">
<div class="row">
	<div class="col-md-3 panel panel-back noti-box">
		<span class="icon-box bg-color-red set-icon">
			<i class="fa fa-newspaper-o" aria-hidden="true"></i>
		</span>
		<div class="text-box" >
			<p class="main-text"><?php echo dem($showalltintuc); ?> Tin tức</p>
			<p class="text-muted">Bảng tin tức</p>
		</div>
	</div>
	<div class="col-md-3 panel panel-back noti-box">
		<span class="icon-box bg-color-green set-icon">
			<i class="fa fa-bullseye" aria-hidden="true"></i>
		</span>
		<div class="text-box" >
			<p class="main-text"><?php echo dem($showalltheloai); ?> Thể loại</p>
			<p class="text-muted">Bảng thể loại</p>
		</div>
	</div>
	<div class="col-md-3 panel panel-back noti-box">
		<span class="icon-box bg-color-blue set-icon">
			<i class="fa fa-circle-thin" aria-hidden="true"></i>
		</span>
		<div class="text-box" >
			<p class="main-text"><?php echo dem($showallloaitin); ?> Loại tin</p>
			<p class="text-muted">Bảng loại tin</p>
		</div>
	</div>
	<div class="col-md-3 panel panel-back noti-box">
		<span class="icon-box bg-color-red set-icon" style="background-color:cadetblue">
			<i class="fa fa-picture-o" aria-hidden="true"></i>
		</span>
		<div class="text-box" >
			<p class="main-text"><?php echo dem($ShowallQC); ?> Quảng cáo</p>
			<p class="text-muted">Bảng quảng cao</p>
		</div>
	</div>
	
	<div class="row" style="margin-top: 200px;">
		<div class="col-md-8" style="background-color: ghostwhite;">
			<canvas id="canvas" height="550" width="1000
			" class="col-md-8" ></canvas>
		
		
 			<script type="text/javascript">
			
				var BarChart = {
					labels: ["Tin tức", "Thể loại", "Loại tin", "Quảng cáo", "Bình luận"],
					datasets: [{
						fillColor: "rgba(151,249,190,0.5)",
						strokeColor: "rgba(255,255,255,1)",
						data: [<?php echo dem($showalltintuc); ?>,<?php echo dem($showalltheloai); ?>, <?php echo dem($showallloaitin); ?>, <?php echo dem($ShowallQC); ?>, 
							   <?php echo dem($showallbinhluan); ?>]
					}, ]
				}
				var myBarChart = new Chart(document.getElementById("canvas").getContext("2d")).Bar(BarChart, {scaleFontSize: 14, scaleFontColor: "#ff8540"});

			</script>
			
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
						<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-brown set-icon">
							<i class="fa fa-life-ring" aria-hidden="true"></i>
						</span>
						<div class="text-box" >
							<p class="main-text"><?php echo dem($showallbinhluan); ?> Bình luận</p>
							<p class="text-muted">Bảng bình luận</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
						<div class="panel panel-back noti-box">
						<span class="icon-box bg-color-white set-icon" style="background-color:slateblue;color: white">
							<i class="fa fa-empire" aria-hidden="true"></i>
						</span>
						<div class="text-box" >
							<p class="main-text"><?php echo dem($showallbinhchon); ?> Bình chọn</p>
							<p class="text-muted">Bảng bình chọn</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div><img src="./logo/coollogo_com-357891.gif" width="100%;"></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>