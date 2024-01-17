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
        <legend>Users</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $users = $connection->ShowUsersData($conobj, "users");

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
                    <th>User Type</th>
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
                        <td><?php echo $row['User_Type'] ?></td>
                        <?php if($row['Validation']=='True') { ?>
                            
                        <td><a class='button1' href='../../Controller/RegistrationApprovalController.php?approve=False&id=<?php echo $row['id'] ?>'>Block</a></td>
                        <?php } else { ?>

                        <td><a class='button' href='../../Controller/RegistrationApprovalController.php?approve=True&id=<?php echo $row['id'] ?>'>Approve</a></td>
                        <?php } ?>
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