<?php
class tintuc extends Db {
	function getCategorys(){
		return $this->query("Select * from theloai where AnHien = '1' limit 0,9");
	}

	function getOneCategorys($idTL){
		$arr = array(":id"=>"$idTL");
		$sql = "Select TenTL from theloai where idTL like :id ";
		return $this->query($sql, $arr);
	}

	function getLoaiTin($idTL){
		$arr = array(":idTL"=>"$idTL");
		$sql = "Select * from loaitin where idTL like :idTL and AnHien = '1' limit 0, 10";
		return $this->query($sql, $arr);
	}

	function getImagesSliderActive(){
		return $this->query("Select * from tintuc ORDER BY idTinTuc DESC limit 1,1");
	}
	function getImagesSliderItem(){
		return $this->query("Select * from tintuc ORDER BY idTinTuc DESC limit 2,2");
	}
	function get2NewsColumnRights(){
		return $this->query("Select * from tintuc ORDER BY idTinTuc DESC limit 4, 2");
	}

	function get3NewsColumnLefts(){
		return $this->query("Select * from tintuc ORDER BY idTinTuc DESC limit 6, 4");
	}
	function get1News($idTinTuc){
		$arr= array(":idTin"=>"$idTinTuc");
		$sql = "select * From tintuc where idTinTuc like :idTin";
		return $this->query($sql, $arr);
	}
	function get3HotNews(){
		return $this->query("Select * From tintuc ORDER BY SoLanXem DESC limit 0,4");
	}


	/*Category*/
	function getNewsFollowCategorys($idTL){
		$arr = array(":idTL" => "$idTL");
		$sql = "Select * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT 0,78";
		return $this->query($sql, $arr);
	}
	function get1NewsSliderActive($idTL){
		$arr = array(":idTL" => "$idTL");
		$sql = "Select * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT 0,1";
		return $this->query($sql, $arr);
	}
	function get2NewsSliderItem($idTL){
		$arr = array(":idTL" => "$idTL");
		$sql = "Select * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT 1,2";
		return $this->query($sql, $arr);
	}
	function get2NewsColumnRightsCategorys($idTL){
		$arr = array(":idTL" => "$idTL");
		$sql = "Select * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT 4,2";
		return $this->query($sql, $arr);
	}


