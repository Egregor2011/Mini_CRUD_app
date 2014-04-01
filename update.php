<?php 
require 'class.database.php';

$id = null;
	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	if ( null==$id ) {
		header("Location: index.php");
	}

	if ( !empty($_POST)) {
		
		$nameError = null;
		$ageError = null;
		$cityError = null;

		$name = $_POST['name'];
		$age = $_POST['age'];
		$city = $_POST['city'];

		$valid = true;
		if (empty($name)) {
			$nameError = 'Please enter Name';
			$valid = false;
		}
		
		if (empty($age)) {
			$ageError = 'Please enter Age ';
			$valid = false;
		} 
		
		

		if ($valid) {
			$con = new database;
			$pdo = $con->connect();
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE users set name = ?, age = ?, city =? WHERE id = ?";
			$q = $pdo->prepare($sql);
			$q->execute(array($name,$age,$city,$id));
			$pdo=null;
			header("Location: index.php");
		}else{
			$pdo = new database;
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "SELECT * FROM users where id = ?";
		$q = $pdo->prepare($sql);
		$q->execute(array($id));
		$data = $q->fetch(PDO::FETCH_ASSOC);
		$name = $data['name'];
		$age = $data['age'];
		$city = $data['city'];
		$pdo = null;
		}

 ?>