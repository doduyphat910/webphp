<?php
class login extends Db{
	function Login ($un, $pw){
		$arr = array(":UN"=>$un,":PW"=>$pw);
		$sql = "SELECT * FROM User WHERE UserName like :UN AND Password like :PW";
		return $this->query($sql, $arr);
	}
}
?> 