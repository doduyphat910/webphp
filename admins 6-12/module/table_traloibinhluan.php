<?php 
$traloibinhluan = new traloibinhluan();
$showallTLBL = $traloibinhluan->showallTLBL();
?>
<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idTLBinhLuan']))
  {
   $row = $traloibinhluan->showidTLBL($_GET['idTLBinhLuan']);

	  //print_r($row);
   ?>           
   <form action="trangchu.php?table=traloibinhluan&thaotac=update" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
      <table align="center" width="100%">
       <?php ?>
       <tr><td>id trả lời bình luận : </td><td><input type="text" name="idtlbl" value="<?php echo $row['idTLBinhLuan']; ?>" readonly></td></tr>
       <tr><td>id bình luận : </td><td><input type="text" name="idbl" value="<?php echo $row['idBL']; ?>" readonly></td></tr>
       <tr><td>id user : </td><td><input type="text" name="iduser" value="<?php echo $row['idUser']; ?>" readonly></td></tr>
       <tr><td>Nội dung : </td><td><textarea name="noidung" rows="7" cols="20"><?php echo $row['NoiDung']; ?></textarea></td></tr>
	   <tr><td>Ngày đăng :</td><td><input type="date" name="ngaydang" value="<?php echo $row['NgayDang']; ?>"></td></tr>
       <tr><td>Tình Trạng :</td><td>
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
    <a class="btn btn-danger" href="trangchu.php?table=traloibinhluan" role="button" >Hủy</a>
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
       Bảng trả lời bình luận
     </div>
     <div class="panel-body">
      <div class="table-responsive">
                                      
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>Id trả lời bình luận</th>
          <th>Id bình luận</th>
          <th>Id user</th>
          <th>Nội dung</th>
          <th>Ngày đăng</th>
          <th>Tình trạng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach($showallTLBL as $value)
       { 
        ?>
        <tr>
          <td><?php echo $value['idTLBinhLuan'];?></td>
          <td><?php echo $value['idBL'];?></td>
          <td><?php echo $value['idUser'];?></td>
          <td><?php echo $value['NoiDung'];?></td>
          <td><?php echo $value['NgayDang'];?></td>
          <td><?php echo $value['AnHien'];?></td>
          <td align="center">
			<a href="trangchu.php?table=traloibinhluan&thaotac=xoa&idTLBinhLuan=<?php echo $value['idTLBinhLuan'];?>"  class="btn btn-danger glyphicon glyphicon-trash" id="confirm"> Xóa</a>		
            <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=traloibinhluan&thaotac=sua&idTLBinhLuan=<?php echo $value['idTLBinhLuan'];?>"> Sửa</td>
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
//Sửa SQL
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="update")
  {
   $idTLBinhLuan=$_POST["idtlbl"];
	$idBL=$_POST["idbl"];
   $idUser = $_POST["iduser"];
   $NoiDung =$_POST["noidung"];
	$NgayDang =$_POST["ngaydang"];
   $AnHien = $_POST["tinhtrang"];
   $updateTLBL1=$traloibinhluan->updateTLBL($idTLBinhLuan,$idBL,$idUser,$NoiDung,$NgayDang,$AnHien);
   if(isset($updateTLBL1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=traloibinhluan'</script>
     <?php
   }
 }
}
?>
<?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idTLBinhLuan"]))
{ 
  if($_GET["thaotac"]=="xoa")
  {
    $idTLBinhLuan = $_GET["idTLBinhLuan"];
    $deleteTLBL1=$traloibinhluan->deleteTLBL($idTLBinhLuan);
    if(isset($deleteTLBL1))
    {
      ?>
      <script type="text/javascript">window.location='trangchu.php?table=traloibinhluan'</script>
      <?php
    }
  }
}
?>