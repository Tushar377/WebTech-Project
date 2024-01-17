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
        <legend>Class Materials</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $materials = $connection->ClassMaterials($conobj, "class_materials");

        if ($materials->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>File</th>
                </tr>
                <?php
                // output data of each row
                while ($row = $materials->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td><a style="text-decoration:none; color:chocolate;" href='<?php echo $row['File_Path'] ?>'>Download</a></td>
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