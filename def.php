<?php
class User{

	public $link;

	function __construct(){
		require_once ('class.database.php');
		$conn = new database;
		$this->link = $conn->connect();

		return $this->link;
	}

	function GetAllUsers($id=null){
		$r = $this->link;
		if(isset($id)){
			$query = $r->query("SELECT * FROM users WHERE id = '$id' LEFT JOIN cities USING(city_id) ORDER BY id ASC");
			}else{
			$query = $r->query("SELECT * FROM users LEFT JOIN cities USING(city_id) ORDER BY id ASC");	
			}
			$rowCount = $query->rowCount();
			if($rowCount >= 1){
				$query->setFetchMode(PDO::FETCH_ASSOC);
				$result = $query->fetchAll();

			}else{
				$result = 0;
			}
			return $result;
	}
	}
	
	class Def extends User{
	function getCities(){
		
		$res = $this->link;

		$query = $res->query("SELECT * FROM cities");
		$query->setFetchMode(PDO::FETCH_ASSOC);
				$goal = $query->fetchAll();
				return $goal;
}
	public function updateUserCity ($city_id, $id){
		$res = $this->link;
		if ($res->query("UPDATE users SET city_id = '".$city_id."' WHERE id = ".$id." LIMIT 1;")){
			return true;
		} else{
			return false;
		}
	}
	
	public function updateUserAge ($newAge, $id){
		$res = $this->link;
		if ($res->query("UPDATE users SET age = '".$newAge."' WHERE id = ".$id." LIMIT 1;")){
			return true;
		} else{
			return false;
		}
	}
	public function updateUserName ($newName, $id){
		$res = $this->link;
		if ($res->query("UPDATE users SET name = '".$newName."' WHERE id = ".$id." LIMIT 1;")){
			return true;
		} else{
			return false;
		}
	}
	public function deleteUser ($id){
		$res = $this->link;
		if ($res->query("DELETE FROM users WHERE id = ".$id.";")){
			return true;
		}else{
			return false;
		}
	}

}





?>
