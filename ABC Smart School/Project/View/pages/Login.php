<?php include "../../Controller/LoginController.php";

if (isset($_SESSION["Email"])) {

  header("location: ./Dashboard.php");
}
?>

<!DOCTYPE html>
<html>

<head>
  <title>Login Form </title>

</head>

<script>
</script>

<body>
<?php
include ('../layout/Header.php');
?>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <tr>
      <td>

        <div>
          <fieldset>
            <legend>Login</legend>

            <table>

              <font color="red"> *Required
                <div>
                  <tr>
                    <td><b> Usrename* : </td></b>
                    <td><input type="text" placeholder="Enter Username" id="username" name="username">
                      <span style="color: #FF0000" id="usernameErr"> <?php echo $validateemail; ?></span>
                    </td>
                    <td>
                      <p id="errorusername"></p>
                    </td>
                  </tr>

                  <tr>
                    <td><b>Password* : </td></b>
                    <td><input type="password" placeholder="Enter Password" id="password" name="password">
                      <span style="color: #FF0000" id="passwordErr"><?php echo $validatepassword; ?></span>
                    </td>
                    <td>
                      <p id="errorpasword"></p>
                    </td>
                  </tr>
                  <td>
                  <center><span style="color: #FF0000" id="passwordErr">
                    <?php echo $LoginError; ?></span></center>
                    <br>

                  </td>
                  <tr>
                    <td> <input type="submit" name="Login">
                      <input type="reset" name="Reset">
                    </td>
                </div>
        </div>
    </tr>
    </div>
    </table>

    </fieldset>

  </form>
  <?php
include ('../layout/Footer.php');
?>
</body>

</html>