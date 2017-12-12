<?php 
$binhluan = new binhluan();
$showallbinhluan =$binhluan->showallbinhluan();
?>
<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idBL']))
  {
   $row = $binhluan->showidbinhluan($_GET['idBL']);

	  //print_r($row);
   ?>           
   <form action="trangchu.php?table=binhluan&thaotac=update" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
      <table align="center" width="100%">
       <?php ?>
       <tr><td>id bình luận: </td><td><input type="text" name="idbl" value="<?php echo $row['idBL']; ?>" readonly></td></tr>
       <tr><td>id tin tức: </td><td><input type="text" name="idtintuc" value="<?php echo $row['idTinTuc']; ?>" readonly></td></tr>
       <tr><td>id User :</td><td><input type="text" name="iduser" value="<?php echo $row['idUser'];?>" readonly></td></tr>
       <tr><td>Nội dung :</td><td><textarea name="noidung" rows="15" cols="70"><?php echo $row['NoiDung']; ?></textarea></td></tr>
       <tr><td>Ngày đăng :</td><td><input type="date" name="ngaydang" value="<?php echo $row['NgayDang']; ?>"></td></tr>
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
    <a class="btn btn-danger" href="trangchu.php?table=binhluan" role="button" >Hủy</a>
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
       Bảng bình luận
     </div>
     <div class="panel-body">
      <div class="table-responsive">
                                      
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
      <thead>
        <tr>
          <th>Id bình luận</th>
          <th>Id tin tức</th>
          <th>Id user</th>
          <th>Nội dung</th>
          <th>Ngày đăng</th>
          <th>Tình trạng</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
       <?php foreach($showallbinhluan as $value)
       { 
        ?>
        <tr>
          <td><?php echo $value['idBL'];?></td>
          <td><?php echo $value['idTinTuc'];?></td>
          <td><?php echo $value['idUser'];?></td>
          <td><?php echo $value['NoiDung'];?></td>
          <td><?php echo $value['NgayDang'];?></td>
          <td><?php echo $value['AnHien'];?></td>
          <td align="center">
			<a href="trangchu.php?table=binhluan&thaotac=xoa&idBL=<?php echo $value['idBL'];?>"  class="btn btn-danger glyphicon glyphicon-trash" id="confirm"> Xóa</a>		
            <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=binhluan&thaotac=sua&idBL=<?php echo $value['idBL'];?>"> Sửa</td>
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
if(isset($_GET["thaotac"]) &&isset($_GET["idBL"]))
{ 
  if($_GET["thaotac"]=="xoa")
  {
    $idBL = $_GET["idBL"];
    $deletebinhluan1=$binhluan->deletebinhluan($idBL);
    if(isset($deletebinhluan1))
    {
      ?>
      <script type="text/javascript">window.location='trangchu.php?table=binhluan'</script>
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
   $idBL=$_POST["idbl"];
   $idTinTuc=$_POST['idtintuc'];
   $idUser=$_POST['iduser'];
   $NoiDung = $_POST["noidung"];
   $NgayDang =$_POST["ngaydang"];
   $AnHien = $_POST["tinhtrang"];
   $updatebinhluan1=$binhluan->updatebinhluan($idBL,$idTinTuc,$idUser,$NoiDung,$NgayDang,$AnHien);
   if(isset($updatebinhluan1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=binhluan'</script>
     <?php
   }
 }
}
?>