<?php
session_start();

if(!empty($_POST)){
    $username=$_POST['username'];
    $password=$_POST['password'];
    if($username==='admin' && $password==='admin'){
        $_SESSION['username']=$username;
        $_SESSION['is_login']=true;
        header("Location:../crud/index.php");

    }else{
        $_SESSION['error']="Invlid username and password";
        header('Location:index.php');
    }

}else{
    $_SESSION['error']="Invalid Access";
    header('Location:index.php');
}

?>