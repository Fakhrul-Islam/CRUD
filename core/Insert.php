<?php 
include_once 'DB.php';
class Insert{
	private $name;
	private $age;
	private $prof;
	private $table = 'person';

	public function setName($name){
		return $this->name = $name;
	}

	public function setAge($age){
		return $this->age = $age;
	}

	public function setProf($prof){
		return $this->prof = $prof;
	}
	public function insertData(){
		$sql = "INSERT INTO $this->table(name,age,profession) VALUES(:name,:age,:prof)";
		$stm = DB::prepare($sql);
		$stm->bindParam('name',$this->name);
		$stm->bindParam('age',$this->age);
		$stm->bindParam('prof',$this->prof);
		return $stm->execute();
	}

}
?>