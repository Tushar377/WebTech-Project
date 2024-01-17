<?php
include "../../model/DatabaseConnection.php";
session_start(); 
$Name="";
$email="";
$Password="";
$validatepassword=$LoginError="";
$validateemail="";
$_Email="";
$_Password="";
$Error=false;
$count=0;
$login_Error=true;
$Photo="";
$loginInfo="";


if(isset($_POST["Login"]))	{

$user=$_REQUEST["username"]; 
$Password=$_REQUEST["password"];


if(empty($user))
{
    $Error=true;
    $validateemail="* You Enter Your Username";
}



if(strlen($Password)<6 || empty($Password))
{
    $Error=true;
    $validatepassword="* You Enter Your Password ";
}
else
{
    $_Password=$Password;
}


if($Error==false)
{
    $validation="True"; 
    $connection=new DatabaseConnection();
    $conobj=$connection->OpenCon();

    $result=$connection->CheckValidation($conobj,"users",$user,$Password);
    if ($result->num_rows > 0)
    {
        while($row = $result->fetch_assoc())
        {
            $validation=$row["Validation"];
            if($validation=="False")
            {
                    $LoginError="Wait for Admin Approval";
            }
            else{
                $_SESSION["UserId"]=$row["id"];
                $_SESSION["Email"]=$row["Email"];
                $_SESSION['Name']= $row["Name"];
                $_SESSION["Username"]=$row["Username"]; 
                $_SESSION["User_Type"]=$row["User_Type"]; 
                $_SESSION["Image"]=$row["File_Path"]; 
                header('Location: ../Dashboard.php');
            }
        }

    }
    else{
        $LoginError="Username Or Password Dosn't Match";
    }
    $connection->CloseCon($conobj);
}

}

?>