<script type="text/javascript" src="../editor/ckeditor/ckeditor.js"></script>

<?php 
/*include "library/dbCon.php";
include("classes/autoload.php");*/
include "xulydangnhap.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tin Tức 247 Cộng tác viên</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- MORRIS CHART STYLES-->
  <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

  <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
</head>
<body>
  <div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="ctv.php?table=tintuc1">247 CTV</a> 
      </div>
      <div style="color: white;
      padding: 0px 50px 5px 50px;
      float: right;
      font-size: 16px;"> 
      <form action="trangchu.php" method="get" >
     	<div style="margin-top: 20px;"> Xin chào, <?php echo $_SESSION['ctv']['HoTenUser'];?>
       <button type="submit" name="btnThoat" class="btn btn-danger square-btn-adjust">
         Đăng xuất
			</button> </div>        
     </form>
   </div>
 </nav> 

 <?php
 if(isset($_GET['btnThoat'])){
  /*unset($_SESSION['idUser']);
  unset($_SESSION['HoTenUser']);
  unset($_SESSION['UserName']);
  unset($_SESSION['idGroup']);*/
  unset($_SESSION['ctv']);
  header("Location: index.php");
}
?>
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
      <li class="text-center">
        <img src="assets/img/find_user.png" class="user-image img-responsive"/>
      </li>
    

      <li>
        <a class="active-menu" href="ctv.php?table=tintuc1"><i class="fa fa-table fa-3x"></i> Quản lý tin tức</a>
      </li>

    </ul>
  </div>
</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
  <div class="container-fluid">
   <?php 
   if(isset($_GET["table"]))
   {          

    if($_GET["table"]=="tintuc1"){
      include("ctv/table_tintuc1.php");
    }

    else
    {
      echo "<span style=\" color: #E13C3C\"> <br \>Không tìm thấy trang</span>";
    }
  }
  ?>
</div>
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- MORRIS CHART SCRIPTS -->
<script src="assets/js/morris/raphael-2.1.0.min.js"></script>

<script src="assets/js/morris/morris.js"></script>

<script src="assets/js/dataTables/jquery.dataTables.js"></script>

<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
<!-- CUSTOM SCRIPTS -->
<script>
  $(document).ready(function () {
    $('#dataTables-example').dataTable();
  });		
</script>

</body>
</html>
