<?php 
$tintuc = new tintuc();
$showalltintuc =$tintuc->showalltintuc();
$loaitin = new loaitin();
$showallloaitin =$loaitin->showallloaitin();
$chucvu=2;
//$chucvu=3;
$congtacvien = new congtacvien();
$showcongtacvien = $congtacvien->showcongtacvien($chucvu);
?>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Bảng tin tức
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Thêm</button>
                              <!-- Modal -->
                              <div class="modal fade" id="myModal" role="dialog">
                              	<div class="modal-dialog modal-lg">
                              	<!-- Modal content-->
                              		<div class="modal-content">
                              			<div class="modal-header">
                              			<button type="button" class="close" data-dismiss="modal">&times;</button>
                              				<h4 class="modal-title">Thêm</h4>
                              			</div>
                              		<form action="#" method="post" enctype="multipart/form-data">
                              		<div class="modal-body">
                              		<table align="center">
                              			<tr><td>Id loại tin :</td><td>
														<select name="idlt"> 
                              				<?php foreach($showallloaitin as $value) { ?><option value="<?php echo $value['idLT']; ?>"><?php echo $value['idLT']."-".$value['TenLT']; ?></option>
                              				<?php }?></select>
                             								</td></tr>
                              			<tr><td>Id user :</td><td>
                              				<select name="iduser"> 
                              				<?php foreach($showcongtacvien as $value) { ?><option value="<?php echo $value['idUser']; ?>"><?php echo $value['idUser']."-".$value['HoTenUser']; ?></option>
                              				<?php }?></select>
                              							</td></tr>
                              			<tr><td>Tiêu đề :</td><td><textarea rows="2" cols="20" name="tieude"></textarea></td></tr>
                              			<tr><td>Tóm tắt :</td><td><textarea rows="2" cols="20" name="tomtat"></textarea></td></tr>
                              			<tr><td>Ngày đăng :</td><td><input type="date" name="ngaydang"></td></tr>
                              			<tr><td>Nội dung :</td><td>
                              								<textarea name="noidung" id="editor1" rows="30" cols="120"></textarea>
														<script>    CKEDITOR.replace( 'editor1' );</script>
														</td></tr>
                              			<tr><td>Số lần xem :</td><td><input type="text" name="solanxem"></td></tr>
                              			<tr><td>Nguồn :</td><td><input type="text" name="nguon"></td></tr>
                              			<tr><td>Hình ảnh :</td><td><input type="file" name="hinhanh"></td></tr>
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
                                        	<th>idTinTuc</th>
                                        	<th>idLT</th>
                                        	<th>idUser</th>
                                        	<th>Tiêu đề</th>
                                        	<th>Tóm tắt</th>
                                        	<th>Ngày đăng</th>
                                        	<th>Nội dung</th>
                                        	<th>Số lần xem</th>
                                        	<th>Nguồn</th>
                                            <th>Hình ảnh</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                      	<?php foreach($showalltintuc as $value) {?>
                                       	<td><?php echo $value['idTinTuc']; ?></td>
                                    	<td><?php echo $value['idLT']; ?></td>
                                    	<td><?php echo $value['idUser']; ?></td>
                                    	<td><?php echo $value['TieuDe']; ?></td>
                                    	<td><?php echo $value['TomTat']; ?></td>
                                    	<td><?php echo $value['NgayDang']; ?></td>
                                    	<td><textarea rows="7" cols="35" name="noidung" readonly> <?php echo $value["NoiDung"];?></textarea></td>
                                    	<td><?php echo $value['SoLanXem']; ?></td>
                                    	<td><?php echo $value['Nguon']; ?></td>
                                        <td><img src="../images/<?php echo $value['UrlHinh']; ?>"></td>
                                        <td><button type="button" class="btn btn-warning">Xóa</button>
                                        <button type="button" class="btn b>tn-primary">Sửa</button></td> 
                                        
                                     </tr>
                                     <?php } ?>	
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>