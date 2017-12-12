<?php 
$loaitin = new loaitin();
$showallloaitin =$loaitin->showallloaitin();
$theloai = new theloai();
$showalltheloai =$theloai->showalltheloai();
?>
         <?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idLT']))
  {
	  $row = $loaitin->showidloaitin($_GET['idLT']);
	  
  ?> 
          
           <form action="trangchu.php?table=loaitin&thaotac=update" method="post" enctype="multipart/form-data" >
              <div class="modal-body">
       	<table align="center">
         <?php ?>
          <tr><td>Id loại tin : </td><td><input type="text" name="idlt" value="<?php echo $tam=$_GET['idLT'];?>" readonly></td></tr>
          <tr><td>Id thể loại : </td><td><input type="text" name="idtl" value="<?php echo $row['idTL']; ?>">
			  	<!--select name="idTL">
                     <!--?php foreach($showalltheloai as $value) { ?>
                     <option value="<!--?php echo $value['idTL']; ?>">
                     <!--?php echo $value['idTL']."-".$value['TenTL']; ?>
                     </option>
                     <!--?php }?>
                </select-->
         						</td></tr>
          <tr><td>Tên loại tin : </td><td><input type="text" name="tenlt" value="<?php echo $row['TenLT']; ?>"></td></tr>
          <tr><td>Thứ tự : </td><td><input type="text" name="thutu" value="<?php echo $row['ThuTu']; ?>"></td></tr>
          <tr><td>Tình Trạng: </td><td>
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
                <a class="btn btn-danger" href="trangchu.php?table=loaitin" role="button" >Hủy</a>
               <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
             </div>
               </form>
               <?php
  }
}?>
            <div class="row">
               <div class="col-md-4">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Bảng tên thể loại
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                              <div style="margin: 52px" align="center";> <h3>Thể loại</h3>  </div>                       
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example1">
                                    <thead>
                                        <tr>
                                        <th>Id thể loại</th>
                                        <th>Tên thể loại</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($showalltheloai as $value)
										{ 
										?>
                                    <tr>
                                        <td><?php echo $value["idTL"];?></td>
                                        <td><?php echo $value["TenTL"];?></td>
                                        <?php  }?>
                                    </tbody>
                                    
                                </table>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-md-8">
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
						<form action="trangchu.php?table=loaitin&thaotac=them" method="post" enctype="multipart/form-data">
					<div class="modal-body">
					<table align="center">
						<tr><td>Id thể loại :</td><td>
							<select name="idtl"> 
							<?php foreach($showalltheloai as $value) { ?><option value="<?php echo $value['idTL']; ?>"><?php echo $value['idTL']."-".$value['TenTL']; ?></option>
							<?php }?></select>
						</td></tr>
						<tr><td>Tên loại tin :<td><input type="text" name="tenlt"></td></td></tr>
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
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Bảng loại tin
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                                            
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                        <th>Id loại tin</th>
                                        <th>Id thể loại</th>
                                        <th>Tên loại tin</th>
                                        <th>Thứ tự</th>
                                        <th>Ẩn Hiện</th>
                                        <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foreach($showallloaitin as $value)
										{ 
										?>
                                    <tr>
                                        <td><?php echo $value["idLT"];?></td>
                                        <td><?php echo $value["idTL"];?></td>
                                        <td><?php echo $value["TenLT"];?></td>
                                        <td><?php echo $value["ThuTu"];?></td>
                                        <td><?php echo $value["AnHien"];?></td>
                                        <td align="center">
                                        	<!--form action="trangchu.php?table=loaitin&thaotac=xoa&idLT=<?php echo $value['idLT'];?>" method="get" accept-charset="utf-8">
											  <button class="btn btn-sm btn-danger" type="button" data-toggle="modal" data-target="#confirmDelete" >
												<i class="glyphicon glyphicon-trash"></i> Xóa 
											  </button><hr>
											  <div class="modal fade" id="confirmDelete" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
												<div class="modal-dialog">
												  <div class="modal-content">
													<div class="modal-header">
													  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
													  <h4 class="modal-title">Xác nhận </h4>
													</div>
													<div class="modal-body">
													  <p>Bạn có chắc chắn muốn xóa ?</p>
													</div>
													<div class="modal-footer">
													  <button type="button" class="btn btn-default" data-dismiss="modal">Hủy bỏ</button>
													  <a href="trangchu.php?table=loaitin&thaotac=xoa&idLT=<?php echo $value['idLT'];?>"  class="btn btn-danger" id="confirm"> Xóa</a>
													</div>
												  </div>
												</div>
											  </div>
											</form-->  
                                        <a class="btn btn-danger glyphicon glyphicon-trash" href="trangchu.php?table=loaitin&thaotac=xoa&idLT=<?php echo $value['idLT'];?>"> Xóa</a>
                                        <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=loaitin&thaotac=sua&idLT=<?php echo $value['idLT'];?>"> Sửa</td>
                                        <?php  }?>
										</tr>
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
	$idTL=$_POST["idtl"];
    $TenLT = $_POST["tenlt"];
    $ThuTu =$_POST["thutu"];
    $AnHien = $_POST["tinhtrang"];
	$addloaitin1 = $loaitin->addloaitin($idTL,$TenLT,$ThuTu,$AnHien);
	  if(isset($addloaitin1)){
	?>
	<script type="text/javascript">window.location='trangchu.php?table=loaitin'</script>
	<?php
	  	}
  }
 }
?>
<?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idLT"]))
 { 
  if($_GET["thaotac"]=="xoa")
  {
	  	$idLT = $_GET["idLT"];
   		//$arr = array($idUser);
  		$deleteloaitin1=$loaitin->deleteloaitin($idLT);
	  if(isset($deleteloaitin1))
	  {
		  ?>
		  <script type="text/javascript">window.location='trangchu.php?table=loaitin'</script>
		  <?php
	  }
  }
 }
?>
<?php
if(isset($_GET['thaotac']))
{
	if($_GET['thaotac']=='update')
	{
		$idLT=$_POST['idlt'];
		$idTL=$_POST['idtl'];
		$TenLT=$_POST['tenlt'];
		$ThuTu=$_POST['thutu'];
		$AnHien=$_POST['tinhtrang'];
		$updateloaitin1=$loaitin->updateloaitin($idLT,$idTL,$TenLT,$ThuTu,$AnHien);
		if(isset($updateloaitin1)){
			?>
			<script type="text/javascript">window.location='trangchu.php?table=loaitin'</script>
			<?php
		}
	}
}
?>