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
        header(header:'Location:dashboard.php');
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
            <li><a href="../index.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="dashboard.php" class="active"><i class="fa-solid fa-gauge"></i>Dashboard</a></li>
            <li><a href="calander.php"> <i class="fa-solid fa-calendar"></i>Calendar</a></li>
            <li><a href="about.php"><i class="fa-solid fa-address-card"></i>About</a></li>
            <li><a href="../../user/logout.php"><i class="fas fa-sign-out"></i>Logout</a></li>
        </ul>
    </div>
</div>
<div class="container">
    <div class="top-container">

        <h1>Students Record</h1>
        
    </div>
    <!--start of dashboard-->
    <section class="dashboard" id="dashboard">
        <form action="" method="post">
            <label for="name">Name :</label>
            <input type="text" name="name" id="name" placeholder="Full Name" required> 

            <label for="address">Address :</label>
            <input type="text" name="address" id="address" placeholder="Address" required> 

            <label for="phone">Phone :</label>
            <input type="number" name="phone" id="phone" placeholder="Phone" required> 

            <button>Add Record</button>
        </form>
        <hr>
       
        <table id="customers" width="100%" border="1">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($studentResponse as $key=> $student){ ?>
                <tr>
                    <td class="sn"><?= ++$key;?>. </td>
                    <td class="name"><?=$student['name'];?></td>
                    <td class="address"><?php echo $student['address'];?></td>
                    <td class="phone"><?php echo $student['phone'];?></td>
                    <td class="action">
                        <a href="update.php ? criteria=<?= $student['id']?> "><span class="edit">Edit</span></a>
                        <a href="delete.php ? criteria=<?= $student['id'] ?>" onclick="return confirm ('Are you sure.') "><span class="Delete">Delete</span></a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
               
    </section>
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