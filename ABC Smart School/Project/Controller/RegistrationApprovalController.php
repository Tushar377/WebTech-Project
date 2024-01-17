<?php 
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
if (!empty($_GET['id'])) {
// echo $_GET['approve'];
	include '../model/DatabaseConnection.php';
	$connection = new DatabaseConnection();
	$conobj = $connection->OpenCon();
	$result = $connection->ApproveRejectUser($conobj, "users", $_GET['id'],$_GET['approve']);
	// echo $result;
	if ($result) {
		header('Location: ../View/pages/RegistrationApproval.php');
	} else {
		header('Location: ../View/pages/RegistrationApproval.php>');
	}
} else {
	echo "You are not allowed to visit this page";
}
?>