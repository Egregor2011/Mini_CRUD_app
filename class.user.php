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
		if(isset($id)){
			$query = $this->link->query("SELECT * FROM users WHERE id = '$id' LEFT JOIN cities USING(city_id) ORDER BY id ASC");
			}else{
			$query = $this->link->query("SELECT * FROM users LEFT JOIN cities USING(city_id) ORDER BY id ASC");	
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
	
	public function updateUserName ($newName, $userID){
		$this->connect();
		if (mysql_query ("UPDATE users SET name = '".$newName."' WHERE id = ".$userID." LIMIT 1;")){
			return true;
		} else{
			return false;
		}
	}
}

	




 ?>
