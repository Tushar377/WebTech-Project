<?php
include "../../model/DatabaseConnection.php";
$Name="";
$ValidName="";
$ValidEmail="";
$ValidUserName="";
$email="";
$validatepassword="";
$validateconfirmpassword="";
$validatecomment="";
$validateradio="";
$usertype="Seller";
$validatecheckbox="";
$v1=$v2=$v3="";
$validateemail="";
$Password="";
$validFile="";
$ValidAddress="";
$ValidPhone="";
$validateDate="";
$Date="";
$gender = "";
$Username="";
$ValidUser="";

$_Name="";
$_Username="";
$_Email="";
$_Password="";
$_Phone="";
$_Address="";
$_DOB="";
$_Gender="";
$_User_Type="";
$_File="";
$Error=false;
///

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    $Name=$_REQUEST["Name"]; 
    $email=$_REQUEST["Email"];
    $Phone=$_REQUEST["Phone"];
    $Address=$_REQUEST["Address"];
    $Date = $_REQUEST["Date"];
    $gender = $_REQUEST["gender"];

if(empty($Name) || strlen($Name)<4)
{
    $ValidName="Name Must contain 4 letter !!";
    $Error=true;
}

else 
     $_Name=$Name;
     
if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $ValidEmail="You Must Enter Valid Email";
    $Error=true;
}
else{
    $_Email=$email;
}


if(empty($Phone))
{
    $ValidPhone="Phone Must Required !!";
    $Error=true;
}
else if(!is_numeric($Phone ))
{
    $Error=true;
    $ValidPhone="Phone must be numeric number ";

}
else 
{
    $_Phone=$Phone;
}

if(empty($Date))
{
    $validateDate="Birth Date Required !!";
    $Error=true;
}
else 
{
    $_DOB=$Date;
}

if(empty($Address))
{
    $ValidAddress="Address information can not be empty !!";
    $Error=true;
}
else 
$_Address=$Address;


if(isset($_REQUEST["gender"]))
{
    #$validateradio= "Gender - ".$_REQUEST["gender"];
    $_Gender=$_REQUEST["gender"];
}
else{
    $validateradio= "Please Select Your Gender";
    $Error=true;
}

if($Error==false){
    if($_User_Type=='admin'){
        $validation="True"; 
    }
    else{
        $validation="False"; 
    }
    $connection=new DatabaseConnection();
    $conobj=$connection->OpenCon();
    $connection->UpdateUser($conobj,"users",$_SESSION["UserId"],$_Name,$_Email, $_Phone,$_Address,$_DOB,$_Gender);
    $connection->CloseCon($conobj);

    $_SESSION["Email"]=$_Email;
    $_SESSION['Name']= $_Name;

    header('Location: ../pages/Dashboard.php?msg=Profile Updated Successfully');
}
}
