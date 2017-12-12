<?php 
class traloibinhluan extends Db{
	function showallTLBL(){
		return $this->query("Select *from tlbinhluan");
	}
	function deleteTLBL($idTLBinhLuan)
	{	
		$arr=array(":idTLBinhLuan"=>$idTLBinhLuan);
		$sql="delete from tlbinhluan where idTLBinhLuan = :idTLBinhLuan";
		return $this->query($sql,$arr);
	}
	function addTLBL($idBL,$idUser,$NoiDung,$NgayDang,$AnHien){
		$arr = array(":idBL"=>$idBL,":idUser"=>$idUser,":NoiDung"=>$NoiDung,":NgayDang"=>$NgayDang,":AnHien"=>$AnHien);
		$sql = "insert into theloai(idBL,idUser,NoiDung, NgayDang, AnHien) values(:idBL,:idUser,:NoiDung,:NgayDang, :AnHien) ";
		return $this->query($sql,$arr);
	}
	function showidTLBL($idTLBinhLuan)
	{
		$arr=array(":idTLBinhLuan"=>$idTLBinhLuan);
		$sql="Select *from tlbinhluan where idTLBinhLuan = :idTLBinhLuan";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updateTLBL($idTLBinhLuan,$idBL,$idUser,$NoiDung, $NgayDang, $AnHien)
	{
		$arr=array("idTLBinhLuan"=>$idTLBinhLuan,":idBL"=>$idBL,":idUser"=>$idUser,":NoiDung"=>$NoiDung,":NgayDang"=>$NgayDang,":AnHien"=>$AnHien);
		$sql="UPDATE tlbinhluan SET idBL =:idBL, idUser=:idUser,NoiDung=:NoiDung,NgayDang=:NgayDang, AnHien=:AnHien WHERE idTLBinhLuan = :idTLBinhLuan";
		return $this->query($sql,$arr);
	}
}
?>