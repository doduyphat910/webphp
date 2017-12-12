<?php 
$tintuc = new tintuc();
$nguon = $_SESSION['ctv']['HoTenUser'];
$showalltintuc =$tintuc->showalltintucCTV($nguon);
$loaitin = new loaitin();
$showallloaitin =$loaitin->showallloaitin();
$link="";
$congtacvien = new congtacvien();
?>
<?php
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="sua")
  {
    if(isset($_GET['idTinTuc'])){
      $idTinTuc = $_GET['idTinTuc'];
    }
    $showTinCapNhat = $congtacvien->showTinCapNhat($idTinTuc);
    ?>
    <form action="ctv.php?table=tintuc1&thaotac=sua&idTinTuc=<?php echo $idTinTuc;?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
        <table align="center" width="100%" border="1">

          <?php
          foreach ($showTinCapNhat as $key => $value) {
            ?>
            <tr><td>Id Tin Tức :</td><td><input type="text" name="idTinTuc" value="<?php echo $value['idTinTuc']; ?>" readonly ></td></tr>
            <tr><td>Id loại tin :</td><td>
              <select name="idlt"> 
                <?php foreach($showallloaitin as $value1) 
                { 
                  ?>
                  <option value="<?php echo $value1['idLT']; ?>" >
                    <?php 
                    echo $value1['idLT']."-".$value1['TenLT']; 
                    ?>
                  </option>
                  <?php
                  if($value1['idLT'] == $value['idLT']){
                    ?>
                    <option value="<?php echo $value1['idLT']; ?>" selected>
                     <?php 
                     echo $value1['idLT']."-".$value1['TenLT']; 
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
           <tr><td>Tiêu đề :</td><td><textarea name="tieude"><?php echo $value['TieuDe']; ?></textarea></td></tr>
           <tr><td>Tóm tắt :</td><td><textarea name="tomtat"><?php echo $value['TomTat']; ?></textarea></td></tr>
           <tr><td>Nội dung :</td><td>
            <textarea id="content" name=noidung ><?php echo $value['NoiDung']; ?></textarea>
            <script type="text/javascript">CKEDITOR.replace('noidung'); </script>
          </td></tr>
          <tr><td>Số lần xem :</td><td><input type="text" name="solanxem" 
            readonly value="<?php echo $value['SoLanXem']; ?>"></td></tr>
            <tr><td>Nguồn :</td><td><input type="text" name="nguon" 
              value="<?php echo $_SESSION['ctv']['HoTenUser']; ?>" readonly ></td></tr>
              <tr><td>Hình ảnh :</td><td ><img src="images/<?php echo $value['UrlHinh']; ?>" 
                style="width: 100px;height: 100px;"><hr><input type="file" name="hinhanh" ></td>
              </tr>
              <tr><td>Tình Trạng:</td><td>
               <input type="radio" name="tinhtrang" disabled="disable" <?php 
               if($value['AnHien']==1)
               {
                ?>
                checked="checked";
                <?php
              }
              ?> value="1">Hiện  
              <input type="radio" name="tinhtrang" disabled="disable" <?php 
              if($value['AnHien']==0)
              {
                ?>
                checked="checked";
                <?php
              }
              ?> value="0" >Ẩn
            </td></tr>   
            <?php
          }
          ?>    
        </table>                                  
      </div>
      <div class="modal-footer">
        <a href="ctv.php?table=tintuc1">
          <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        </a>
        <input class="btn btn-primary" type="submit" value="Sửa" name="btnSua">
      </div>
    </form>
    <?php
  }
}

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
             <form action="ctv.php?table=tintuc1&thaotac=them" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <table align="center" width="100%">
                 <tr><td>Id loại tin :</td><td>
                  <select name="idlt"> 
                    <?php foreach($showallloaitin as $value) { ?><option value="<?php echo $value['idLT']; ?>">
                      <?php echo $value['idLT']."-".$value['TenLT']; ?></option>
                      <?php }?></select>
                    </td></tr>
                    <tr><td>Tiêu đề :</td><td><textarea name="tieude"></textarea></td></tr>
                    <tr><td>Tóm tắt :</td><td><textarea name="tomtat"></textarea></td></tr>
                    <tr><td>Nội dung :</td><td>
                      <textarea id="content" name=noidung>Nội dung test...</textarea>
                      <script type="text/javascript">CKEDITOR.replace('noidung'); </script>
                    </td></tr>
                    <tr><td>Số lần xem :</td><td><input type="text" name="solanxem"></td></tr>
                    <tr><td>Nguồn :</td><td><input type="text" name="nguon" 
                      value="<?php echo $_SESSION['ctv']['HoTenUser']; ?>" readonly ></td></tr>
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
             <td id="hinh"><img src="images/<?php echo $value['UrlHinh'];?>"></td>
             <td><a class="btn btn-primary" class="btn btn-primary btn-lg" 
               data-target="#myModal" 
               href="ctv.php?table=tintuc1&thaotac=sua&idTinTuc=<?php echo $value['idTinTuc'];?>">Sửa
             </a></td> 
           </tr>
           <?php } ?>	
         </tbody>
       </table>
     </div>

   </div>
 </div>
</div>
</div>
<style type="text/css"">
#hinh img{
  width: 150px;
  height: 150px;
}
</style>
<?php
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="them")
  { 
    $idLT = $_POST["idlt"];
    $idUser = $_SESSION['ctv']['idUser'];
    $TieuDe = $_POST["tieude"];
    $TomTat = $_POST["tomtat"];
    $NoiDung = $_POST["noidung"];
    $SoLanXem = $_POST["solanxem"];
    $Nguon = $_POST["nguon"];

    if($_FILES["hinhanh"]['name']!="")		
    { 

      $h= $_FILES["hinhanh"];
      $ten = $h["name"];
      $tam = $h["tmp_name"];
      move_uploaded_file($tam,"images/".$ten);
      $Link=$ten;
    }
    $addtintuc1 =$tintuc->addtintucCTV($idLT,$idUser,$TieuDe,$TomTat,$NoiDung,$SoLanXem,$Nguon,$Link);
    if(isset($addtintuc1)){
     ?>
     <script type="text/javascript">window.location='ctv.php?table=tintuc1'</script>
     <?php
   }
 }
}

if(isset($_GET["thaotac"]))
{
  if($_GET["thaotac"]=="sua"){
    if(isset($_POST['btnSua']))
    {
      print_r($_POST);
      $idLT = $_POST["idlt"];
      $idUser = $_SESSION['ctv']['idUser'];
      $TieuDe = $_POST["tieude"];
      $TomTat = $_POST["tomtat"];
      $NoiDung = $_POST["noidung"];
      $SoLanXem = $_POST["solanxem"];
      $Nguon = $_POST["nguon"];

      if($_FILES["hinhanh"]['name']!="")    
      { 

        $h= $_FILES["hinhanh"];
        $ten = $h["name"];
        $tam = $h["tmp_name"];
        move_uploaded_file($tam,"images/".$ten);
        $Link=$ten;
      }else{
        $showTinCapNhat = $congtacvien->showTinCapNhat($idTinTuc);
        foreach ($showTinCapNhat as $key => $value) {
          $Link = $value['UrlHinh'];
        }
      }
      $update1 = $congtacvien->updateTin($idTinTuc, $idLT, $TieuDe, $TomTat, $NoiDung, $Link);
      if(isset($update1)){
       ?>
       <script type="text/javascript">window.location='ctv.php?table=tintuc1'</script>
       <?php
     }
   }
 }
}  
?>
