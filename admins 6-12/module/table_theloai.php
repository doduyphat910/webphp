<?php 
$theloai = new theloai();
$showalltheloai =$theloai->showalltheloai();
?>
<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idTL']))
  {
	  $row = $theloai->showidTheLoai($_GET['idTL']);
	  
	  //print_r($row);
  ?>           <form action="index.php?table=theloai&thaotac=update" method="post" enctype="multipart/form-data" >
              <div class="modal-body">
       	<table align="center">
         <?php ?>
          <tr><td>idTL: </td><td><input type="text" name="iduser" value="<?php echo $tam=$_GET['idTL']; ?> " readonly></td></tr>
          <tr><td>Tên thể loại: </td><td><input type="text" name="tentl" value="<?php echo $row['TenTL']; ?>"></td></tr>
          <tr><td>Thứ tự :</td><td><input type="text" name="thutu" value="<?php echo $row['ThuTu']; ?>"></td></tr>
          <tr><td>Tình Trạng:</td><td>
          			<input type="radio" name="tinhtrang" <?php 
									  if($row['AnHien']==1)
									  {
										?>
									checked="checked";
										<?php
									  }
									?> value="1">Hiện  
					<input type="radio" name="tinhtrang" <?php 
									  if($row['AnHien']==0)
									  {
										?>
									  checked="checked";
										<?php
									  }
									?> value="0" >Ẩn
			  </td></tr>                                
        </table> 
              </div>
             <div align="center">
                <a class="btn btn-danger" href="index.php?table=theloai" role="button" >Hủy</a>
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
                             Bảng thể loại
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
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
                              		<form action="index.php?table=theloai&thaotac=them" method="post" enctype="multipart/form-data">
                              		<div class="modal-body">
                              		<table align="center">
                              			<tr><td>Tên thể loại :<td><input type="text" name="tentl"></td></td></tr>
                              			<tr><td>Thứ tự :</td><td><input type="text" name="thutu"></td></tr>
                              			<tr><td>Ẩn Hiện :</td>
                              				<td><select name="tinhtrang"><option value="0">Ẩn</option><option value="1">Hiện</option></select></td>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Id Thể loại</th>
                                        <th>Tên thể loại</th>
                                        <th>Thứ tự</th>
                                        <th>Ẩn Hiện</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($showalltheloai as $value)
										{ 
										?>
                                   		<tr>
                                        <td><?php echo $value['idTL'];?></td>
                                        <td><?php echo $value['TenTL'];?></td>
                                        <td><?php echo $value['ThuTu'];?></td>
                                        <td><?php echo $value['AnHien'];?></td>
                                        <td align="center"><a class="btn btn-warning" href="index.php?table=theloai&thaotac=xoa&idTL=<?php echo $value['idTL'];?>">Xóa</a>
                                        <a class="btn btn-primary" href="index.php?table=theloai&thaotac=sua&idTL=<?php echo $value['idTL'];?>">Sửa</td>
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
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });		
    </script>
<?php
 if(isset($_GET["thaotac"]))
 { 
  if($_GET["thaotac"]=="them")
  { 
    $TenTL = $_POST["tentl"];
    $ThuTu =$_POST["thutu"];
    $AnHien = $_POST["tinhtrang"];
	$addTheLoai1 =$theloai->addTheLoai($TenTL,$ThuTu,$AnHien);
	  if(isset($addTheLoai1)){
	?>
	<script type="text/javascript">window.location='index.php?table=theloai'</script>
	<?php
}
  }
 }
?>
<?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idTL"]))
 { 
  if($_GET["thaotac"]=="xoa")
  {
	  	$idUser = $_GET["idTL"];
   		//$arr = array($idUser);
  		$deleteTheLoai1=$theloai->deleteTheLoai($idUser);
	  if(isset($deleteTheLoai1))
	  {
		  ?>
		  <script type="text/javascript">window.location='index.php?table=theloai'</script>
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
	$idTL=$_POST["iduser"];
	$TenTL = $_POST["tentl"];
    $ThuTu =$_POST["thutu"];
    $AnHien = $_POST["tinhtrang"];
    $updateTheLoai1=$theloai->updateTheLoai($idTL,$TenTL,$ThuTu,$AnHien);
	  	  if(isset($updateTheLoai1)){
	?>
	<script type="text/javascript">window.location='index.php?table=theloai'</script>
	<?php
}
}
  }
?>