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
            <li><a href="../index.php" ><i class="fa-solid fa-house"></i>Home</a></li>
            <li><a href="dashboard.php"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="calander.php"><i class="fa-solid fa-calendar"></i>Calendar</a></li>
            <li><a href="about.php" class="active"><i class="fa-solid fa-address-card"></i>About</a></li>
            <li><a href="../../user/logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
        </ul>
    </div>
</div>

<!--write your code here-->

<div class="section">
		<div class="about">
			<div class="content-section">
				<div class="title">
					<h1>About Us</h1>
				</div>
				<div class="content">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat.</p>
					<div class="button">
						<a href="">Read More</a>
					</div>
				</div>
				<div class="social">
					<a href=""><i class="fab fa-facebook-f"></i></a>
					<a href=""><i class="fab fa-twitter"></i></a>
					<a href=""><i class="fab fa-instagram"></i></a>
				</div>
			</div>
			<div class="image-section">
				<img src="../image/img one.jpg">
			</div>
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