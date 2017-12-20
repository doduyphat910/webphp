<?php
session_start();
include "library/dbCon.php";
include("classes/autoload.php");

if(isset($_POST['login']))
{
	$un = $_POST['username'];
	$pw = $_POST['password'];

	$obj = new user();
	$Login = $obj->Login($un, md5($pw));

	if(count($Login)==1 ){
		/*foreach ($Login as $key => $value) {
			$_SESSION['idUser'] = $value['idUser'];
			$_SESSION['HoTenUser'] = $value['HoTenUser'];
			$_SESSION['UserName'] = $value['UserName'];
			$_SESSION['idGroup'] = $value['idGroup'];
		}
		if($_SESSION['idGroup'] == 3){
			header('Location: trangchu.php');
		}
		if($_SESSION['idGroup'] == 2){
			header('Location: ctv.php');
		}
	}
	else{
		header('Location: index.php');
	}*/

		foreach ($Login as $key => $value) {
			if($value['idGroup']==2){
				$_SESSION['ctv']['idUser'] = $value['idUser'];
				$_SESSION['ctv']['HoTenUser'] = $value['HoTenUser'];
				$_SESSION['ctv']['UserName'] = $value['UserName'];
				$_SESSION['ctv']['idGroup'] = $value['idGroup'];
				header('Location: ctv.php?table=tintuc1');
			}
			if($value['idGroup'] == 3){
				$_SESSION['admin']['idUser'] = $value['idUser'];
				$_SESSION['admin']['HoTenUser'] = $value['HoTenUser'];
				$_SESSION['admin']['UserName'] = $value['UserName'];
				$_SESSION['admin']['idGroup'] = $value['idGroup'];
				header('Location: trangchu.php?table=thongso');
			}
			if($value['idGroup']==1)
			{

				header('Location: index.php');
			}
		}
	}
	else
		{
			header('Location: index.php');
		}
}


?>