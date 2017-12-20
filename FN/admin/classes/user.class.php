<?php 
class user extends Db{	
	function showuser($idGroup){
		
		$arr=array(":idGroup" =>$idGroup);
		$sql="Select * from user where idGroup= :idGroup";
		return $this->query($sql,$arr);
		//return $data[0];// chuyen mang array thanh data.
	}
	
	function addUser($HoTenUser, $UserName, $Password, $DiaChi, $Email, $DienThoai, $GioiTinh, $NgaySinh, $NgayDangKi, $idGroup){
		$arr = array(":HoTenUser"=>$HoTenUser,":UserName"=>$UserName,":Password"=>$Password,":DiaChi"=>$DiaChi,":Email"=>$Email,":DienThoai"=>$DienThoai,":GioiTinh"=>$GioiTinh,":NgaySinh"=>$NgaySinh,":NgayDangKi"=>$NgayDangKi,":idGroup"=>$idGroup);
		$sql = "insert into user(HoTenUser, UserName, Password, DiaChi, Email, DienThoai, GioiTinh, NgaySinh, NgayDangKi, idGroup) values(:HoTenUser, :UserName, :Password, :DiaChi, :Email, :DienThoai, :GioiTinh,:NgaySinh,:NgayDangKi,:idGroup) ";
		return $this->query($sql,$arr);
	}
	function deleteUser($idUser)
	{	
		$arr=array(":idUser"=>$idUser);
		$sql="delete from user where idUser = :idUser";
		return $this->query($sql,$arr);
	}
	function updateUser($idUser,$HoTenUser, $UserName, $Password, $DiaChi, $Email, $DienThoai, $GioiTinh, $NgaySinh, $NgayDangKi, $idGroup)
	{
		$arr=array(":idUser"=>$idUser,":HoTenUser"=>$HoTenUser,":UserName"=>$UserName,":Password"=>$Password,":DiaChi"=>$DiaChi,":Email"=>$Email,":DienThoai"=>$DienThoai,":GioiTinh"=>$GioiTinh,":NgaySinh"=>$NgaySinh,":NgayDangKi"=>$NgayDangKi,":idGroup"=>$idGroup);
		$sql="UPDATE user SET HoTenUser =:HoTenUser, UserName=:UserName, Password=:Password,DiaChi=:DiaChi,Email=:Email, DienThoai
			=:DienThoai,GioiTinh=:GioiTinh,NgaySinh=:NgaySinh,NgayDangKi=:NgayDangKi,idGroup=:idGroup  WHERE idUser = :idUser";
		return $this->query($sql,$arr);
	}
	function showidUser($idUser)
	{
		$arr=array(":idUser"=>$idUser);
		$sql="Select *from user where idUser = :idUser";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}

	/*Login*/
	function Login ($un, $pw){
            $arr = array(":UN"=>"$un", ":PW"=>"$pw" );
            $sql = "SELECT * FROM User WHERE UserName like :UN AND Password like :PW";
            return $this->query($sql, $arr);
        }
}
?>