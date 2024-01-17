<!DOCTYPE html>
<html>

<body>
  <?php
  session_start();
  include('../layout/Header.php');
  include "../../model/DatabaseConnection.php";
  if (empty($_SESSION["Email"])) {
    header("Location: ./Login.php"); // Redirecting To Login Page
  }

  ?>
  <?php
  $User = "";
  $radio1 = $radio2 = $radio3 = "";
  $Name = $Email = $User = $Phone = $Address = $Date = $Gender= $img= "";
  $connection = new DatabaseConnection();
  $conobj = $connection->OpenCon();
  if(!empty($_GET["id"])){
  $userQuery = $connection->getUserData($conobj, "users", $_GET["id"]);
  

  if ($userQuery->num_rows > 0) {

    // output data of each row
    while ($row = $userQuery->fetch_assoc()) {
      $Name = $row["Name"];
      $Email = $row["Email"];

      $User = $row["Username"];
      $Phone = $row["Phone"];
      $Address = $row["Address"];
      $Date = $row["DOB"];
      $Gender = $row["Gender"];
      $img = $row["File_Path"];
    }
  } else {
  }
}
  ?>
  <fieldset>

<legend>Profile Information</legend>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
<?php if(!empty($img)){ ?>
  <center><div class="class1"><img src="<?php echo $img ?>" class='img_class'></div></center>
  <?php } ?>
  <table>
    
    <tr>
      <td>Email: </td>
      <td><?php echo $Email; ?></td>
    </tr>

    <tr>
      <td>Name: </td>
      <td><?php echo $Name; ?></td>
    </tr>

    <tr>
      <td>Username: </td>
      <td><?php echo $User; ?></td>
    </tr>

    <tr>
      <td>Phone:</td>
      <td><?php echo $Phone; ?></td>
    </tr>

    <tr>
      <td>Address: </td>
      <td><?php echo $Address; ?></td>
    </tr>

    <tr>
      <td>Date of Birth: </td>
      <td><?php echo $Date; ?></span>
    </td>
    </tr>

    <tr>
      <td> Gender:</td>
      <td>
      <?php echo $Gender; ?>
      </td>
    </tr>
  </table>

</form>

</div>
</fieldset>
  <br>
  <?php
  include('../layout/Footer.php');
  ?>
</body>

</html>