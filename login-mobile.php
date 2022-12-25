<?php
require 'config.php';
if(!empty($_SESSION["id"]))
{
    header("Location: chatbox.php");
}
if(isset($_POST["submitBtnn"]))
{
    $usernameemail = $_POST["userid"];
    $password = $_POST["pass"];
    $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$usernameemail' OR email = '$usernameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0)
    {
        if($password == $row["password"]){
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            header("Location: dashboard.php" ); 
        }
        else{
            echo 
            "<script> alert('Wrong Password'); </script>";
        }
    }
    else 
    {
        echo
        "<script> alert('User Account Not Found');</script>";
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
    <script src="https://kit.fontawesome.com/9f6ace1107.js"></script>
</head>
<body>
    <div class="wrapper">
        <i class="fas fa-lock"></i>
        <header>Login</header>
    <form action="login,.php" method="POST">
       <input type="text" name="userid" placeholder="Username" id="" required><br>
       <input type="password" name="pass" placeholder="Password" id="" required><br>
       <button type="submit" name="submitBtnn">Log In</button>
       <a href="register.php">Register</a>
    </form>
</div>
</body>
<style>
  
  *
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
body 
{
    background-color: #fff;
    align-items: center;
    justify-content: center;
    display: flex;
    min-height: 100vh;
}
.wrapper header 
{
    font-size: 2rem;
    font-family: Poppins;
}
.wrapper i 
{
    color: yellowgreen;
    font-size: 20px;
}
.wrapper form button 
{
    height: 1cm;
    width: 3.5cm;
    position: absolute;
    top: 89%;
    left: 50%;
    transform: translate(-50%,-50%);
    background: #123;
    border: none;
    border-radius: 7px;
    color: #fff;
    cursor: pointer;
}
.wrapper form button:hover 
{
    opacity: 0.8;
}
.wrapper
{
    height: 20cm;
    width: 15cm;
    border-radius: 12px;
    box-shadow: 0px 2px 3px 5px rgba(0,0,0,0.1);
    align-items: center;
    justify-content: center;
    display: flex;
    flex-wrap: wrap;
    flex-direction: column;
    gap: 20px;
}
.wrapper input 
{
    height: 1cm;
    width: 80%;
    border-radius: 8px;
    border: 2px solid silver;
    outline: none;
    margin: 20px;
    font-family: Open Sans;
    font-size: 16px;
}
.wrapper input:focus 
{
    border: 2px solid dodgerblue;
}
.wrapper form 
{
    width: 100%;
    gap: 20px;
    padding-top: 20px;
}
a {
    position:absolute;
    top:100%;
    left: 50%;
    transform: translate(-50%,-50%);
}
button {
    position: absolute;
    top: 115%;
    left: 50%;
    transform: translate(-50%,-50%);
}

</style>
</html>