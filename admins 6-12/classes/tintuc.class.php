<?php 
class tintuc extends Db{
	function showalltintuc(){
		return $this->query("Select * from tintuc");
	}
	function addtintuc($TenTL, $ThuTu, $AnHien){
		$arr = array(":TenTL"=>$TenTL,":ThuTu"=>$ThuTu,":AnHien"=>$AnHien);
		$sql = "insert into tintuc (TenTL, ThuTu, AnHien) values(:TenTL, :ThuTu, :AnHien) ";
		return $this->query($sql,$arr);
	}
}
?>