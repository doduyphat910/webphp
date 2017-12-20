<?php 
class tintuc extends Db{
	function showalltintuc(){
		return $this->query("Select * from tintuc");
	}
	function addtintuc($idLT,$idUser,$TieuDe,$TomTat,$NoiDung,$SoLuotXem,$Nguon,$Link){
		$arr = array(":idLT"=>$idLT,":idUser"=>$idUser,":TieuDe"=>$TieuDe,":TomTat"=>$TomTat,":NoiDung"=>$NoiDung,":SoLuotXem"=>$SoLuotXem,":Nguon"=>$Nguon,":HinhAnh"=>$Link);

		$sql = "insert into tintuc (idLT, idUser, TieuDe,TomTat,NgayDang,NoiDung,SoLanXem,Nguon,UrlHinh, AnHien) 
		values(:idLT, :idUser, :TieuDe,:TomTat, CURRENT_DATE, :NoiDung, :SoLuotXem, :Nguon, :HinhAnh, 1) ";
		return $this->query($sql,$arr);
	}

	/*CTV*/
	function addtintucCTV($idLT,$idUser,$TieuDe,$TomTat,$NoiDung,$SoLuotXem,$Nguon,$Link){
		$arr = array(":idLT"=>$idLT,":idUser"=>$idUser,":TieuDe"=>$TieuDe,":TomTat"=>$TomTat,":NoiDung"=>$NoiDung,":SoLuotXem"=>$SoLuotXem,":Nguon"=>$Nguon,":HinhAnh"=>$Link);
		
		//print_r($arr);exit;
		$sql = "insert into tintuc (idLT, idUser, TieuDe,TomTat,NgayDang,NoiDung,SoLanXem,Nguon,UrlHinh, AnHien) 
		values(:idLT, :idUser, :TieuDe,:TomTat, CURRENT_DATE, :NoiDung, :SoLuotXem, :Nguon, :HinhAnh, 0) ";
		return $this->query($sql,$arr);
	}
	function showalltintucCTV($nguon){
		$arr = array(":nguon"=>$nguon);
		$sql = "Select * from tintuc Where Nguon like :nguon AND AnHien = 1";
		return $this->query($sql, $arr);
	}

	/*Update Tin*/

	function showTinCapNhat($idTinTuc){
		$arr = array(":idTinTuc"=>$idTinTuc);
		$sql = "Select * from tintuc WHERE idTinTuc like :idTinTuc";
		return $this->query($sql, $arr);
	}

	function updateTin($idTinTuc, $idLT, $TieuDe, $TomTat, $NoiDung, $Link, $AnHien){
		$arr = array(":idTinTuc"=>$idTinTuc,":idLT"=>$idLT,":TieuDe"=>$TieuDe,":TomTat"=>$TomTat,":NoiDung"=>$NoiDung,":HinhAnh"=>$Link, ":AnHien"=>$AnHien);
		$sql = "UPDATE tintuc SET idLT =:idLT, TieuDe=:TieuDe, TomTat=:TomTat, NoiDung=:NoiDung, UrlHinh = :HinhAnh,
		AnHien= :AnHien WHERE idTinTuc like :idTinTuc";
		return $this->query($sql, $arr);
	}

	/*Delete tin*/

	function deleteTin($idTinTuc){
		$arr = array(":idTinTuc"=>$idTinTuc);
		$sql = "DELETE FROM tintuc WHERE idTinTuc LIKE :idTinTuc";
		return $this->query($sql, $arr);
	}
}
?>