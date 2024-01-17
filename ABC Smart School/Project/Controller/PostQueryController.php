<?php
include "../../model/DatabaseConnection.php";
$Subject="";
$ValidSubject="";
$Description="";
$ValidDescription="";

$_Subject="";
$_Description="";
$Error=false;
///

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    
    $Subject=$_REQUEST["Subject"]; 
    $Description=$_REQUEST["Description"];

if(empty($Subject) || strlen($Subject)<10)
{
    $ValidSubject="Subject Must contain minimum 10 letters !!";
    $Error=true;
}

else 
     $_Subject=$Subject;


if(empty($Description))
{
    $ValidDescription="Description can not be empty !!";
    $Error=true;
}
else 
$_Description=$Description;

if(!$Error){
    $connection=new DatabaseConnection();
    $conobj=$connection->OpenCon();
    $connection->PostQuery($conobj,"queries",$_Subject, $_Description, date("Y/m/d"),(int)$_SESSION["UserId"]);
    $connection->CloseCon($conobj);

    header('Location: ../pages/Dashboard.php?msg=Query Has Been Posted');
}
}
