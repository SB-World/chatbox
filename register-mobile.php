<?php
require 'config.php';
if(!empty($_SESSION["id"]))
{
    header("Location:dashboard.php");
}
if(isset($_POST["submit"]))
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmpass = $_POST["confirmpass"];
    $duplicate = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username' OR email = '$email'");
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo 
        "<script>alert('Username Or Email Already Taken') </script>";
    }
    else 
    {
        if($password == $confirmpass)
        {
            $query = "INSERT INTO users VALUES('','$name','$email','$username','$password')";
            mysqli_query($connect, $query);
            echo 
            "<script> alert('Registration Successful!') </script>";
            mail($email, 'noreply', 'Hello! Welcome To Public Chat Services! Please Verify Your Email Address. Your OTP -- 7568902318','From: samannoyb.20141216@gmail.com');
            header("Location: otpverification.php");
        }
        else 
        {
          echo 
            "<script> alert('Passwords Do Not Match') </script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mob-style-reg.css">
    <script src="https://kit.fontawesome.com/9f6ace1107.js"></script>
</head>
<body>
    <div class="wrapper">
        <i class="fas fa-lock"></i>
        <header>Register</header>
    <form action="register.php" method="POST">
        <input type="text" name="name" placeholder="Name" id="name" required><br>
        <input type="email" name="email" placeholder="Email" id="email" required><br>
        <input type="username" name="username" placeholder="Username" id="username" required><br>
        <input type="password" name="password" placeholder="Password" id="password" required><br>
        <input type="password" name="confirmpass" placeholder="Confirm Password" id="" required><br>
        <button type="submit" name="submit">Register User</button>
		<div class="g-signin2" data-onsuccess="onSignIn"></div>
</form>
<a href="login-mobile.php">Login</a>
 
    </div>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<meta name="google-signin-client_id" content="761211385525-pcq9ohcit9mfrk8nrf9gjv5b7va1cho7.apps.googleusercontent.com">
<script>
    function onSignIn(googleUser) 
    {
        var profile = googleUser.getBasicProfile();
        $("#name").val(profile.getName());
		$("#email").val(profile.getEmail());
    }
    </script>
    </body>
    </html>