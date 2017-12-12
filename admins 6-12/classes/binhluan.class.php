<?php 
class binhluan extends Db{
	function showallbinhluan(){
		return $this->query("Select *from binhluan");
	}
	function deletebinhluan($idBL)
	{	
		$arr=array(":idBL"=>$idBL);
		$sql="delete from binhluan where idBL = :idBL";
		return $this->query($sql,$arr);
	}
	function showidbinhluan($idBL)
	{
		$arr=array(":idBL"=>$idBL);
		$sql="Select *from binhluan where idBL = :idBL";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updatebinhluan($idBL,$idTinTuc,$idUser,$NoiDung, $NgayDang, $AnHien)
	{
		$arr=array(":idBL"=>$idBL,":idTinTuc"=>$idTinTuc,":idUser"=>$idUser,":NoiDung"=>$NoiDung,":NgayDang"=>$NgayDang,":AnHien"=>$AnHien);
		$sql="UPDATE binhluan SET idTinTuc =:idTinTuc,idUser =:idUser,NoiDung=:NoiDung, NgayDang=:NgayDang, AnHien=:AnHien WHERE idBL = :idBL";
		return $this->query($sql,$arr);
	}
}
?>