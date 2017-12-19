<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<body style="background-color:whitesmoke ">

<?php
session_start();
include_once "library/dbCon.php";
include_once "classes/autoload.php";
$obj = new tintuc();


if(isset($_POST['btnDangNhap'])){
  $un = $_POST['uname1'];
  $pw = $_POST['pwd1'];
  $pw = md5($pw);
}
$Login = $obj->Login($un, $pw);
  if(count($Login)==1){
    foreach ($Login as $key => $value) {
    $_SESSION['idUser'] = $value['idUser'];
    $_SESSION['HoTenUser'] = $value['HoTenUser'];
    $_SESSION['UserName'] = $value['UserName'];
    $_SESSION['idGroup'] = $value['idGroup'];
  }
}
if(isset($_SESSION['idUser'])){
	include("include/welcome.php");	
	include("include/banner.php");
	include("include/menu(welcome).php");
	include("include/slide.php");
	include("include/content.php");
	include("include/footer.php");

}
else{
	include("include/top.php");
	include("include/banner.php");
	include("include/menu(welcome).php");
	include("include/formdangnhap.php");
	include("include/footer.php");
}
?>
</body>