	/*get by type*/
	function get1NewsByTypeSliderActive($idLT){
		$arr = array(":idLT" => "$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY idTinTuc DESC LIMIT 0,1";
		return $this->query($sql, $arr);
	}
	function get2NewsByTypeSliderItems($idLT){
		$arr = array(":idLT" => "$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY idTinTuc DESC LIMIT 1,2";
		return $this->query($sql, $arr);
	}
	function get2NewsByType($idLT){
		$arr = array(":idLT" => "$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY idTinTuc DESC LIMIT 4,2";
		return $this->query($sql, $arr);
	}
	function getNewsByType($idLT){
		$arr = array(":idLT" => "$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY idTinTuc DESC LIMIT 0,78";
		return $this->query($sql, $arr);
	}


	/*see more news*/
	function seeMoreNews(){
		return $this->query("SELECT * FROM tintuc ORDER BY idTinTuc DESC LIMIT 0,78");
	}


	/*see more hot news*/
	function seeMoreHotNews(){
		return $this->query("SELECT * FROM tintuc ORDER BY SoLanXem DESC LIMIT 0,78");
	}


	/*paging*/
	function seeMoreNews_paging($from, $newsinpage){
		return $this->query("SELECT * FROM tintuc ORDER BY idTinTuc DESC LIMIT $from, $newsinpage");
	}
	function seeMoreHotNews_paging($from, $newsinpage){
		return $this->query("SELECT * FROM tintuc ORDER BY SoLanXem DESC LIMIT $from, $newsinpage");
	}
	function getNewsFollowCategorys_paging($idTL, $from, $newsinpage){
		$arr = array(":idTL" => "$idTL");
		$sql = "SELECT * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT $from, $newsinpage";
		return $this->query($sql, $arr);
	}
	function getNewsByType_paging($idLT, $from, $newsinpage){
		$arr = array(":idLT" => "$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY idTinTuc DESC LIMIT 
				$from, $newsinpage";
		return $this->query($sql, $arr);
	}


	/*breadCrumb*/
	function breadCrumbLT ($idLT){
		$arr = array(":idLT"=>"$idLT");
		$sql = "SELECT * FROM loaitin, theloai WHERE loaitin.idTL=theloai.idTL AND idLT = $idLT";
		return $this->query($sql, $arr);
	}
	function breadCrumbTL ($idTL){
		$arr= array(":idTL"=>"$idTL"); 
		$sql = "SELECT * FROM theloai WHERE idTL like :idTL";
		return $this->query($sql, $arr);
	}


	/*Search*/
	function search($TieuDe){
		$arr = array(":TieuDe"=>"%$TieuDe%");
		$sql = "SELECT * FROM tintuc WHERE TieuDe like :TieuDe ORDER BY SoLanXem DESC LIMIT 0, 78";
		return $this->query($sql, $arr);
	}

	/*Login*/
	function Login ($un, $pw){
		$arr = array(":UN"=>"$un", ":PW"=>"$pw" );
		$sql = "SELECT * FROM User WHERE UserName like :UN AND Password like :PW";
		return $this->query($sql, $arr);
	}

	/* Register */
	/*function Register ($hoten, $username, $pw, $dc, $email, $dt, $gt, $nsinh, $ndk, $idGroup){
		$arr = array(":hoten"=>"$hoten", ":username"=>"$username", ":pw"=>"$pw", ":dc"=>"$dc", 
		":email"=> "$email", ":dt"=>"$dt", ":gt"=>"$gt", ":nsinh"=>"$nsinh", ":ndk"=>"$ndk",
		":idGroup"=>"$idGroup");
		$sql = "INSERT INTO user VALUES (null, :hoten, :username, :pw, :dc, :email, :dt, 
		:gt, :nsinh, :ndk, :idGroup)";
		return $this->query($sql, $arr);
	}*/
	function Register ($hoten, $username, $pw, $dc, $email, $dt, $gt, $nsinh, $ndk, $idGroup, $token){
		return $this->query( "INSERT INTO user VALUES (null, '$hoten', '$username', '$pw', '$dc', 
			'$email', '$dt', '$gt', '$nsinh', '$ndk', '$idGroup', '$token')");
	}

	/* Relations News */

	function RelationsNews ($idLT){
		$arr = array(":idLT"=>"$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY RAND() LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}

	/*Comment*/

	function addComment($idTinTuc, $idUser, $NoiDung, $AnHien){
		$arr = array(":idTinTuc"=>"$idTinTuc", ":idUser"=>"$idUser",":NoiDung"=>"$NoiDung", 
		 ":AnHien"=>"$AnHien" );
		$sql = "INSERT INTO binhluan (idTinTuc, idUser, NoiDung, NgayDang, AnHien) VALUES (:idTinTuc, :idUser, :NoiDung, CURRENT_TIMESTAMP, :AnHien)";
		return $this->query($sql, $arr);	
	}

	function showComment($idTinTuc){
		$arr = array(":idTinTuc"=>"$idTinTuc");
		$sql = "SELECT * FROM binhluan LEFT OUTER JOIN user ON binhluan.idUser = user.idUser WHERE binhluan.idTinTuc LIKE :idTinTuc AND binhluan.AnHien = 1";
		return $this->query($sql, $arr); 
	}

	/*Reply Comment*/ 

	function addReply($idBL, $idUser, $NoiDung, $AnHien){
		$arr = array(":idBL"=>"$idBL", ":idUser"=>"$idUser",":NoiDung"=>"$NoiDung", 
		 ":AnHien"=>"$AnHien" );
		$sql = "INSERT INTO tlbinhluan (idBL, idUser, NoiDung, NgayDang, AnHien) VALUES (:idBL, :idUser, :NoiDung, CURRENT_TIMESTAMP, :AnHien)";
		return $this->query($sql, $arr);
	}

	function showReply($idBL){
		$arr = array(":idBL"=>"$idBL");
		$sql = "SELECT * FROM tlbinhluan LEFT OUTER JOIN user ON tlbinhluan.idUser = user.idUser WHERE tlbinhluan.idBL = :idBL
		 AND AnHien = 1 ";
		return $this->query($sql, $arr); 
	}

	/*Update Comment*/
	function updateComment($idBL, $NoiDungUpdate){
		$arr = array(":idBL"=>"$idBL", ":NoiDungUpdate"=>"$NoiDungUpdate");
		$sql = "UPDATE binhluan  SET NoiDungUpdate = :NoiDungUpdate, TGUpdate = CURRENT_TIMESTAMP, DuyetUpdate = 0 
		WHERE idBL = :idBL";
		return $this->query($sql, $arr);
	}

	/*Update Rep Comment*/
	function updateRepCMT($idTLBL, $NoiDungRepUpdate){
		$arr = array(":idTLBL"=>"$idTLBL", ":NoiDungRepUpdate"=>"$NoiDungRepUpdate");
		$sql = "UPDATE tlbinhluan  SET NoiDungUpdate = :NoiDungRepUpdate, TGUpdate = CURRENT_TIMESTAMP, DuyetUpdate = 0 WHERE idTLBinhLuan = :idTLBL";
		return $this->query($sql, $arr);
	}

	/*Advertisement*/
	function showQuangCaoTrangChu($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,5 ";
		return $this->query($sql, $arr);
	}
		function showQuangCaoTrangChu2($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,3 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoXemThem1($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoXemThem2($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoTheLoai($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoLoaiTin($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoTin($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,5 ";
		return $this->query($sql, $arr);
	}
	function showQuangCaoTimKiem($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,5 ";
		return $this->query($sql, $arr);
	}

	/*User information*/
	function showInfor($idUser){
		$arr = array(":idUser"=>"$idUser");
		$sql = "SELECT * FROM user WHERE idUser like :idUser";
		return $this->query($sql, $arr);
	}
	function updateInfor($idUser, $hoten, $diachi, $sdt, $email, $ngaysinh, $gioitinh){
		$arr = array(":idUser"=>"$idUser",":hoten"=>"$hoten", ":diachi"=>"$diachi", ":sdt"=>"$sdt", 
			":email"=>"$email", ":ngaysinh"=>"$ngaysinh", ":gioitinh"=>"$gioitinh" );
		$sql = "UPDATE user set HoTenUser = :hoten, DiaChi = :diachi, DienThoai= :sdt, Email = :email, 
		NgaySinh=:ngaysinh, GioiTinh=:gioitinh WHERE idUser like :idUser";
		return $this->query($sql, $arr);
	}

	/*Forgot password*/
	function getEmail($tendangnhap){
		$arr = array(":tendangnhap"=>"$tendangnhap");
		$sql = "SELECT * FROM user WHERE UserName like :tendangnhap";
		return $this->query($sql, $arr);
	}
	/*Get All User*/
	function getAllUser(){
		return $this->query("SELECT * FROM user");
	}

	/*Update Password user*/
	function updatePWUser($idUser, $pw){
		$arr = array(":idUser"=>"$idUser", ":pw"=>"$pw");
		$sql = "UPDATE user set Password = :pw WHERE idUser LIKE :idUser";
		return $this->query($sql, $arr);
	}

	/*update Token*/
	function updateToken($idUser, $token){
		$arr = array(":token"=>"$token", ":idUser"=>"$idUser" );
		$sql = "UPDATE user set token = :token WHERE idUser LIKE :idUser";
		return $this->query($sql, $arr);
	}

	/*update count news*/
	function updateCount($idTinTuc){
		$arr = array(":idTinTuc"=>"$idTinTuc");
		$sql = "UPDATE tintuc SET SoLanXem=SoLanXem+1 WHERE idTinTuc like :idTinTuc";
		return $this->query($sql, $arr);
	}

	/*Tin trang chủ bên dưới*/
	function getAllTL(){
		return $this->query("SELECT * FROM theloai WHERE AnHien = 1 LIMIT 0,9");
	}
	function getAllLT($idTL){
		$arr = array(":idTL"=>"$idTL");
		$sql = "SELECT * FROM loaitin WHERE AnHien = 1 AND idTL = :idTL ORDER BY RAND() LIMIT 0,5" ;
		return $this->query($sql, $arr);
	}
	function get1TinTL($idTL){
		$arr = array(":idTL"=>"$idTL");
		//$sql = "SELECT * FROM tintuc Inner JOIN loaitin ON tintuc.idLT = loaitin.idLT Inner JOIN theloai ON loaitin.idTL = :idTL ORDER BY tintuc.idTinTuc DESC LIMIT 0,1 " ;
		$sql = "SELECT DISTINCT TieuDe, idTinTuc, UrlHinh, TomTat FROM tintuc Inner JOIN loaitin ON tintuc.idLT = loaitin.idLT Inner JOIN theloai ON loaitin.idTL = :idTL ORDER BY tintuc.idTinTuc DESC LIMIT 0,1  " ;
		return $this->query($sql, $arr);
	}
	function get2TinTL($idTL){
		$arr = array(":idTL"=>"$idTL");
		$sql = "SELECT DISTINCT TieuDe, idTinTuc FROM tintuc Inner JOIN loaitin ON tintuc.idLT = loaitin.idLT Inner JOIN theloai ON loaitin.idTL = :idTL ORDER BY tintuc.idTinTuc DESC LIMIT 1,2  " ;
		return $this->query($sql, $arr);
	}

	/*Vote*/
	function getQuestion($idTinTuc){
		$arr = array(":idTinTuc"=>"$idTinTuc");
		$sql = "SELECT * FROM binhchon WHERE idTinTuc = :idTinTuc";
		return $this->query($sql, $arr);
	}
	function getAnswer($idBC){
		$arr = array(":idBC"=>"$idBC");
		$sql = "SELECT * FROM chitietbinhchon WHERE idBC = :idBC";
		return $this->query($sql, $arr);
	}
	function updateVote($idCTBC){
		$arr = array(":idCTBC"=>"$idCTBC");
		$sql = "UPDATE chitietbinhchon SET SoLanChon = SoLanChon + 1 WHERE idCTBC = :idCTBC";
		return $this->query($sql, $arr);
	}

	function totalVote(){
		$total = $this->query("SELECT SoLanChon, SUM(SoLanChon) as total 
			FROM chitietbinhchon");
		return $total[0];
	}
}
?>