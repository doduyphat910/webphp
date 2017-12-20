<?php 
class phuonganbinhchon extends Db{
	function showallPA(){
		
		return $this->query("Select *from chitietbinhchon");
		
	}
	function addPA($idBC, $MoTa){
		$arr = array(":idBC"=>$idBC,":MoTa"=>$MoTa,":SoLanChon"=>0);
		$sql = "insert into chitietbinhchon(idBC,MoTa,SoLanChon) values(:idBC, :MoTa,:SoLanChon)";
		return $this->query($sql,$arr);
	}
	
	function showidPA($idCTBC)
	{
		$arr=array(":idCTBC"=>$idCTBC);
		$sql="Select *from chitietbinhchon where idCTBC = :idCTBC";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updatePA($idCTBC,$idBC,$MoTa)
	{
		$arr=array(":idCTBC"=>$idCTBC,":idBC"=>$idBC,":MoTa"=>$MoTa);
		$sql="UPDATE chitietbinhchon SET idBC=:idBC, MoTa=:MoTa WHERE idCTBC = :idCTBC";
		return $this->query($sql,$arr);
	}
	function deletePA($idCTBC)
	{	
		$arr=array(":idCTBC"=>$idCTBC);
		$sql="delete from chitietbinhchon where idCTBC = :idCTBC";
		return $this->query($sql,$arr);
	}
}
?>