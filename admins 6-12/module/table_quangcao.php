<?php 
$quangcao= new quangcao();
$ShowallQC=$quangcao->ShowallQC();
$vitriads= new vitriquangcao();
$showvitriQC=$vitriads->showvitriQC();
?>
<?php
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="sua")
  {
    if(isset($_GET['idQC'])){
      $idQC = $_GET['idQC'];
    }
    $showidQC = $quangcao->showidQC($idQC);
    ?>
    <form action="trangchu.php?table=quangcao&thaotac=update&idQC=<?php echo $idQC;?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <table align="center" width="100%">

          <?php
          foreach ($showidQC as $key => $value) {
            ?>
            <tr><td>Id Quảng cáo :</td><td><input type="text" name="idqc" value="<?php echo $value['idQC']; ?>" readonly ></td></tr>
            <tr><td>Id Vị trí :</td><td>
              <select name="idvt"> 
                <?php foreach($showvitriQC as $value1) 
                { 
                  ?>
                  <option value="<?php echo $value1['idVT']; ?>" >
                    <?php 
                    echo $value1['idVT']."-".$value1['TenVT']; 
                    ?>
                  </option>
                  <?php
                  if($value1['idVT'] == $value['idVT'])
				  {
                    ?>
                    <option value="<?php echo $value1['idVT']; ?>" selected>
                     <?php 
                     echo $value1['idVT']."-".$value1['TenVT']; 
                     ?>                       
                   </option>
                   <?php
                 }
                 ?>
                 <?php 
               }
               ?>
             </select>
           </td></tr>
           <tr><td>Mô tả :</td><td><!--input type="text" name="mota" value="<?php //echo $value['MoTa']; ?>" style="width: 300px;" -->
          						<textarea name="mota"><?php echo $value['MoTa']; ?></textarea>
           					</td></tr>
           <tr><td>Đường dẫn quảng cáo :</td><td><input type="text" name="url" value="<?php echo $value['Url']; ?>" style="width: 300px;" ></td></tr>
           <tr><td>Hình quảng cáo :</td><td><img src="./images/quangcao/<?php echo $value['UrlHinh']; ?>" style="width: 150px;height: 100px;"><input type="file" name="hinhanh" /> </td></tr>
           <tr><td>Ngày bắt đầu :</td><td><input type="date" name="ngaybatdau" value="<?php echo $value['NgayBatDau']; ?>" ></td></tr>
           <tr><td>Ngày kết thúc :</td><td><input type="date" name="ngayketthuc" value="<?php echo $value['NgayKetThuc']; ?>" ></td></tr>
            <?php
          }
          ?>    
        </table>                                  
      </div>
      <div align="center">
    <a class="btn btn-danger" href="trangchu.php?table=quangcao" role="button" >Hủy</a>
    <input class="btn btn-success" type="submit" value="Sửa">
  </div>
    </form>
    <?php
  }
}
?>
<div class="row">
   <div class="col-md-12">
	<button type="button" class="btn btn-primary btn-lg glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal"> Thêm</button>
				  <!-- Modal -->
				  <div class="modal fade" id="myModal" role="dialog">
					<div class="modal-dialog">
					<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Thêm</h4>
							</div>
						<form action="trangchu.php?table=quangcao&thaotac=them" method="post" enctype="multipart/form-data">
						<div class="modal-body">
						<table align="center">
							<tr><td>Id vị trí :<td>
												<select name="idvt"> 
								<?php foreach($showvitriQC as $value) { ?><option value="<?php echo $value['idVT']; ?>"><?php echo $value['idVT']."-".$value['TenVT']; ?></option>
								<?php }?></select>

												</td></td></tr>
							<tr><td>Mô tả :</td><td><input type="text" name="mota"></td></tr></tr>
							<tr><td>Đường dẫn quảng cáo :<td><input type="text" name="Url"></td></td></tr>
							<tr><td>Hình quảng cáo :<td><input type="file" name="Urlhinh"></td></td></tr>
							<tr><td>Ngày bắt đầu :<td><input type="date" name="ngaybatdau"></td></td></tr>
							<tr><td>Ngày kết thúc :<td><input type="date" name="ngayketthuc"></td></td></tr>

						</table>                              		
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<input class="btn btn-primary" type="submit" value="Thêm" name="submit">
						</div>
						</form>
						</div>
					</div>
				  </div> 
   </div>
	<div class="col-md-12">
		<!-- Advanced Tables -->
		<div class="panel panel-default">
			<div class="panel-heading">
				 Bảng quảng cáo
			</div>

			<div class="panel-body">
				<div class="table-responsive">  

					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
							<th>Id quang cao</th>
							<th>Id vi tri</th>
							<th>Mô tả</th>
							<th>Đường dẫn quảng cáo</th>
							<th>Hình quảng cáo</th>
							<th>Ngày bắt đầu</th>
							<th>Ngày kết thúc</th>
							<th>Thao tác</th>
							</tr>
						</thead>
						<tbody>
						   <?php foreach($ShowallQC as $value)
							{ 
							?>
							<tr>
							<td><?php echo $value['idQC'];?></td>
							<td><?php echo $value['idVT'];?></td>
							<td><?php echo $value['MoTa'];?></td>
							<td><?php echo $value['Url'];?></td>
							<td><img src="./images/quangcao/<?php echo $value['UrlHinh'];?>" style="width: 150px;height: 100px;"></td>
							<td><?php echo $value['NgayBatDau'];?></td>
							<td><?php echo $value['NgayKetThuc'];?></td>
							<td align="center">
							
										  <a href="trangchu.php?table=quangcao&thaotac=xoa&idQC=<?php echo $value['idQC'];?>"class="btn btn-danger glyphicon glyphicon-trash"> Xóa</a>
										
							<a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=quangcao&thaotac=sua&idQC=<?php echo $value['idQC'];?>"> Sửa</td>
							</tr>    
							<?php } ?>
						</tbody>
					</table>
				</div>

			</div>
		</div>
		<!--End Advanced Tables -->
	</div>
