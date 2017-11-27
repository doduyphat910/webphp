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
	function getNewsFollowCategorys($idTL){
		$arr = array(":idTL" => "$idTL");
		$sql = "Select * FROM loaitin INNER JOIN tintuc WHERE idTL like :idTL AND loaitin.idLT = tintuc.idLT ORDER BY tintuc.idTinTuc DESC LIMIT 6,10";
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
}
?>