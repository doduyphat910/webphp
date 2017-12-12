<?php 
class quangcao extends Db{
	function ShowallQC(){
		
		return $this->query("Select *from quangcao");
		
	}
	function addQC($idVT, $MoTa, $Url,$Link,$NgayBatDau,$NgayKetThuc){
		$arr = array(":idVT"=>$idVT,":MoTa"=>$MoTa,":Url"=>$Url,":UrlHinh"=>$Link,":NgayBatDau"=>$NgayBatDau,":NgayKetThuc"=>$NgayKetThuc);
		$sql = "insert into quangcao(idVT, MoTa, Url, UrlHinh, NgayBatDau, NgayKetThuc) values(:idVT, :MoTa, :Url,:UrlHinh,:NgayBatDau,:NgayKetThuc) ";
		return $this->query($sql,$arr);
	}
	function deleteQC($idQC)
	{	
		$arr=array(":idQC"=>$idQC);
		$sql="delete from quangcao where idQC = :idQC";
		return $this->query($sql,$arr);
	}
	function showidQC($idQC)
	{
		$arr=array(":idQC"=>$idQC);
		$sql="Select *from quangcao where idQC = :idQC";
		return $this->query($sql,$arr);
		//return $data[0];// chuyen mang array thanh data.
	}
	function updateQC($idQC ,$idVT, $MoTa, $Url,$Link, $NgayBatDau, $NgayKetThuc)
	{
		$arr=array(":idQC"=>trim($idQC),":idVT"=>$idVT,":MoTa"=>$MoTa,":Url"=>$Url,":UrlHinh"=>$Link,":NgayBatDau"=>$NgayBatDau,
			":NgayKetThuc"=>$NgayKetThuc);

		$sql="UPDATE quangcao SET idVT=:idVT,MoTa=:MoTa,Url=:Url,UrlHinh=:UrlHinh,NgayBatDau=:NgayBatDau,NgayKetThuc=:NgayKetThuc WHERE idQC like :idQC";
		//$sql="UPDATE quangcao SET idVT='$idVT',MoTa='$MoTa',Url='$Url',NgayBatDau='$NgayBatDau',NgayKetThuc='$NgayKetThuc' WHERE idQC like '$idQC' ";
        //echo "<pre>"; print_r($arr); echo $sql;
		return $this->query($sql, $arr);
	}	
}
?>