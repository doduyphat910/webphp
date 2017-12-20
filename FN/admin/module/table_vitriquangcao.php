<?php 
$vitriquangcao= new vitriquangcao();
$showvitriQC=$vitriquangcao->showvitriQC();
$quangcao= new quangcao();
$ShowallQC=$quangcao->ShowallQC();
?>
<?php
if(isset($_GET['thaotac']))
{
  if($_GET['thaotac']=="sua" &&isset($_GET['idVT']))
  {
   $row = $vitriquangcao->showidVT($_GET['idVT']);
   
	  //print_r($row);
   ?>           <form action="trangchu.php?table=vitriquangcao&thaotac=update" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
      <table align="center">
       <?php ?>
       <tr><td>id vị trí: </td><td><input type="text" name="idvt" value="<?php echo $tam=$_GET['idVT']; ?> " readonly></td></tr>
       <tr><td>Tên vị trí: </td><td><input type="text" name="tenvt" value="<?php echo $row['TenVT']; ?>"></td></tr>                               
    </table> 
  </div>
  <div align="center">
    <a class="btn btn-danger" href="trangchu.php?table=vitriquangcao" role="button" >Hủy</a>
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
   <div class="modal-dialog">
     <!-- Modal content-->
     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">Thêm</h4>
       </div>
       <form action="trangchu.php?table=vitriquangcao&thaotac=them" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <table align="center">
           <tr><td>Tên vị trí :</td><td><input type="text" name="tenvitri"></td></tr></tr>               			    			
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
<div class="col-md-12">
  <!-- Advanced Tables -->
  <div class="panel panel-default">
    <div class="panel-heading">
     Bảng vị trí quảng cáo
   </div>
   <div class="panel-body">
    <div class="table-responsive">  
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
          <tr>
            <th>Id vị trí</th>
            <th>Tên vị trị</th>

            <th>Thao tác</th>
          </tr>
        </thead>
        <tbody>
         <?php foreach($showvitriQC as $value)
         { 
          ?>
          <tr>
            <td><?php echo $value['idVT'];?></td>
            <td><?php echo $value['TenVT'];?></td>

            <td align="center">
              <a href="trangchu.php?table=vitriquangcao&thaotac=xoa&idVT=<?php echo $value['idVT'];?>" 
                onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger glyphicon glyphicon-trash"> Xóa</a>
              <a class="btn btn-primary glyphicon glyphicon-wrench" href="trangchu.php?table=vitriquangcao&thaotac=sua&idVT=<?php echo $value['idVT'];?>"> Sửa</td>
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
    $TenVT = $_POST["tenvitri"];
    $TinhTrang = $_POST["tinhtrang"];
    $addVTQC1 =$vitriquangcao->addVTQC($TenVT,$TinhTrang);
    if(isset($addVTQC1)){
     ?>
     <script type="text/javascript">window.location='trangchu.php?table=vitriquangcao'</script>
     <?php
   }
 }
}
?>
<?php 
if(isset($_GET["thaotac"]) && isset($_GET["idVT"]))
{ 
  if($_GET["thaotac"]=="xoa")
  {
	  
   $idVT = $_GET['idVT'];
	$i=0; 
   foreach($ShowallQC as $value)
   {
    if($idVT==$value['idVT'])
    {
      $i++;
      break;
    }  
    else{
      $i=0;
    }  
  }

    if($i>0){
      ?> <script> alert("Xóa không thành công vị trí vì có quảng cáo trong vị trí");</script><?php
    }
    if($i==0)
    {

      $deleteVTQC1=$vitriquangcao->deleteVTQC($idVT);
      if(isset($deleteVTQC1))
      {
        ?>
        <script type="text/javascript">window.location='trangchu.php?table=vitriquangcao'; alert("Xóa thành công");</script>
        <?php
      }
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
   $idVT=$_POST["idvt"];
   $TenVT = $_POST["tenvt"];
   $TinhTrang = $_POST["tinhtrang"];
   $updateVT1=$vitriquangcao->updateVT($idVT,$TenVT,$TinhTrang);
   if(isset($updateVT1))
   {
    ?>
    <script type="text/javascript">window.location='trangchu.php?table=vitriquangcao'</script>
    <?php
  }
}
}
?>