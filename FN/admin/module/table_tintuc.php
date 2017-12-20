<?php 
$tintuc = new tintuc();
$showalltintuc =$tintuc->showalltintuc();
$loaitin = new loaitin();
$showallloaitin =$loaitin->showallloaitin();
$link="";
?>
<?php
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="sua")
  {
    if(isset($_GET['idTinTuc'])){
      $idTinTuc = $_GET['idTinTuc'];
    }
    $showTinCapNhat = $tintuc->showTinCapNhat($idTinTuc);
    ?>
    <form action="trangchu.php?table=tintuc&thaotac=sua&idTinTuc=<?php echo $idTinTuc;?>" method="post" enctype="multipart/form-data">
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
              value="<?php echo $value['Nguon']; ?>" readonly ></td></tr>
              <tr><td>Hình ảnh :</td><td ><img src="./../images/<?php echo $value['UrlHinh']; ?>" 
                style="width: 100px;height: 100px;"><hr><input type="file" name="hinhanh" ></td>
              </tr>
              <tr><td>Tình Trạng:</td><td>
               <input type="radio" name="tinhtrang"  <?php 
               if($value['AnHien']==1)
               {
                ?>
                checked="checked";
                <?php
              }
              ?> value="1">Hiện  
              <input type="radio" name="tinhtrang"  <?php 
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
        <a href="trangchu.php?table=tintuc">
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
		        <button type="button" class="btn btn-primary btn-lg glyphicon glyphicon-plus-sign" data-toggle="modal" data-target="#myModal"> Thêm</button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
         <div class="modal-dialog modal-lg">
           <!-- Modal content-->
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
               <h4 class="modal-title">Thêm</h4>
             </div>
             <form action="trangchu.php?table=tintuc&thaotac=them" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <table align="center" width="100%">
                 <tr><td>Id loại tin :</td><td>
                  <select name="idlt"> 
                    <?php foreach($showallloaitin as $value) { ?><option value="<?php echo $value['idLT']; ?>"><?php echo $value['idLT']."-".$value['TenLT']; ?></option>
                    <?php }?></select>
                  </td></tr>
                  <tr><td>Tiêu đề :</td><td><textarea name="tieude"></textarea></td></tr>
                  <tr><td>Tóm tắt :</td><td><textarea name="tomtat"></textarea></td></tr>
                  <tr><td>Nội dung :</td><td>
                    <textarea id="content" name=noidung  >Nội dung test...</textarea>
                    <script type="text/javascript">CKEDITOR.replace( 'noidung'); </script>
                  </td></tr>
                  
                  <tr><td>Nguồn :</td><td><input type="text" name="nguon" 
                    value="<?php echo $_SESSION['admin']['HoTenUser'];?>" readonly ></td></tr>
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
	</div>
</div>

<div class="row">
  <div class="col-md-12">
    <!-- Advanced Tables -->
    <div class="panel panel-default">
      <div class="panel-heading">
       Bảng tin tức
     </div>
     <div class="panel-body">
      <div class="table-responsive">
                       
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
             <th>Trạng thái </th>
             <th>Thao tác</th>
           </tr>
         </thead>
         <tbody>
          <tr>
           <?php foreach($showalltintuc as $value) {?>
           <td><?php echo $value['idTinTuc']; ?></td>
           <td><?php 
						$tt=$loaitin->showidloaitin($value['idLT']);
						$id=$loaitin->showidloaitin($value['idLT']);
						echo $id['idLT']."-".$tt['TenLT'];							//echo $value['idLT']; 
			   ?></td>
           <td><?php echo $value['idUser']; ?></td>
           <td><?php echo $value['TieuDe']; ?></td>
           <td><?php echo $value['TomTat']; ?></td>
           <td><?php echo $value['NgayDang']; ?></td>
           <td>
           <a href="trangchu.php?table=noidung&idTinTuc=<?php echo $value['idTinTuc']; ?>" class="btn btn-primary btn-sm" target="_blank">Nội Dung</a>
			   
           <!--textarea rows="7" cols="35" name="noidung" readonly> <?php// echo $value["NoiDung"];?></textarea-->
           
           </td>
           <td><?php echo $value['SoLanXem']; ?></td>
           <td><?php echo $value['Nguon']; ?></td>
           <td id="hinh"><img src="./../images/<?php echo $value['UrlHinh']; ?>"></td>
           <td><?php echo $value['AnHien']; ?></td>
           <td><a href="trangchu.php?table=tintuc&thaotac=xoa&idTinTuc=<?php echo $value['idTinTuc']?>" class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"> Xóa</a>

            <!--form action="trangchu.php?table=tintuc&thaotac=xoa&idTinTuc=<?php //echo $value['idTinTuc'];?>" 
              method="get" accept-charset="utf-8">
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
                      <a href="trangchu.php?table=tintuc&thaotac=xoa&idTinTuc=<?php //echo $value['idTinTuc'];?>"  class="btn btn-danger" id="confirm">Xóa</a>
                    </div>
                  </div>
                </div>
              </div>
            </form-->
            <a href="trangchu.php?table=tintuc&thaotac=sua&idTinTuc=<?php echo $value['idTinTuc']?>" class="btn btn-primary glyphicon glyphicon-wrench"> Sửa</a></td> 

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
    $idUser =$_SESSION['admin']['idUser'];
    $TieuDe = $_POST["tieude"];
    $TomTat = $_POST["tomtat"];
    $NoiDung = $_POST["noidung"];
    $SoLanXem = 0;
    $Nguon = $_SESSION['admin']['HoTenUser'];
	 // print_r($_POST); exit;
	 // print_r($_FILES);exit;
    if($_FILES["hinhanh"]['name']!="")		
    { 

      $h= $_FILES["hinhanh"];
      $ten = $h["name"];
      $tam = $h["tmp_name"];
      move_uploaded_file($tam,"./../images/".$ten);
      $Link=$ten;
    }

    $addtintuc1 =$tintuc->addtintuc($idLT,$idUser,$TieuDe,$TomTat,$NoiDung,$SoLanXem,$Nguon,$Link);
    if(isset($addtintuc1)){
      ?>
      <script type="text/javascript">window.location='trangchu.php?table=tintuc'</script>
      <?php
    }
  }
}

