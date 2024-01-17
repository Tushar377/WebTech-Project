<?php
session_start();
include "../../Controller/EditQueryController.php";
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
$Subject="";
$ValidSubject="";
$Description="";
$ValidDescription="";

$_Subject="";
$_Description="";
$Error=false;

$connection = new DatabaseConnection();
$conobj = $connection->OpenCon();
$userQuery = $connection->getQuery($conobj, "queries", $_GET["id"]);

if ($userQuery->num_rows > 0) {

  // output data of each row
  while ($row = $userQuery->fetch_assoc()) {
    $Subject=$row["Subject"];
    $Description=$row["Description"];
  }
} 
 ?>
<!DOCTYPE html>
<html>

<head>

    <title>Edit Your Queries</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>
                <fieldset style="background-color: #b1d0d6;">
                    <legend>Edit Your Queries</legend>
                    <table>
                        <font color="red"> *Required
                                <tr>
                                    <td>Subject* : </td>
                                    <td><input type="text" id="name" placeholder="Enter your Name" name="Subject" value="<?php echo $Subject; ?>">
                                        <span style="color: #FF0000"><?php echo $ValidSubject; ?></span>
                                        <input type="hidden" name="queryID" value="<?php echo $_GET["id"]; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td> Description*: </td>
                                    <td>
                                        <textarea style="background-color: #ffffff; color:black" rows="3" name="Description" placeholder="Enter your address"><?php echo $Description; ?></textarea>
                                        <span style="color: #FF0000"><?php echo $ValidDescription; ?></span>
                                    </td>
                                <tr>
                                <tr>
                                    <td> <input type="submit" name="Submit">
                                        <input type="reset" name="Reset">
                                    </td>

                                </tr>
                    </table>
                </fieldset>
    </form>
    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>