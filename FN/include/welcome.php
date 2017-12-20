
<div id="top" style="background-color:whitesmoke;">
    <div class="container">
     <div class="row">
       <div class="col-sm-6 loichao"><h5 style="color: black;">Welcome to Tin Tức 247</h5></div>
       	<div class="col-sm-6">
       		<div class="row">
       			<div class="col-sm-9 text-right">
       				<a class="nav-link" href="index.php?p=profile"><h6>Xin chào, <?php echo $_SESSION['HoTenUser']; ?></h6></a>
            </div>
            <div class="col-sm-3">
              <form action="" method="post" accept-charset="utf-8">
                  <button type="submit" name="btnDangXuat" class="btn btn-outline-primary btn-sm float-sm-left">Đăng xuất</button>
              </form>
       			</div>
       		</div>
       	</div>
     </div>
	</div>
</div>
<?php
if(isset($_POST['btnDangXuat'])){
    unset($_SESSION['idUser']);
    unset($_SESSION['HoTenUser']);
    unset($_SESSION['UserName']);
    unset($_SESSION['idGroup']);
    header("Location: index.php");
}
?>
<style type="text/css">
.nav-link{color: black;}
</style>