<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../css/Seller/css/Mainpage.css">
    <link rel="stylesheet" type="text/css" href="../../css/design.css">
    <title>ABC Smart School</title>

</head>

<body style="background-image: url('../../File/background.jpg');">
    <div class="header sticky">
        <center>
            <h1>ABC Smart School</h1>
        </center>

        <div class="topnav">
            <a href="../../../index.php">Home</a>
            <?php
            if (isset($_SESSION["Username"]) && isset($_SESSION["User_Type"]) && $_SESSION["User_Type"] == 'admin') { ?>
                <a href="../pages/RegistrationApproval.php">Registration Approval</a>
                <a href="../pages/Students.php">Students</a>
                <a href="../pages/Teachers.php">Teachers</a>
                <a href="../pages/Accountants.php">Accountants</a>
                <a style="float: right;" href="../../Controller/logout.php">Logout</a>
                <a style="float: right;" href="Dashboard.php"><?php echo $_SESSION['Name'] ?></a>

                <?php } elseif(isset($_SESSION["Username"]) && isset($_SESSION["User_Type"]) && $_SESSION["User_Type"] == 'student') { ?>
                    <a href="../pages/PostQueries.php">Post Query</a>
                    <a href="../pages/ClassMaterials.php">Class Materials</a>
                    <a href="../pages/NoticeBoard.php">Notice Board</a>
                    <a href="../pages/Queries.php">My Queries</a>
                    <a style="float: right;" href="../../Controller/logout.php">Logout</a>
                    <a style="float: right;" href="Dashboard.php"><?php echo $_SESSION['Name'] ?></a>
                
                <?php }
                 else { ?>
                <a style="float: right;" href="../pages/StudentRegistration.php">Student Signup</a>&nbsp;
                <a style="float: right;" href="../pages/AdminRegistration.php">Admin Signup</a>&nbsp;
                <a style="float: right;" href="../pages/Login.php">Login</a>
            <?php }
            ?>
        </div>
    </div>
</body>

</html>