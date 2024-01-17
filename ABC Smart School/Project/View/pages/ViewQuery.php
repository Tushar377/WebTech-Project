<?php
session_start();
include "../../model/DatabaseConnection.php";
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
$Subject="";
$Answer="";
$Description="";
$Date="";

$connection = new DatabaseConnection();
$conobj = $connection->OpenCon();
$userQuery = $connection->getQuery($conobj, "queries", $_GET["id"]);

if ($userQuery->num_rows > 0) {

  // output data of each row
  while ($row = $userQuery->fetch_assoc()) {
    $Subject=$row["Subject"];
    $Description=$row["Description"];
    $Answer=$row["Answer"];
    $Date=$row["Date"];
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
                                    <td><?php echo $Subject; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Description*: </td>
                                    <td>
                                    <?php echo $Description; ?>
                                    </td>
                                <tr>
                                <tr>
                                    <td> Answer*: </td>
                                    <td>
                                    <?php echo $Answer; ?>
                                    </td>

                                </tr>
                                <tr>
                                    <td> Date*: </td>
                                    <td>
                                    <?php echo $Date; ?>
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