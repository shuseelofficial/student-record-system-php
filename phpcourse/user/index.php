<?php
session_start();
//page redirection
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
        }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in and Sign Up</title>
    <!--css-->
    <link rel="stylesheet" href="css/style.css">
    <!--js-->
    
</head>
<body>
    <!--start of sign up-->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1><br>
			<span>or use your email for registration</span><br><br>
			<input type="text" placeholder="Name" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Password" />
			<button>Sign Up</button>
		</form>
	</div>
    <!--start of sign in-->
	<div class="form-container sign-in-container">
		<form action="validation.php" method="post">
            <h1>Sign in</h1> <br>
            <label for="username"> Username </label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password </label> 
            <input type="password" id="password" name="password" required> 
            <a href="#">Forgot your password?</a>
               <button>Login </button>
       </form>
	</div>
    <!--end of sign up-->
	<div class="overlay-container">
       
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		&copy; Shuseel Maharan 2022
	</p>
</footer>

<script src="js/script.js"></script>

<!-- start of mycode
    <blockquote>
        <h1>User Login</h1> -->
        <!-- <form action="validation.php" method="post">
             <label for="username">Username</label><br>
             <input type="text" id="username" name="username"> <br>
             <label for="password">Password</label> <br>
             <input type="password" id="password" name="password"> <br>
                <button>Login </button>
        </form> 
    </blockquote> 
    end of mycode -->
    
</body>
</html>