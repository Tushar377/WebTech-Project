<?php
class DatabaseConnection{
 
function OpenCon()
{
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "smartschooldb";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
}
 function CheckUser($conn,$table,$username,$password,$True)
 {
   $result = $conn->query("SELECT * FROM ". $table." WHERE Username='". $username."' AND Password='". $password."' AND Validation like '". $True ."'" );
  
   if($result-> num_rows > 0)
  {
      echo "Log in Done";
  }
  else
  {
      echo "Log in failed "; 
  }
  
   return $result;
 }

 function InsertData($conn,$table,$Name,$email,$username,$Password,$Phone,$Address,$Date,$validateradio,$validcheckbox,$target_File,$validation)
 {
     $stmt = $conn-> prepare("INSERT INTO $table (Name, Email, Username, Password, Phone, Address, DOB, Gender,User_Type, File_Path,Validation) VALUES (?,?,?,?,?,?,?,?,?,?,?)"); 
     $stmt -> bind_param("sssssssssss",$Name,$email,$username,$Password,$Phone,$Address,$Date,$validateradio,$validcheckbox,$target_File,$validation); 
    
     if($stmt->execute())
    {
        echo "User Data Saved In Database"; 
    }
    else
    {
        echo "Already Account/Username exist <br>" ; 
        echo $stmt->error; 
    }
     $stmt->Close(); 
     
 }

 function ShowProductData($conn,$table,$id)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE P_ID='". $id."'");
    return $result;
}


function CheckValidation($conn,$table,$User,$Password)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE Username='". $User."' AND Password='". $Password."'");
    return $result;
}





function ShowData2($conn,$table,$Pname)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE P_Name like '%". $Pname."%' ");
    return $result;
    
}



function AddProduct($conn,$table,$pname,$pdesc,$pcate,$pprice,$pimage)
{
$result = $conn->query("INSERT INTO $table VALUES('','$pname','$pdesc','$pcate',$pprice,'$pimage')");
return $result;
}

 function ShowAll($conn,$table)
 {
  $result = $conn->query("SELECT * FROM  $table");
  return $result;
 }
 
 function UpdateProduct($conn,$table,$pid,$pname,$pdesc,$pcate,$pprice,$pimage)
 {
     $sql = "UPDATE $table SET P_Name='$pname', P_Desc='$pdesc',P_Cate='$pcate',P_Price='$pprice',P_image='$pimage' WHERE P_ID='$pid'";
     if ($conn->query($sql) === TRUE) {

        $result= TRUE;
    } 
    else {
        $result= FALSE ;

    }
    return  $result;
 }

 function deleteUser($conn,$table,$id)
 {
     $sql="Delete from $table WHERE id = '".$id."'"; 
    if ($conn->query($sql) === TRUE) {

        return TRUE;
    } 
    else {
        return FALSE;

    }
 }

 
function ShowUsersData($conn,$table)
{
    $result = $conn->query("SELECT `id`, `Name`, `Email`, `Username`, `Phone`, `Address`, `DOB`, `Gender`, `File_Path`, `Validation`, `User_Type` FROM ". $table." WHERE User_Type!='admin'");
    return $result;
}
function ShowSpecificUsers($conn,$table,$usertype)
{
    $result = $conn->query("SELECT `id`, `Name`, `Email`, `Username`, `Phone`, `Address`, `DOB`, `Gender`, `File_Path` FROM ". $table." WHERE User_Type='".$usertype."'");
    return $result;
}
function ClassMaterials($conn,$table)
{
    $result = $conn->query("SELECT * FROM ". $table);
    return $result;
}
function getUserData($conn,$table,$id)
{
    $result = $conn->query("SELECT `id`, `Name`, `Email`, `Username`, `Phone`, `Address`, `DOB`, `Gender`, `File_Path`, `Validation`, `User_Type` FROM ". $table." WHERE id=".$id);
    return $result;
}

function ApproveRejectUser($conn,$table,$id,$validation)
{
    $sql = "UPDATE $table SET Validation='".$validation."' WHERE id=".$id;
    if ($conn->query($sql) === TRUE) {

       $result= TRUE;
   } 
   else {
       $result= FALSE;

   }
   return  $result;
}

function UpdateUser($conn,$table,$id,$Name,$Email,$Phone,$Address,$DOB,$Gender)
 {
     $sql = "UPDATE $table SET Name='$Name', Email='$Email',Phone='$Phone',Address='$Address',DOB='$DOB',Gender='$Gender' WHERE id='$id'";
     if ($conn->query($sql) === TRUE) {

        $result= TRUE;
    } 
    else {
        $result= FALSE ;

    }
    return  $result;
 }

 function PostQuery($conn,$table,$sub,$desc,$date,$uid)
    {
    $result = $conn->query("INSERT INTO $table VALUES('','$sub','$desc',null,'$date',$uid)");
    return $result;
    }
function GetQueries($conn,$table,$uid)
{   
    $result = $conn->query("SELECT * FROM ".$table." WHERE UserID=".$uid);
    return $result;
}
function getQuery($conn,$table,$id)
{
    $result = $conn->query("SELECT * FROM ". $table." WHERE id=".$id);
    return $result;
}
function UpdateQuery($conn,$table,$sub,$desc,$date,$qid)
 {
     $sql = "UPDATE $table SET Subject='$sub', Description	='$desc',Date='$date' WHERE id='$qid'";
     if ($conn->query($sql) === TRUE) {

        $result= TRUE;
    } 
    else {
        $result= FALSE ;

    }
    return  $result;
 }

function CloseCon($conn)
 {
 $conn -> close();
 }
}
