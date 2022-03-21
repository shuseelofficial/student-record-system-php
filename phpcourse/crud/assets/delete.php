<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'phpcourse';
$connection = mysqli_connect($host, $username, $password, $dbName);

$id = $_GET['criteria'];
$query = "DELETE FROM students WHERE id =$id ";

$res = mysqli_query($connection, $query);

if($res){
    header(header:'Location:dashboard.php');
}else{

}
//redirection
session_start();

if(!isset($_SESSION['username']) && $_SESSION['is_login'] !=true ){
    $_SESSION['error']="Please login first";
    header("Location:../user/index.php");
}