<?php include "../../Controller/RegistrationController.php"; ?>
<!DOCTYPE html>
<html>

<head>

    <title>Registration Form </title>
</head>

<body>
    <?php
    include('../layout/Header.php');
    ?>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <tr>
            <td>
                <fieldset>
                    <legend>Admin Sign Up</legend>
                    <table>
                        <font color="red"> *Required
                            <div>
                                <tr>
                                    <td>Name* : </td>
                                    <td><input type="text" id="name" placeholder="Enter your Name" name="name">
                                        <span style="color: #FF0000" id="nameErr"><?php echo $ValidName; ?></span>
                                    </td>
                                    <!-- <td><p id="errorname"></p></td> -->
                                </tr>


                                <tr>
                                    <td> Email* : </td>
                                    <td><input type="text" id="email" placeholder="Enter Email" name="email">
                                        <span style="color: #FF0000" id="emailErr"><?php echo $validateemail; ?></span>
                                    </td>
                                    <td>
                                        <p id="erroremail"></p>
                                    </td>
                                </tr>

                                <tr>
                                    <td> Username* : </td>
                                    <td><input type="text" id="Username" placeholder="Set Your Username" name="Username">
                                        <span style="color: #FF0000" id="UsernameErr"><?php echo $ValidUser; ?></span>
                                    </td>
                                    <td>
                                        <p id="errorusername"></p>
                                </tr>



                                <tr>
                                    <td>Password* : </td>
                                    <td><input type="password" placeholder="Enter Password" id="password" name="password">
                                        <span style="color: #FF0000" id="passwordErr"><?php echo $validatepassword; ?></span>
                                    </td>
                                    <td>
                                        <p id="errorpassword"></p>
                                </tr>


                                <tr>
                                    <td>Confirm Password* : </td>

                                    <td><input type="password" placeholder="Enter Confirm Password" id="confirmpassword" name="confirmpassword">
                                        <span style="color: #FF0000" id="confirmpassErr"><?php echo $validateconfirmpassword; ?></span>
                                    </td>
                                    <td>
                                        <p id="errorcpassword"></p>
                                </tr>


                                <tr>
                                    <td>Phone*: </td>
                                    <td> <input type="text" placeholder="Enter Phone Number" id="phone" name="phone">
                                        <span style="color: #FF0000" id="phoneErr"><?php echo $ValidPhone; ?></span>
                                    </td>
                                    <td>
                                        <p id="errorphone"></p>
                                </tr>

                                <tr>
                                    <td> Address*: </td>
                                    <td>
                                        <textarea style="background-color: #ffffff; color:black" rows="3" name="address" placeholder="Enter your address">

                                        </textarea>
                                        <span style="color: #FF0000" id="addressErr"><?php echo $ValidAddress; ?></span>
                                    </td>
                                <tr>

                                    <td>Date of Birth*</td>
                                    <td> <input type="date" id="birthday" name="birthday" onchange="dobValidate(this)" onblur="dobValidate(this)">
                                        <span style="color: #FF0000" id="birthdayErr"><?php echo $validateDate; ?></span>
                                    </td>

                                </tr>
                                <br><br>
                                <tr>
                                    <td> Gender *: </td>
                                    <td>
                                        <input type="radio" id="male" name="gender" value="Male"> <label for="male">Male</label>
                                        <input type="radio" id="female" name="gender" value="Female"> <label for="female">Female</label>
                                        <input type="radio" id="other" name="gender" value="Other"> <label for="other">Other</label> <br>
                                        <span style="color: #FF0000" id="genderErr"><?php echo $validateradio; ?></span>
                                    </td>
                                    <td>
                                        <p id="errorgen"></p>
                                    </td>
                                </tr>

                                <br>
                                <tr>
                                    <td><br> <label for="file ">Please Choose a Photo </label> </td>
                                    <td><input type="file" name="fileupload"></td>
                                </tr>

                                <input type="hidden" name="user_type" value="admin">
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