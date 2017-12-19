 <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.js"></script>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
 <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
 <link rel="stylesheet" type="text/css" href="css/style.css"/>

 <body style="background-color: whitesmoke">
 <?php
 if(isset($_SESSION['idUser'])){
	include("include/welcome.php");	
}
else{
	include("include/top.php");	
}
include("include/banner.php");
include("include/menu.php");
include("include/doimk.php");
include("include/footer.php");
 ?>
</body>
<style type="text/css">
.nav-link{color: black;}
</style>