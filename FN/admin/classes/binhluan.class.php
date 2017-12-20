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
	function updateAnHien ($idBL,$AnHien){
		$arr=array(":idBL"=>$idBL,":AnHien"=>$AnHien);
		$sql="UPDATE binhluan SET AnHien=:AnHien WHERE idBL = :idBL";
		return $this->query($sql,$arr);
	}
	function updatebinhluan($idBL,$AnHien,$DuyetSua, $NoiDungUpdate, $TGUpdate)
	{
		$arr=array(":idBL"=>$idBL,":AnHien"=>$AnHien,":DuyetUpdate"=>$DuyetSua, ":NoiDungUpdate"=>$NoiDungUpdate, 
			":TGUpdate"=>$TGUpdate);
		$sql="UPDATE binhluan SET AnHien=:AnHien , DuyetUpdate=:DuyetUpdate, NoiDung = :NoiDungUpdate, NgayDang=:TGUpdate 
		WHERE idBL = :idBL";
		return $this->query($sql,$arr);
	}
}
?>