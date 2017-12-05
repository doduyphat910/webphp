<?php 
$chucvu=2;
$congtacvien = new congtacvien();
$showcongtacvien = $congtacvien->showcongtacvien($chucvu);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
    <?php
    if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idUser']))
  {
	  $row = $congtacvien->showidCTV($_GET['idUser']);
	  
	  //print_r($row);
  ?>
            <form action="index.php?table=congtacvien&thaotac=update" method="post" enctype="multipart/form-data" >
              <div class="modal-body">
       	<table align="center">
         <?php ?>
          <tr><td>idUser: </td><td><input type="text" name="iduser" value="<?php echo $tam=$_GET['idUser']; ?> " readonly></td></tr>
          <tr><td>Họ và tên: </td><td><input type="text" name="hotenuser" value="<?php echo $row["HoTenUser"];?>"></td></tr>
          <tr><td>Username: </td><td><input type="text" name="username" value="<?php echo $row["UserName"];?>"></td></tr>
          <tr><td>Password: </td><td><input type="text" name="password" value="<?php echo $row["Password"];?>"></td></tr>
          <tr><td>Địa chỉ: </td><td><input type="text" name="diachi" value="<?php echo $row["DiaChi"];?>"></td></tr>
          <tr><td>Email: </td><td><input type="text" name="email" value="<?php echo $row["Email"];?>"></td></tr>
          <tr><td>Điện thoại: </td><td><input type="text" name="dienthoai" value="<?php echo $row["DienThoai"];?>"></td></tr>
          <tr><td>Giới tính:</td><td>
														<input type="radio" name="gioitinh" <?php 
									  if($row['GioiTinh']==1)
									  {
										?>
									checked="checked";
										<?php
									  }
									?> value="1"  >Nam 
										<input type="radio" name="gioitinh" <?php 
									  if($row['GioiTinh']==0)
									  {
										?>
									  checked="checked";
										<?php
									  }
									?> value="0" >Nữ
          					</td></tr>
          <tr><td>Ngày đăng ký :</td><td><input type="date" name="ngaydangki" value="<?php echo $row["NgayDangKi"];?>"></td></tr>
          <tr><td>Ngày Sinh:</td><td><input type="date" name="ngaysinh" value="<?php echo $row["NgaySinh"];?>">
          <tr><td>Chức vụ:</td><td>
          							<input type="radio" name="idgroup" <?php 
									  if($row['idGroup']==1)
									  {
										?>
									checked="checked";
										<?php
									  }
									?> value="1"  >User 
										<input type="radio" name="idgroup" <?php 
									  if($row['idGroup']==2)
									  {
										?>
									  checked="checked";
										<?php
									  }
									?> value="2" >CTV
          					</td></tr>                                     
        </table> 
              </div>
             <div align="center">
                <a class="btn btn-danger" href="index.php?table=congtacvien" role="button" >Hủy</a>
               <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
             </div>
               </form>
    <?php
  }
}?>
              
               <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Bảng cộng tác viên
                        </div>
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Thêm</button>
                              <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                              	<div class="modal-dialog">
                              	<!-- Modal content-->
                              		<div class="modal-content">
                              			<div class="modal-header">
                              			<button type="button" class="close" data-dismiss="modal">&times;</button>
                              				<h4 class="modal-title">Thêm</h4>
                              			</div>
                              			<form action="index.php?table=congtacvien&thaotac=them" method="post" enctype="multipart/form-data">
                              		<div class="modal-body">
                              		
                              		<table align="center">
                              		<tr><td>Họ và tên: </td><td><input type="text" name="hotenuser"></td></tr>
                                    <tr><td>Username: </td><td><input type="text" name="username" ></td></tr>
                                    <tr><td>Password: </td><td><input type="text" name="password" ></td></tr>
                                    <tr><td>Địa chỉ: </td><td><input type="text" name="diachi"></td></tr>
                                    <tr><td>Email: </td><td><input type="text" name="email"></td></tr>
                                    <tr><td>Điện thoại: </td><td><input type="text" name="dienthoai"></td></tr>
                                    <tr><td>Giới tính :</td>
                                      <td><select name="gioitinh"><option value="0">Nữ</option><option value="1">Nam</option></select></td>
                                    </tr>
                                    <tr><td>Ngày đăng ký :</td><td><input type="date" name="ngaydangki" value=""></td></tr>
                                    <tr><td>Ngày sinh :</td><td><input type="date" name="ngaysinh" value=""></td></tr>
                              			<tr><td> Chức vụ(idGroup): </td>
                              				<td><select name="idgroup"><option value="2">CTV</option></select></td>					
                             			</tr>                           			    			
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
                         <div class="panel-body">
                            <div class="table-responsive">                             
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Id user</th>
                                        <th>Họ tên user</th>
                                        <th>UserName</th>
                                        <th>Password</th>
                                        <th>Địa chỉ</th>
                                        <th>Email</th>
                                        <th>Điện thoại</th>
                                        <th>Giới tính</th>
                                        <th>Ngày đăng ký</th>
                                        <th>Ngày sinh</th>
                                        <th>Chức vụ(idGroup)</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                       <?php 
										foreach($showcongtacvien as $value)
										{ 	
										?>
                                        <td><?php echo $value['idUser']; ?></td>
                                        <td><?php echo $value['HoTenUser'];?></td>
                                        <td><?php echo $value['UserName'];?></td>
                                        <td><?php echo $value['Password'];?></td>
                                        <td><?php echo $value['DiaChi'];?></td>
                                        <td><?php echo $value['Email'];?></td>
                                        <td><?php echo $value['DienThoai'];?></td>
                                        <td><?php echo $value['GioiTinh'];?></td>
                                        <td><?php echo $value['NgayDangKi'];?></td>
                                        <td><?php echo $value['NgaySinh'];?></td>
                                        <td><?php echo $value['idGroup'];?></td>
                                        <td><a class="btn btn-warning" href="index.php?table=congtacvien&thaotac=xoa&idUser=<?php echo $value['idUser'];?>">Xóa</a>
                                        <a class="btn btn-primary" href="index.php?table=congtacvien&thaotac=sua&idUser=<?php echo $value['idUser'];?>">Sửa</td>
										</tr>
                                        <?php
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
 <?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idUser"]) )
 { 
  if($_GET["thaotac"]=="xoa")
  {
	  	$idUser = $_GET["idUser"];
   		//$arr = array($idUser);
  		$deleteCTV=$congtacvien->deleteCTV($idUser);
	  if(isset($deleteCTV))
	  {
		  ?>
		  <script type="text/javascript">window.location='index.php?table=congtacvien'</script>
		  <?php
	  }
  }// xóa user
}
?>       
<?php
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  { 
    $HoTenUser = $_POST["hotenuser"];
    $UserName =$_POST["username"];
    $Password = $_POST["password"];
    $DiaChi = $_POST["diachi"];
    $Email = $_POST["email"];
    $DienThoai = $_POST["dienthoai"];
    $GioiTinh = $_POST["gioitinh"];
    $NgaySinh = $_POST["ngaysinh"];
    $NgayDangKi = $_POST["ngaydangki"];
    $idGroup = $_POST["idgroup"];
	$addCTV1=$congtacvien->addCTV( $HoTenUser,$UserName,$Password,$DiaChi,$Email,$DienThoai,$GioiTinh,$NgaySinh,$NgayDangKi,$idGroup);
	  if(isset($addCTV1)){
	?>
	<script type="text/javascript">window.location='index.php?table=congtacvien'</script>
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
	$idUser=$_POST["iduser"];
    $HoTenUser = $_POST["hotenuser"];
    $UserName =$_POST["username"];
    $Password = $_POST["password"];
    $DiaChi = $_POST["diachi"];
    $Email = $_POST["email"];
    $DienThoai = $_POST["dienthoai"];
    $GioiTinh = $_POST["gioitinh"];
    $NgaySinh = $_POST["ngaysinh"];
    $NgayDangKi = $_POST["ngaydangki"];
    $idGroup = $_POST["idgroup"];
    $updateCTV1=$congtacvien->updateCTV($idUser,$HoTenUser,$UserName,$Password,$DiaChi,$Email,$DienThoai,$GioiTinh,$NgaySinh,$NgayDangKi,$idGroup);
	  	  if(isset($updateCTV1)){
	?>
	<script type="text/javascript">window.location='index.php?table=congtacvien'</script>
	<?php
}
}
  }
?>