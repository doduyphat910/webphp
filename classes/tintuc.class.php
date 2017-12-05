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
		$sql = "INSERT INTO user VALUES (null, ':hoten', ':username', ':pw', ':dc', ':email', ':dt', 
		':gt', ':nsinh', ':ndk', ':idGroup')";
		return $this->query($sql, $arr);
	}*/
	function Register ($hoten, $username, $pw, $dc, $email, $dt, $gt, $nsinh, $ndk, $idGroup){
		return $this->query( "INSERT INTO user VALUES (null, '$hoten', '$username', '$pw', '$dc', 
			'$email', '$dt', '$gt', '$nsinh', '$ndk', '$idGroup')");
	}

	/* Relations News */

	function RelationsNews ($idLT){
		$arr = array(":idLT"=>"$idLT");
		$sql = "SELECT * FROM tintuc WHERE idLT LIKE :idLT ORDER BY RAND() LIMIT 0,4 ";
		return $this->query($sql, $arr);
	}

	/*Comment*/

	function addComment($idTinTuc, $idUser, $NoiDung, $NgayDang, $AnHien){
		$arr = array(":idTinTuc"=>"$idTinTuc", ":idUser"=>"$idUser",":NoiDung"=>"$NoiDung", 
		":NgayDang"=>"$NgayDang", ":AnHien"=>"$AnHien" );
		$sql = "INSERT INTO binhluan (idTinTuc, idUser, NoiDung, NgayDang, AnHien) VALUES (:idTinTuc, :idUser, :NoiDung, :NgayDang, :AnHien)";
		return $this->query($sql, $arr);	
	}

	function showComment($idTinTuc){
		$arr = array(":idTinTuc"=>"$idTinTuc");
		$sql = "SELECT * FROM binhluan INNER JOIN user WHERE idTinTuc LIKE :idTinTuc AND AnHien = 1";
		return $this->query($sql, $arr); 
	}

	/*Reply Comment*/ 

	function addReply($idBL, $idUser, $NoiDung, $NgayDang, $AnHien){
		$arr = array(":idBL"=>"$idBL", ":idUser"=>"$idUser",":NoiDung"=>"$NoiDung", 
		":NgayDang"=>"$NgayDang", ":AnHien"=>"$AnHien" );
		$sql = "INSERT INTO tlbinhluan (idBL, idUser, NoiDung, NgayDang, AnHien) VALUES (:idBL, :idUser, :NoiDung, :NgayDang, :AnHien)";
		return $this->query($sql, $arr);
	}

	function showReply($idBL){
		$arr = array(":idBL"=>"$idBL");
		$sql = "SELECT * FROM tlbinhluan INNER JOIN user WHERE idBL LIKE :idBL AND AnHien = 1";
		return $this->query($sql, $arr); 
	}

	/*Advertisement*/
	function showQuangCaoTrangChu($idVT){
		$arr = array(":idVT"=>"$idVT");
		$sql = "SELECT * FROM quangcao WHERE idVT like :idVT AND CURRENT_DATE < NgayKetThuc  
		ORDER BY RAND()LIMIT 0,5 ";
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
}
?>