<?php 
class binhchon extends Db{
	function showallbinhchon(){
		
		return $this->query("Select *from binhchon");
		
	}
	function addBC($idTinTuc, $MoTa,$ThuTu){
		$arr = array(":idTinTuc"=>$idTinTuc,":MoTa"=>$MoTa,":ThuTu"=>$ThuTu);
		$sql = "insert into binhchon(idTinTuc,MoTa,ThuTu) values(:idTinTuc, :MoTa,:ThuTu)";
		return $this->query($sql,$arr);
	}
	function showidBC($idBC)
	{
		$arr=array(":idBC"=>$idBC);
		$sql="Select * from binhchon where idBC = :idBC";
		//return $this->query($sql,$arr);
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updateBC($idBC, $idTinTuc, $MoTa, $ThuTu){
		$arr = array(":idBC"=>$idBC,":idTinTuc"=>$idTinTuc,":MoTa"=>$MoTa,":ThuTu"=>$ThuTu);
		$sql = "UPDATE binhchon SET idTinTuc =:idTinTuc, MoTa=:MoTa, ThuTu=:ThuTu WHERE idBC like :idBC";
		return $this->query($sql, $arr);
	}
	function deleteBC($idBC){
		$arr = array(":idBC"=>$idBC);
		$sql = "DELETE FROM binhchon WHERE idBC LIKE :idBC";
		return $this->query($sql, $arr);
	}
}
?>