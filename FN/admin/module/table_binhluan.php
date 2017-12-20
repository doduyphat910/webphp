<?php 
$binhluan = new binhluan();
$showallbinhluan =$binhluan->showallbinhluan();
$tintuc = new tintuc();
$showalltintuc =$tintuc->showalltintuc();
$user=new user();
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
       <tr><td>Tin tức: </td><td>
         <!--input type="text" name="idtintuc" value="<?php //echo $row['idTinTuc']; ?>" readonly-->
         <select name="idtintuc" readonly>
           <?php 
           $showTinCapNhat = $tintuc->showTinCapNhat($row['idTinTuc']);
           foreach($showTinCapNhat as $value) 
           { 
             ?>
             <option value="<?php echo $value['idTinTuc']; ?>">
               <?php echo $value['idTinTuc']."-".$value['TieuDe']; ?>
             </option>
             <?php
             if($value['idTinTuc'] == $row['idTinTuc'])
             {
              ?>
              <option value="<?php echo $value['idTinTuc']; ?>" selected>
               <?php 
               echo $value['idTinTuc']."-".$value['TieuDe']; 
               ?>                       
             </option>
             <?php
           }
         }
         ?>
       </td></tr>
       <tr><td>id User :</td><td><input type="text" name="iduser" value="<?php //echo $row['idUser'];
       $idu=$user->showidUser($row['idUser']);

       echo $idu['idUser'];
       ?>" readonly></td></tr>
       <tr><td>Nội dung :</td><td><textarea name="noidung" rows="10" cols="45" readonly><?php echo $row['NoiDung']; ?></textarea></td></tr>
       <tr><td>Ngày đăng :</td><td><input type="date-time" name="ngaydang" readonly value="<?php echo $row['NgayDang']; ?>">
       </td></tr>
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
      <tr><td>Nội dung sửa :</td><td><textarea name="noidungsua" rows="10" cols="45" readonly><?php echo $row['NoiDungUpdate']; ?></textarea></td></tr>
      <tr><td>Ngày sửa :</td><td><input type="date-time" name="ngaysua" readonly value="<?php echo $row['TGUpdate']; ?>"></td></tr>

      <tr><td>Tình Trạng duyệt sửa:</td><td>
       <input type="radio" name="tinhtrangduyet" <?php 
       if($row['DuyetUpdate']==1)
       {
        ?>
        checked="checked";
        <?php
      }
      ?> value="1">Đồng ý  
      <input type="radio" name="tinhtrangduyet" <?php 
      if($row['DuyetUpdate']==0)
      {
        ?>
        checked="checked";
        <?php
      }
      ?> value="0" >Không đồng ý
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
              <th>Id và tên tin tức</th>
              <th>Id và tên user</th>
              <th>Nội dung</th>
              <th>Ngày đăng</th>
              <th>Tình trạng</th>
              <th>Nội dung user sửa</th>
              <th>Thời gian user sửa</th>
              <th>Tình trạng duyệt sửa</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
           <?php foreach($showallbinhluan as $value)
           { 
            ?>
            <tr>
              <td><?php echo $value['idBL'];?></td>
              <td><?php  $tt=$tintuc->showTinCapNhat($value['idTinTuc']);
              $tentin=$tintuc->showTinCapNhat($value['idTinTuc']);
              echo $tentin[0]['idTinTuc']."-".$tt[0]['TieuDe'];?></td>
          <td><?php //echo $value['idUser'];
          $id=$user->showidUser($value['idUser']);
          $ten=$user->showidUser($value['idUser']);
          echo $id['idUser']."-".$ten['UserName'];
          ?></td>
          <td><?php echo $value['NoiDung'];?></td>
          <td><?php echo $value['NgayDang'];?></td>
          <td><?php echo $value['AnHien'];?></td>
          <td><?php echo $value['NoiDungUpdate'];?></td>
          <td><?php echo $value['TGUpdate'];?></td>
          <td><?php echo $value['DuyetUpdate'];?></td>
          <td align="center">
           <a href="trangchu.php?table=binhluan&thaotac=xoa&idBL=<?php echo $value['idBL'];?>" onclick="return confirm('Are you sure?')" class="btn btn-danger glyphicon glyphicon-trash" id="confirm"> Xóa</a>		
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
   //$idTinTuc=$_POST['idtintuc'];
   //$idUser=$_POST['iduser'];
   //$NoiDung = $_POST["noidung"];
   //$NgayDang =$_POST["ngaydang"];
   $AnHien = $_POST["tinhtrang"];
   $DuyetSua = $_POST["tinhtrangduyet"];

   $TGUpdate = $_POST['ngaysua'];
   $NoiDungUpdate = $_POST['noidungsua'];
   $updateAnHien1=$binhluan->updateAnHien($idBL,$AnHien);
   if(isset($updateAnHien1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=binhluan'</script>
     <?php
   }
   if($DuyetSua == 1){
     $updatebinhluan1=$binhluan->updatebinhluan($idBL,$AnHien,$DuyetSua, $NoiDungUpdate, $TGUpdate);
     if(isset($updatebinhluan1)){
       ?>
       <script type="text/javascript">window.location='trangchu.php?table=binhluan'</script>
       <?php
     }
   }

	 //print_r($_POST);exit;

 }
}
?>