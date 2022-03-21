<?php
session_start();

if(!isset($_SESSION['username']) && $_SESSION['is_login'] !=true ){
    $_SESSION['error']="Please login first";
    header("Location:index.php");
}
?>
<blockquote>
    <h1>Welcome : 
        <?=$_SESSION['username'] ?>
    </h1>
    <ul>
        <li>HTML</li>
        <li>Javascript</li>
        <li>PHP</li>
    </ul>
    <hr>
    <a href="logout.php">Logout</a>
</blockquote>