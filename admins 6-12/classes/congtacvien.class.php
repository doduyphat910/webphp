<?php 
class congtacvien extends Db{
	function showcongtacvien($idGroup){
		
		$arr=array(":idGroup" =>$idGroup);
		$sql="Select * from user where idGroup= :idGroup";
		return $this->query($sql,$arr);
		//return $data[0];// chuyen mang array thanh data.
	}
	
	function addCTV($HoTenUser, $UserName, $Password, $DiaChi, $Email, $DienThoai, $GioiTinh, $NgaySinh, $NgayDangKi, $idGroup){
		$arr = array(":HoTenUser"=>$HoTenUser,":UserName"=>$UserName,":Password"=>$Password,":DiaChi"=>$DiaChi,":Email"=>$Email,":DienThoai"=>$DienThoai,":GioiTinh"=>$GioiTinh,":NgaySinh"=>$NgaySinh,":NgayDangKi"=>$NgayDangKi,":idGroup"=>$idGroup);
		$sql = "insert into user(HoTenUser, UserName, Password, DiaChi, Email, DienThoai, GioiTinh, NgaySinh, NgayDangKi, idGroup) values(:HoTenUser, :UserName, :Password, :DiaChi, :Email, :DienThoai, :GioiTinh,:NgaySinh,:NgayDangKi,:idGroup) ";
		return $this->query($sql,$arr);
	}
	function deleteCTV($idUser)
	{	
		$arr=array(":idUser"=>$idUser);
		$sql="delete from user where idUser = :idUser";
		return $this->query($sql,$arr);
	}
	function updateCTV($idUser,$HoTenUser, $UserName, $Password, $DiaChi, $Email, $DienThoai, $GioiTinh, $NgaySinh, $NgayDangKi, $idGroup)
	{
		$arr=array(":idUser"=>$idUser,":HoTenUser"=>$HoTenUser,":UserName"=>$UserName,":Password"=>$Password,":DiaChi"=>$DiaChi,":Email"=>$Email,":DienThoai"=>$DienThoai,":GioiTinh"=>$GioiTinh,":NgaySinh"=>$NgaySinh,":NgayDangKi"=>$NgayDangKi,":idGroup"=>$idGroup);
		$sql="UPDATE user SET HoTenUser =:HoTenUser, UserName=:UserName, Password=:Password,DiaChi=:DiaChi,Email=:Email, DienThoai
			=:DienThoai,GioiTinh=:GioiTinh,NgaySinh=:NgaySinh,NgayDangKi=:NgayDangKi,idGroup=:idGroup  WHERE idUser = :idUser";
		return $this->query($sql,$arr);
	}
	function showidCTV($idUser)
	{
		$arr=array(":idUser"=>$idUser);
		$sql="Select *from user where idUser = :idUser";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
		//return $this->query($sql,$arr);
	}

	/*Update tin*/
	function showTinCapNhat($idTinTuc){
		$arr = array(":idTinTuc"=>$idTinTuc);
		$sql = "Select * from tintuc WHERE idTinTuc like :idTinTuc";
		return $this->query($sql, $arr);
	}
	function updateTin($idTinTuc, $idLT, $TieuDe, $TomTat, $NoiDung, $Link){
		$arr = array(":idTinTuc"=>$idTinTuc,":idLT"=>$idLT,":TieuDe"=>$TieuDe,":TomTat"=>$TomTat,":NoiDung"=>$NoiDung,":HinhAnh"=>$Link);
		$sql = "UPDATE tintuc SET idLT =:idLT, TieuDe=:TieuDe, TomTat=:TomTat, NoiDung=:NoiDung, UrlHinh = :HinhAnh WHERE idTinTuc like :idTinTuc";
		return $this->query($sql, $arr);
	}
	
}
?>