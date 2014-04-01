<?php 
require_once('class.user.php');

$us = new User;
$res = $us->GetAllUsers();

echo json_encode($res);

 ?>