<?php
session_start();
if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/design.css">
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>
        <center><br>
            <span style="color:green;"><b><?php if (!empty($_GET['msg'])) echo $_GET['msg']; ?></b></span>
            <h2> Welcome <?php echo $_SESSION['User_Type'] ?></h2>
        </center>
    <fieldset>
        <legend>Profile Informatuion </legend>
        <?php
        $img = $_SESSION['Image'];

        $Cookie_name = $_SESSION['Email'];
        $Cookie_value = $_SESSION['Name'];


        $name = "User";
        $value = $_SESSION['Name'];

        if (!isset($_COOKIE[$name])) {
            setcookie($name, $value, time() + (200), "/");
        }

        ?>

        <div class="class1"><img src="<?php echo $img ?>" class='img_class'> <br><br></div>
        <div class="mydiv">
            <h3> Name : <?php echo $_SESSION['Name'] ?></h3>
            <h3> Email : <?php echo $_SESSION['Email'] ?></h3>
            <h3> Username : <?php echo $_SESSION['Username'] ?></h3>
            <?php
            if (!isset($_COOKIE[$name])) {
                echo "Welcome : " . $_SESSION['Name'];
            } else {
                echo "Good To See You Back : " . $_COOKIE["User"];
            }
            ?>
            <br><br><br>
            <a class='button' href='./EditProfile.php'>Edit Profile</a>
    </fieldset>

    <?php
    include('../layout/Footer.php');
    ?>
</body>

</html>