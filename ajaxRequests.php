<?php
if (!empty($_POST)) {

	$method = $_POST['request'];
	$param = $_POST['parameter'];
	//echo "request = $method with the parameter = $param\n";

	include 'database.php';
	include 'functions.php';

	$db = new database();
	$cflag = $db->isConnected();
	//echo "DB connection status: $cflag\n";

	$functions = new functions($db);
	if (method_exists($functions, $method))
	{
		$data = $functions->$method($param);
		$cflag = $db->isConnected();
		//echo "DB connection status: $cflag\n";
		header('Content-Type: application/json');
		echo json_encode($data);
	}
}
?>
