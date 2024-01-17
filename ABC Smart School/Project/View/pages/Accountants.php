<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>All Accountants</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend>All Accountants</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $users = $connection->ShowSpecificUsers($conobj, "users", "accountant");

        if ($users->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
                <?php
                // output data of each row
                while ($row = $users->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Name'] ?></td>
                        <td><?php echo $row['Email'] ?></td>
                        <td><?php echo $row['Username'] ?></td>
                        <td><?php echo $row['Phone'] ?></td>
                        <td><?php echo $row['Address'] ?></td>
                        <td><?php echo $row['DOB'] ?></td>
                        <td><?php echo $row['Gender'] ?></td>
                        <td><a class='button' href='./ProfileView.php?id=<?php echo $row['id'] ?>'>View</a></td>
                        <td><a class='button1' href='../../Controller/DeleteUser.php?id=<?php echo $row['id'] ?>'>Delete</a></td>
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