</div>
<?php
if(isset($_GET["thaotac"]))
	{ 
	if($_GET["thaotac"]=="them")
		{ 
		$idVT = $_POST["idvt"];
		$MoTa =$_POST["mota"];
		$Url = $_POST["Url"];
		$NgayBatDau = $_POST["ngaybatdau"];
		$NgayKetThuc = $_POST["ngayketthuc"];
		if($_FILES["Urlhinh"]['name']!="")    
			{ 

			$h= $_FILES["Urlhinh"];
			$ten = $h["name"];
			$tam = $h["tmp_name"];
			move_uploaded_file($tam,"images/quangcao/".$ten);
			$Link=$ten;
			}

			$addQC1 =$quangcao->addQC($idVT,$MoTa,$Url,$Link,$NgayBatDau,$NgayKetThuc);
			if(isset($addQC1))
			{
			?>
			<script type="text/javascript">window.location='trangchu.php?table=quangcao'</script>
			<?php
			}
		}
	}
?>
	<?php 
	if(isset($_GET["thaotac"]) && isset($_GET["idQC"]))
		{ 
		if($_GET["thaotac"]=="xoa")
			{
			$idQC = $_GET["idQC"];
			//print_r($_GET);exit();
			$deleteQC1=$quangcao->deleteQC($idQC);
			if(isset($deleteQC1))
				{
				?>
				<script type="text/javascript">window.location='trangchu.php?table=quangcao'</script>
				<?php
				}
			}
		}
?>


<?php
//Sửa SQL
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="update")
  {
   $idQC=$_POST["idqc"];
   $idVT = $_POST["idvt"];
   $MoTa =$_POST["mota"];
   $Url = $_POST["url"];
   $NgayBatDau = $_POST["ngaybatdau"];
   $NgayKetThuc = $_POST["ngayketthuc"];

   if($_FILES["hinhanh"]['name']!="")    
    { 

      $h= $_FILES["hinhanh"];
      $ten = $h["name"];
      $tam = $h["tmp_name"];
      move_uploaded_file($tam,"images/quangcao/".$ten);
      $Link=$ten;
    }
	 else{
        $showidQC = $quangcao->showidQC($idQC);
        foreach ($showidQC as $key => $value) {
          $Link = $value['UrlHinh'];
        }
      }
    //print_r($_POST);
    $updateQC1 = $quangcao->updateQC($idQC,$idVT,$MoTa,$Url,$Link,$NgayBatDau,$NgayKetThuc);
	  			if(isset($updateQC1))
				{
				?>
				<script type="text/javascript">window.location='trangchu.php?table=quangcao'</script>
				<?php
				}
  }
}
?>