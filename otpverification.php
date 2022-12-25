<?php
if(isset($_POST["submitBtnnn"]))
{
    $otp = '7568902318';
    $otp_field = $_POST["otp_field"];
    if($otp_field == $otp){
        header("Location: dashboard.php");
    } 
    else {
        echo 
        "<script> alert('Wrong OTP Entered'); </script>";
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
</head>
<body>
    <form action="otpverification.php" method="post">
        <input type="number" name="otp_field" id="">
        <button type="submit" name="submitBtnnn">Send OTP</button>
    </form>
</body>
</html>