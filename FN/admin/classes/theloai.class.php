<?php 
class theloai extends Db{
	function showalltheloai(){
		return $this->query("Select *from theloai");
	}
	function addTheLoai($TenTL, $ThuTu, $AnHien){
		$arr = array(":TenTL"=>$TenTL,":ThuTu"=>$ThuTu,":AnHien"=>$AnHien);
		$sql = "insert into theloai(TenTL, ThuTu, AnHien) values(:TenTL, :ThuTu, :AnHien) ";
		return $this->query($sql,$arr);
	}
	function deleteTheLoai($idTL)
	{	
		$arr=array(":idTL"=>$idTL);
		$sql="delete from theloai where idTL = :idTL";
		return $this->query($sql,$arr);
	}
	function showidTheLoai($idTL)
	{
		$arr=array(":idTL"=>$idTL);
		$sql="Select *from theloai where idTL = :idTL";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updateTheLoai($idTL,$TenTL, $ThuTu, $AnHien)
	{
		$arr=array(":idTL"=>$idTL,":TenTL"=>$TenTL,":ThuTu"=>$ThuTu,":AnHien"=>$AnHien);
		$sql="UPDATE theloai SET TenTL =:TenTL, ThuTu=:ThuTu, AnHien=:AnHien WHERE idTL = :idTL";
		return $this->query($sql,$arr);
	}
}
?>