<?php
session_start();

if(session_destroy()) // Destroying All Sessions
{
header("Location: ../View/pages/login.php"); // Redirecting To Home Page
}
?>