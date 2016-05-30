<?php
include_once 'DB.php';

class Read{

	public function readAll($table){
		$sql = 'SELECT * FROM '.$table;
		$stm = DB::prepare($sql);
		$stm->execute();
		return $stm->fetchAll();

	}


}
?>