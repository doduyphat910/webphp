<?php 
class loaitin extends Db{
	function showallloaitin(){
		return $this->query("Select *from loaitin");
	}
	function addloaitin($idTL,$TenLT,$ThuTu,$AnHien){
		$arr = array(":idTL"=>$idTL,":TenLT"=>$TenLT,":ThuTu"=>$ThuTu,":AnHien"=>$AnHien);
		$sql = "insert into loaitin (idTL,TenLT, ThuTu, AnHien) values(:idTL,:TenLT, :ThuTu, :AnHien) ";
		return $this->query($sql,$arr);
	}
	function deleteloaitin($idLT)
	{	
		$arr=array(":idLT"=>$idLT);
		$sql="delete from loaitin where idLT = :idLT";
		return $this->query($sql,$arr);
	}
	function showidloaitin($idLT)
	{
		$arr=array(":idLT"=>$idLT);
		$sql="Select *from loaitin where idLT = :idLT";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updateloaitin($idLT, $idTL, $TenLT, $ThuTu, $AnHien)
	{
		$arr=array(":idLT"=>$idLT,":idTL"=>$idTL,":TenLT"=>$TenLT,":ThuTu"=>$ThuTu,":AnHien"=>$AnHien);
		$sql="UPDATE loaitin SET idTL=:idTL ,TenLT =:TenLT, ThuTu=:ThuTu, AnHien=:AnHien WHERE idLT = :idLT";
		return $this->query($sql,$arr);
	}
}
?>