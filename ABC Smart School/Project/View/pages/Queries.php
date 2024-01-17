<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>My Queries</title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
    <fieldset>
        <legend>My Queries</legend>

        <?php
        include "../../model/DatabaseConnection.php";
        $connection = new DatabaseConnection();
        $conobj = $connection->OpenCon();

        $queries = $connection->GetQueries($conobj, "queries", (int)$_SESSION["UserId"]);
        // echo $queries;
        if ($queries->num_rows > 0) { ?>
            <table>
                <tr>
                    <th>#</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Answer</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <?php
                // output data of each row
                while ($row = $queries->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['id'] ?></td>
                        <td><?php echo $row['Subject'] ?></td>
                        <td><?php echo $row['Description'] ?></td>
                        <td><?php if(empty($row['Answer'])) echo "No Answer Yet"; else echo $row['Answer'] ?></td>
                        <td><?php echo $row['Date'] ?></td>
                        <td><a class='button' href='./ViewQuery.php?id=<?php echo $row['id'] ?>'>View</a></td>
                        <?php if(empty($row['Answer'])) { ?>
                        <td><a class='button' href='./EditQuery.php?id=<?php echo $row['id'] ?>'>Edit</a></td>
                        <td><a class='button1' href='../../Controller/DeleteQuery.php?id=<?php echo $row['id'] ?>'>Delete</a></td>
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