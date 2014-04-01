<?php 

require_once 'def.php';

require_once 'twig/lib/Twig/Autoloader.php';

Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('tpls');

$twig = new Twig_Environment($loader);

$User = new Def();
$cityOptions = $User->getCities();

if ($_GET[''] === 'deleteuser' && !empty($_POST)) {
	if ($User->deleteUser($_POST['userID'])) {
		echo 1;
	} else {
		echo 0;
	}
	exit;
}

if ($_GET[''] === 'updatename' && !empty($_POST)) {
	if ($User->updateUserName($_POST['newName'], $_POST['userID'])) {
		echo 1;
	} else {
		echo 0;
	}		
	exit;
}

if ($_GET[''] === 'updateage' && !empty($_POST) && ctype_digit($_POST['newAge'])){
	if ($User->updateUserAge($_POST['newAge'],$_POST['userID'])){
		echo 1;
	} else{
		echo 0;
	}
	exit;
}
if ($_GET[''] === 'updatecity' && !empty($_POST)){
	if ($User->updateUserCity($_POST['newCity'], $_POST['userID'])){
		echo 1;
	} else{
		echo 0;
	}
	exit;
}

$usersList = $User->getAllUsers();
$data = array();
$data['usersList'] = $usersList;
$data['cityOptions']=$cityOptions;

echo $twig->render('index.twig', $data);
exit;





 ?>