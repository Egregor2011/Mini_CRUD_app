<?php 
include_once ('class.user.php');

$init = new User;


$data = $init->GetAllUsers();


print_r($data);

 ?>