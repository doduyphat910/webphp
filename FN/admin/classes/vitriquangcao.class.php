<?php 
class vitriquangcao extends Db{
	function showvitriQC(){
		
		return $this->query("Select *from vitri");
		
	}
	function addVTQC($TenVT, $TinhTrang){
		$arr = array(":TenVT"=>$TenVT,":TinhTrang"=>$TinhTrang);
		$sql = "insert into vitri(TenVT, TinhTrang) values(:TenVT, :TinhTrang) ";
		return $this->query($sql,$arr);
	}
	function deleteVTQC($idVT)
	{	
		$arr=array(":idVT"=>$idVT);
		$sql="delete from vitri where idVT = :idVT";
		return $this->query($sql,$arr);
	}
	function showidVT($idVT)
	{
		$arr=array(":idVT"=>$idVT);
		$sql="Select *from vitri where idVT = :idVT";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}
	function updateVT($idVT,$TenVT, $TinhTrang)
	{
		$arr=array(":idVT"=>$idVT,":TenVT"=>$TenVT,":TinhTrang"=>$TinhTrang);
		$sql="UPDATE vitri SET TenVT=:TenVT, TinhTrang=:TinhTrang WHERE idVT = :idVT";
		return $this->query($sql,$arr);
	}
}
?>