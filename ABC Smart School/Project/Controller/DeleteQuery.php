<?php if(!empty($_GET['id'])){ ?>
<?php 

include '../model/DatabaseConnection.php';
$connection=new DatabaseConnection();
$conobj=$connection->OpenCon();
$delete=$connection->deleteUser($conobj, "queries", $_GET['id']);
if ($delete) {
    header('Location: ../View/pages/Dashboard.php?msg=Query Deleted Successfully');
}
else{
	header('Location: ../View/pages/Dashboard.php>');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>