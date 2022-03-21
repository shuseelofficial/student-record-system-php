<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'phpcourse';
$connection = mysqli_connect($host, $username, $password, $dbName);

$id = $_GET['criteria'];
$query = "SELECT * FROM students WHERE id =$id ";

$response = mysqli_query($connection, $query);

$studentData = mysqli_fetch_assoc($response);


if(!empty($_POST)){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $query="UPDATE students SET name='$name', address='$address', phone='$phone' WHERE id=$id";
    $response = mysqli_query($connection, $query);
    if($response){
        header('Location:dashboard.php');
    }else{
        echo("There was a problem");
    }
}
//redirection
// session_start();

// if(!isset($_SESSION['username']) && $_SESSION['is_login'] !=true ){
//     $_SESSION['error']="Please login first";
//     header("Location:../user/index.php");
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <blockquote>
        <h1> Update Students Record</h1>
        <hr>
        <form action="" method="post">
            <label for="name">Name</label><br>
            <input type="text" name="name" id="name" value="<?= $studentData['name']?>" required> <br>

            <label for="address">Address</label><br>
            <input type="text" name="address" id="address" value="<?= $studentData['address']?>" required> <br>

            <label for="phone">Phone</label><br>
            <input type="number" name="phone" id="phone" value="<?= $studentData['phone']?>" required> <br> <br>

            <button>Update Record</button>
        </form>
        
    </blockquote>
</body>
</html>