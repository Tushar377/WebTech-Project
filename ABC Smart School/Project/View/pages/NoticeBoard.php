<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Approval</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend>Notice Board</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $materials = $connection->ClassMaterials($conobj, "notices");

        if ($materials->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Notice Date</th>
                </tr>
                <?php
                // output data of each row
                while ($row = $materials->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Notice'] ?></td>
                        <td><?php echo $row['Details'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                    </tr>
                <?php
                } ?>

            </table>
        <?php
        }

        ?>
    </fieldset>
    <br>
    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>