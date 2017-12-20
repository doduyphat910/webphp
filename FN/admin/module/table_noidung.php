<?php
//print_r($_GET);
$tintuc = new tintuc();
$showTinCapNhat =$tintuc->showTinCapNhat($_GET["idTinTuc"]);
?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-striped table-bordered table-hover">
          <thead >
            <tr>
             <th>Nội dung</th>
           </tr>
         </thead>
        	<tbody>
          <tr>
           <?php foreach($showTinCapNhat as $value) {?>
           <td >
			<textarea id="content" name=noidung  > <?php echo $value["NoiDung"];?></textarea>
            <script type="text/javascript">CKEDITOR.replace('noidung'); </script>
           </td>
          </tr>
            <?php } ?>	
            </tbody>
        </table>
	</div>	
</div>