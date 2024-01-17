<?php if(!empty($_GET['id'])){ ?>
<?php 

include '../model/DatabaseConnection.php';
$connection=new DatabaseConnection();
$conobj=$connection->OpenCon();
$delete=$connection->deleteUser($conobj, "users", $_GET['id']);
if ($delete) {
    header('Location: ../View/pages/Dashboard.php?msg=User Deleted Successfully');
}
else{
	header('Location: ../View/pages/Dashboard.php>');
}
 ?>
<?php }
else{
	echo "You are not allowed to visit this page";
} ?>