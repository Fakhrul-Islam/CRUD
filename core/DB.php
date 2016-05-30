<?php

include_once('config.php');
class DB{

	private static $conn;

	public static function connection(){
		try{
			self::$conn = new PDO('mysql:host='.HOST.';dbname='.DB,'root','');
		}catch(PDOException $e){
			echo $e->getMessage();
		}
		return self::$conn;
	}

	public static function prepare($sql){
		return self::connection()->prepare($sql);
	}












}

?>