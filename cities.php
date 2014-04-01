<?php 
require_once("class.database.php");

$con = new database;
$res = $con->connect();

$query = $res->query("SELECT * FROM cities");
$query->setFetchMode(PDO::FETCH_ASSOC);
				$goal = $query->fetchAll();

 ?>