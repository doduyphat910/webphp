 <?php
session_start();
 if(isset($_GET['p'])){
 	$p=$_GET['p'];
 }
 else{
 	$p = '';
 }

 switch ($p) {
 	case 'theloai':
 		include 'theloai.php';
 		break;
 	case 'loaitin':
 		include 'loaitin.php';
 		break;
 	case 'tin':
 		include 'tintuc.php';
 		break;
 	case 'xemthem1':
 		include 'xemthem1.php';
 		break;
 	case 'xemthem2':
 		include 'xemthem2.php';
 		break;
 	default:
 		include 'trangchu.php';
 		break;
 }

?>