<?php
session_start();
$serverName="localhost";
$userName="root";
$password="";
$dbname="Labour2";

$db=mysqli_connect($serverName,$userName,$password,$dbname);

if(!$db)
{
    die("connection failed".mysqli_connect_error());
}
?>