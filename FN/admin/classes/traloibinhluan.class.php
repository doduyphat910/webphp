<?php 
class traloibinhluan extends Db{
	function showallTLBL(){
		return $this->query("Select *from tlbinhluan");
	}
	function deleteTLBL($idTLBinhLuan)
	{	
		$arr=array(":idTLBinhLuan"=>$idTLBinhLuan);
		$sql="delete from tlbinhluan where idTLBinhLuan = :idTLBinhLuan";
		return $this->query($sql,$arr);
	}
	function addTLBL($idBL,$idUser,$NoiDung,$NgayDang,$AnHien){
		$arr = array(":idBL"=>$idBL,":idUser"=>$idUser,":NoiDung"=>$NoiDung,":NgayDang"=>$NgayDang,":AnHien"=>$AnHien);
		$sql = "insert into theloai(idBL,idUser,NoiDung, NgayDang, AnHien) values(:idBL,:idUser,:NoiDung,:NgayDang, :AnHien) ";
		return $this->query($sql,$arr);
	}
	function showidTLBL($idTLBinhLuan)
	{
		$arr=array(":idTLBinhLuan"=>$idTLBinhLuan);
		$sql="Select *from tlbinhluan where idTLBinhLuan = :idTLBinhLuan";
		$data= $this->query($sql,$arr);
		return $data[0];// chuyen mang array thanh data.
	}

	function updateAnHienTL ($idTLBinhLuan,$AnHien){
		$arr=array(":idTLBinhLuan"=>$idTLBinhLuan,":AnHien"=>$AnHien);
		$sql="UPDATE tlbinhluan SET AnHien= :AnHien WHERE idTLBinhLuan = :idTLBinhLuan";
		return $this->query($sql,$arr);
	}

	function updateTLBL($idTLBinhLuan, $AnHien,$DuyetTL, $NoiDungUpdate, $TGUpdate)
	{
		$arr=array("idTLBinhLuan"=>$idTLBinhLuan,":AnHien"=>$AnHien,":DuyetUpdate"=>$DuyetTL, ":NoiDungUpdate"=> $NoiDungUpdate,
			":TGUpdate"=>$TGUpdate);
		$sql="UPDATE tlbinhluan SET AnHien= :AnHien , DuyetUpdate=:DuyetUpdate, NoiDung = :NoiDungUpdate, NgayDang=:TGUpdate
		WHERE idTLBinhLuan = :idTLBinhLuan";
		return $this->query($sql,$arr);
	}
}
?>