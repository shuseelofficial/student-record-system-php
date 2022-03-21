<?php

$host = 'localhost';
$username = 'root';
$password = '';
$dbName = 'phpcourse';
$connection = mysqli_connect($host, $username, $password, $dbName);

if(!$connection){
    echo("database not connected");
    die();
}
if(!empty($_POST)){
    $name=$_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $query="INSERT INTO students( name,address,phone) VALUES ('$name','$address','$phone')";
    $response=mysqli_query($connection, $query);
    if($response){
        header(header:'Location:index.php');
    }else{
        echo("There was a problem");
    }
}
/*
*select
*/
$sql = "SELECT  * FROM students";
$studentResponse = mysqli_query($connection, $sql);

// <!-- echo"<pre>";
// print_r(mysqli_fetch_all($pre)); -->
//login error and redirection code
session_start();

if(!isset($_SESSION['username']) && $_SESSION['is_login'] !=true ){
    $_SESSION['error']="Please login first";
    header("Location:../user/index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!--css-->
    <link rel="stylesheet" href="../css/style.css">
    
    <!--fontawesome-->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

</head>
<body>
    <div class="wrapper">
    <div class="nav-menu">
        <img src="../image/profile.png" alt="profile">
    <h1>Welcome : <br>
        <?=$_SESSION['username'] ?>
    </h1>
    <div class="navbar">
        <ul>
            <li><a href="../index.php"><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="calander.php" class="active"><i class="fa-solid fa-calendar"></i>Calendar</a></li>
            <li><a href="about.php"><i class="fa-solid fa-address-card"></i>About</a></li>
            <li><a href="../../user/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </div>
</div>

<!--write your code here-->
<div class="nepalicalander">
<div class="cal">
<iframe src="https://nepalicalendar.rat32.com/embed.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200%; height:680px; border-radius:5px;padding:0px;margin:0px;" allowtransparency="true"></iframe>
    </div>
    <div class="time">
    <iframe src="https://nepalicalendar.rat32.com/nepali-calendar/clockwidget/nepali-clock-widget-vertical-green.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:120px; height:265px;" allowtransparency="true"></iframe>
        </div>
    </div>



<!--start of footer-->
<footer>
    <p>
    &copy; Shuseel Maharjan 2022
    </p>
    
</footer>

<!--jquery-->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
</body>
</html>