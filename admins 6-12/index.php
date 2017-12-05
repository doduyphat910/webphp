<script type="text/javascript" src="ckeditor/ckeditor.js"></script>

<?php include "library/dbCon.php";
include("classes/autoload.php");
 ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
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
                <a class="navbar-brand" href="#">Binary admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"> Last access : 30 May 2014 &nbsp; <a href="login.html" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.php"><i class="fa fa-dashboard fa-3x"></i> Thông số</a>
                    </li>
                    <li>
                        <a href="index.php"><i class="fa fa-sitemap fa-3x"></i> Quản lý người dùng <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="index.php?table=user">Quản lý user</a>
                            </li>
                            <li>
                                <a href="index.php?table=congtacvien">Quản lý cộng tác viên</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  href="index.php?table=theloai"><i class="fa fa-table fa-3x"></i> Table Thể Loại</a>
                    </li>
                    <li>
                        <a  href="index.php?table=loaitin"><i class="fa fa-table fa-3x"></i> Table Loại Tin</a>
                    </li>
                    <li>
                        <a  href="index.php?table=tintuc"><i class="fa fa-table fa-3x"></i> Quản lý tin tức</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Quảng Cáo</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Vị Trí Quảng Cáo</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Bình Luận</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Chi Tiết Bình Luận</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Bình Chọn</a>
                    </li>
                    <li>
                        <a  href="index.php?table=#"><i class="fa fa-table fa-3x"></i> Table Phương Án Bình Chọn</a>
                    </li>
                    <li>
                        <a  href="index.php?table=guibai"><i class="fa fa-table fa-3x"></i> Table Gữi bài</a>
                    </li>
                  	<li>
                        <a  href="blank.html"><i class="fa fa-square-o fa-3x"></i> Blank Page</a>
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
       if($_GET["table"]=="user")
       {

        include("module/table_user.php");
	   }elseif($_GET["table"]=="congtacvien"){
		   
		    include("module/table_congtacvien.php"); 
	   }elseif($_GET["table"]=="theloai"){
		   
		    include("module/table_theloai.php");
	   }elseif($_GET["table"]=="tintuc"){
		   
		    include("module/table_tintuc.php");
	   }elseif($_GET["table"]=="loaitin"){
		   
		    include("module/table_loaitin.php");	 
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
    <script>
            $(document).ready(function () {
                $('#dataTables-example1').dataTable();
            });		
    </script>
    <script src="assets/js/custom.js"></script>  
</body>
</html>
