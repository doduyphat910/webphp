<?php
$idTinTuc = $_GET['idTinTuc'];
$obj = new tintuc();
$get1News= $obj->get1News($idTinTuc);
//print_r($get1News);
?>
<?php
foreach ($get1News as $key => $value) {
?>
<div class="container">         
                        	<div class="row container box text-center canhgiua">
  			<div class="col-md-8">
                <div class="tintuc"> <strong style="font-size:30px;"><?php echo $value['TieuDe'];?></strong><div>
               				 <div>
                                
                      <p style="font-weight:bold" class="text-justify"><?php echo $value['TomTat']; ?></p>
                               <?php echo $value['NoiDung']; ?>
								<!--<p class="font-weight-bold text-right">Văn Chương</p>-->
<?php
}
?>
                          <!--Ket thuc-->
								<form>
    									<div class="form-group">
      										<label for="comment">Bình Luận:</label>
      										<textarea class="form-control" rows="5" id="comment"></textarea>
   										 </div>
                                         <button type="button" class="btn btn-default">Gữi bình luận</button>
  								</form>
                    </div>		
              </div>
          </div>
          </div>
          </div>
            
            
	</div>