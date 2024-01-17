<?php
session_start();
include "../../Controller/PostQueryController.php";
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
 ?>
<!DOCTYPE html>
<html>

<head>

    <title>Ask Your Queries</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>
                <fieldset style="background-color: #b1d0d6;">
                    <legend>Ask Your Queries</legend>
                    <table>
                        <font color="red"> *Required
                            <div>
                                <tr>
                                    <td>Subject* : </td>
                                    <td><input type="text" id="name" placeholder="Enter your Name" name="Subject">
                                        <span style="color: #FF0000"><?php echo $ValidSubject; ?></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Description*: </td>
                                    <td>
                                        <textarea style="background-color: #ffffff; color:black" rows="3" name="Description" placeholder="Enter your address"></textarea>
                                        <span style="color: #FF0000"><?php echo $ValidDescription; ?></span>
                                    </td>
                                <tr>
                                <tr>
                                    <td> <input type="submit" name="Submit">
                                        <input type="reset" name="Reset">
                                    </td>

                                </tr>
                    </table>
                    </div>
                </fieldset>
    </form>
    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>