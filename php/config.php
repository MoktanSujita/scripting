<?php
$servername='localhost';
$username='root';
$password='';
$database='swastik';

define('BASE_URL','http://localhost/scripting/php');
try
{
    $conn=new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    die("connection failed:".$e->getMessage());
}
?> 