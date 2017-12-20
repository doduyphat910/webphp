<?php 
$phuongan= new phuonganbinhchon();
$showallPA=$phuongan->showallPA();
$binhchon=new binhchon();
$showallbinhchon=$binhchon->showallbinhchon();
?>
<?php
//Hiện Form sửa
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idCTBC']))
  {
   $row = $phuongan->showidPA($_GET['idCTBC']);

	  //print_r($row);
   ?>
<form action="trangchu.php?table=phuonganbinhchon&thaotac=update" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
      <table align="center">
      
       <tr  ><td style="padding: 5px;">Id chi tiết bình chọn: </td><td style="padding: 5px;"><input type="text" name="idctbc" value="<?php echo $row['idCTBC'] ;?>" readonly></td></tr>
       <tr><td style="padding: 5px;">Bình chọn: </td><td style="padding: 5px;">
       								<select name="idbc">
                     <?php foreach($showallbinhchon as $value) 
  						{ 
					?>
                     <option value="<?php echo $value['idBC']; ?>">
                     <?php echo $value['idBC']."-".$value['MoTa']; ?>
                     </option>
                     <?php
						 if($value['idBC'] == $row['idBC'])
				  {
                    ?>
                    <option value="<?php echo $value['idBC']; ?>" selected>
                     <?php 
                     echo $value['idBC']."-".$value['MoTa']; 
                     ?>                       
                   </option>
                   <?php
                 }
						}
					?>
                </select>
       								
       								</td></tr>
       <tr><td style="padding: 5px;">Mô tả:</td><td style="padding: 5px;"><textarea name="mota" rows="3" cols="45"><?php echo $row['MoTa']; ?></textarea></td></tr> 
       <tr><td style="padding: 5px;">Số lần chọn:</td><td style="padding: 5px;"><input type="number" disabled value="<?php echo $row['SoLanChon']; ?>"</td></tr>       
    </table> 
  </div>
  <div align="center">
    <a class="btn btn-danger" href="trangchu.php?table=phuonganbinhchon" role="button" >Hủy</a>
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
             <form action="trangchu.php?table=phuonganbinhchon&thaotac=them" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <table align="center">
                 <tr><td>Bình chọn :<td>
					 <select name="idbc"> 
                    		<?php foreach($showallbinhchon as $value) { ?><option value="<?php echo $value['idBC']; ?>"><?php echo $value['idBC']."-".$value['MoTa']; ?></option>
                    <?php }?></select>
                </td></td></tr>
                 <tr><td>Mô tả bình chọn :</td><td><textarea name="mota" rows="5" cols="40"></textarea></td></tr>
                 <!--tr><td>Số lần chọn :</td><td><input type="number" name="solanchon"</td></tr-->               			    			
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
     Bảng phương án
   </div>
   <div class="panel-body">
    <div class="table-responsive">  
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Id phương án</th>
            <th>Id bình chọn và mô tả</th>
            <th>Mô tả</th>
            <th>Số lần chọn</th>
            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($showallPA as $value)
         { 
          ?>
          <tr>
            <td><?php echo $value['idCTBC'];?></td>
            <td><?php //echo $value['idBC'];
				//$tt=$binhchon->showidBC($value['idBC']);
				//echo $id."-".$tt['MoTa'];
			 	$id=$binhchon->showidBC($value['idBC']);
			 	echo $value['idBC']."-".$id['MoTa'];
				?></td>
            <td><?php echo $value['MoTa'];?></td>
            <td><?php echo $value['SoLanChon'];?></td>
            <td align="center">
            <a href="trangchu.php?table=phuonganbinhchon&thaotac=xoa&idCTBC=<?php echo $value['idCTBC'];?>"class="btn btn-danger glyphicon glyphicon-trash" onclick="return confirm('Are you sure?')"> Xóa</a>
             <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=phuonganbinhchon&thaotac=sua&idCTBC=<?php echo $value['idCTBC'];?>"> Sửa</td>
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
    $idBC = $_POST["idbc"];
    $MoTa =$_POST["mota"];
	// print_r($_POST);exit();
    $addPA1 =$phuongan->addPA($idBC,$MoTa);
    if(isset($addPA1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=phuonganbinhchon'</script>
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
		$idCTBC=$_POST['idctbc'];
		$idBC=$_POST['idbc'];
		$MoTa=$_POST['mota'];
		//print_r($_POST);
		//exit();
		$updatePA1=$phuongan->updatePA($idCTBC,$idBC,$MoTa);
		if(isset($updatePA1)){
			?>
			<script type="text/javascript">window.location='trangchu.php?table=phuonganbinhchon'</script>
			<?php
		}
	}
}
?>
<?php 
if(isset($_GET["thaotac"]) &&isset($_GET["idCTBC"]))
{ 
  if($_GET["thaotac"]=="xoa")
  {
    $idCTBC = $_GET["idCTBC"];
    $deletePA1=$phuongan->deletePA($idCTBC);
    if(isset($deletePA1))
    {
      ?>
      <script type="text/javascript">window.location='trangchu.php?table=phuonganbinhchon'</script>
      <?php
    }
  }
}
?>