/*update*/

if(isset($_GET["thaotac"]))
{
  if($_GET["thaotac"]=="sua"){
    if(isset($_POST['btnSua']))
    {
      print_r($_POST);
      $idLT = $_POST["idlt"];
      $idUser = $_SESSION['admin']['idUser'];
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
        move_uploaded_file($tam,"./../images/".$ten);
        $Link=$ten;
      }else{
        $showTinCapNhat = $tintuc->showTinCapNhat($idTinTuc);
        foreach ($showTinCapNhat as $key => $value) {
          $Link = $value['UrlHinh'];
        }
      }
      if($_POST['tinhtrang']==1){
        $AnHien = 1;
      }else{
        $AnHien = 0;
      }
      $update1 = $tintuc->updateTin($idTinTuc, $idLT, $TieuDe, $TomTat, $NoiDung, $Link, $AnHien);
      if(isset($update1)){
       ?>
       <script type="text/javascript">window.location='trangchu.php?table=tintuc'</script>
       <?php
     }
   }
 }
}  

if(isset($_GET["thaotac"]))
{
  if($_GET["thaotac"]=="xoa"){
    if(isset($_GET['idTinTuc'])){
      $idTinTuc = $_GET['idTinTuc'];
      $deleteTin = $tintuc->deleteTin($idTinTuc);
      if(isset($deleteTin)){
       ?>
       <script type="text/javascript">window.location='trangchu.php?table=tintuc'</script>
       <?php
     }
   }
 }
}
?>