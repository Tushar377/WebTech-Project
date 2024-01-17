<?php
include "../../model/DatabaseConnection.php";
$Name="";
$ValidName="";
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
    
    $Name=$_REQUEST["name"]; 
    $email=$_REQUEST["email"]; 
    $Password=$_REQUEST["password"];
    $ConfirmPassword=$_REQUEST["confirmpassword"];
    $Phone=$_REQUEST["phone"];
    $Address=$_REQUEST["address"];
    $Username=$_REQUEST["Username"];
    $Date = $_REQUEST["birthday"];
    $usertype = $_REQUEST["user_type"];

if(empty($Name) || strlen($Name)<4)
{
    $ValidName="Name Must contain 4 letter !!";
    $Error=true;
}

else 
     $_Name=$Name;


     if(empty($Username) || strlen($Username)<6)
     {
         $ValidUser="Name Must contain 6 letter !!";
         $Error=true;
     }
     
     else 
          $_Username=$Username;
     
     
if(empty($email) || !preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix",$email))
{
    $validateemail="You Must Enter Valid Email";
    $Error=true;
}
else{
    $_Email=$email;
}

$p=0;
if(strlen($Password)<8 || empty($Password))
{
    $validatepassword="Password Must Contain 8 character!!";
    $Error=true;
}
else if (!preg_match("/[@,#,$,%]/",$Password)) {
    $validatepassword = "Password must contain at least one of the special characters (@, #, $,%)";
    $Error=true;
}
else{
    $_Password=$Password;
    $p=1;
}

if(empty($ConfirmPassword))
{
    $validateconfirmpassword="Confirm Password Cannot be empty !!!";
    $Error=true;
}

else if($ConfirmPassword != $Password)
{
    $validateconfirmpassword="Password and Confirm Password must match!!";
    $Error=true;
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

if(isset($_REQUEST["user_type"]))
{
    #$validateradio= "Gender - ".$_REQUEST["gender"];
    $_User_Type=$_REQUEST["user_type"];
}


$target_File="../../File/".$_FILES["fileupload"]["name"];
if($target_File=="../../File/")
    {
    $target_File="../../File/default_pic.png";
    }
if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_File))
{
    echo "You have uploadede a new file";
}
else 
{
    $validFile= "Sorry ,You must upload a file to continue";
}
if(!$Error){
    if($_User_Type=='admin'){
        $validation="True"; 
    }
    else{
        $validation="False"; 
    }
    $connection=new DatabaseConnection();
    $conobj=$connection->OpenCon();
    $connection->InsertData($conobj,"users",$_Name,$_Email,$_Username,$_Password,$_Phone,$_Address,$_DOB,$_Gender,$_User_Type, $target_File, $validation);
    $connection->CloseCon($conobj);

    header('Location: ../pages/Login.php');
}
}
