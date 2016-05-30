<?php
include_once 'DB.php';

	class Delete{
		public function deleteById($id){
			$sql = "DELETE FROM person WHERE id = :id";
			$stm = DB::prepare($sql);
			$stm->bindParam('id',$id);
			$stm->execute();
			return $stm;
		}
	}

?>