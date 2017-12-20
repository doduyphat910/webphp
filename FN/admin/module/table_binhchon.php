<?php 
$binhchon= new binhchon();
$showallbinhchon=$binhchon->showallbinhchon();
$tintuc = new tintuc();
$showalltintuc =$tintuc->showalltintuc();
?>
  <?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idBC']))
  {
   $row = $binhchon->showidBC($_GET['idBC']);

	  //print_r($row);
   ?>  
   <form action="trangchu.php?table=binhchon&thaotac=update" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
      <table align="center">
      
       <tr  ><td style="padding: 5px;">id bình chọn: </td><td style="padding: 5px;"><input type="text" name="idbc" value="<?php echo $row['idBC'] ;?>" readonly></td></tr>
       <tr><td style="padding: 5px;">id và tên tin tức: </td><td style="padding: 5px;">
       								<select name="idtt"> 
                <?php foreach($showalltintuc as $value1) 
                { 
                  ?>
                  <option value="<?php echo $value1['idTinTuc']; ?>" >
                    <?php 
                    echo $value1['idTinTuc']."-".$value1['TieuDe']; 
                    ?>
                  </option>
                  <?php
                  if($value1['idTinTuc'] == $row['idTinTuc'])
				  {
                    ?>
                    <option value="<?php echo $value1['idTinTuc']; ?>" selected>
                     <?php 
                     echo $value1['idTinTuc']."-".$value1['TieuDe']; 
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
       <tr><td style="padding: 5px;">Mô tả bình chọn :</td><td style="padding: 5px;"><textarea name="mota" rows="3" cols="21"><?php echo $row['MoTa']; ?></textarea></td></tr> 
       <tr><td style="padding: 5px;">Thứ tự bình chọn :</td><td style="padding: 5px;"><input type="number" name="ThuTu" value="<?php echo $row['ThuTu']; ?>"</td></tr>       
    </table> 
  </div>
  <div align="center">
    <a class="btn btn-danger" href="trangchu.php?table=binhchon" role="button" >Hủy</a>
    <input class="btn btn-success" type="submit" value="Cập Nhật" name="submit">
  </div>
</form>
<?php
}
}?>
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
             <form action="trangchu.php?table=binhchon&thaotac=them" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <table align="center">
                 <tr><td>Id tin và tieu de tin :<td>
					 <select name="idtintuc"> 
                    <?php foreach($showalltintuc as $value) { ?><option value="<?php echo $value['idTinTuc']; ?>"><?php echo $value['idTinTuc']."-".$value['TieuDe']; ?></option>
                    <?php }?></select>
                </td></td></tr>
                 <tr><td>Mô tả bình chọn :</td><td><textarea name="mota" rows="3" cols="20"></textarea></td></tr>
                 <tr><td>Vị trí bình chọn :</td><td><input type="number" name="sothutu"</td></tr>               			    			
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
     Bảng bình chọn
   </div>
   <div class="panel-body">
    <div class="table-responsive">  
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Id bình chọn</th>
            <th>Id và tên tin tức</th>
            <th>Mô tả</th>
            <th>Thứ tự hiển thị</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($showallbinhchon as $value)
         { 
          ?>
          <tr>
            <td><?php echo $value['idBC'];?></td>
            <td><?php //
			 $tt=$tintuc->showTinCapNhat($value['idTinTuc']);
			  $id=$tintuc->showTinCapNhat($value['idTinTuc']);
			 echo $id[0]['idTinTuc']."-".$tt[0]['TieuDe'];
			 //echo $value['idTinTuc'];?></td>
            <td><?php echo $value['MoTa'];?></td>
            <td><?php echo $value['ThuTu'];?></td>
            <td align="center">
            <a href="trangchu.php?table=binhchon&thaotac=xoa&idBC=<?php echo $value['idBC'];?>"class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure?')"> Xóa</a>
             <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=binhchon&thaotac=sua&idBC=<?php echo $value['idBC'];?>"> Sửa</td>
              </tr>    
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if(isset($_GET["thaotac"]))
{ 
  if($_GET["thaotac"]=="them")
  { 
    $idTinTuc = $_POST["idtintuc"];
    $MoTa =$_POST["mota"];
    $ThuTu = $_POST["sothutu"];
	 //print_r($_POST);exit();
    $addBC1 =$binhchon->addBC($idTinTuc,$MoTa,$ThuTu);
    if(isset($addBC1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=binhchon'</script>
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
		$idBC=$_POST['idbc'];
		$idTinTuc=$_POST['idtt'];
		$MoTa=$_POST['mota'];
		$ThuTu=$_POST['ThuTu'];
		$updateBC1=$binhchon->updateBC($idBC,$idTinTuc,$MoTa,$ThuTu);
		if(isset($updateBC1)){
			?>
			<script type="text/javascript">window.location='trangchu.php?table=binhchon'</script>
			<?php
		}
	}
}
?>
<?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idBC"]))
 { 
  if($_GET["thaotac"]=="xoa")
  {
	  	$idBC = $_GET["idBC"];
   		//$arr = array($idUser);
  		$deleteBC1=$binhchon->deleteBC($idBC);
	  if(isset($deleteBC1))
	  {
		  ?>
		  <script type="text/javascript">window.location='trangchu.php?table=binhchon'</script>
		  <?php
	  }
  }
 }
?>