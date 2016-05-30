<?php
include_once 'DB.php';

class Read{

	public function readAll($table){
		$sql = 'SELECT * FROM '.$table;
		$stm = DB::prepare($sql);
		$stm->execute();
		return $stm->fetchAll();
	}

	public function readById($id,$table){
		$sql = 'SELECT * FROM '.$table.' WHERE id = :id';
		$stm = DB::prepare($sql);
		$stm->bindParam('id',$id);
		$stm->execute();
		return $stm->fetch();
	}


}
?>