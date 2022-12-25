<?php
if(isset($_POST["submitBtnnnn"]))
{
  $name = $_POST['name'];
  $message = $_POST['comments'];

  if(mail('samannoyb.20141216@gmail.com',$name,$message, 'From: samannoyb.20141216@gmail.com')){
    echo
    "<script> alert('Mail Sent Successfully');</script>";
  }
  else {
    echo
    "<script> alert('Mail Cannot Be Sent');</script>";
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
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <div class="container">
    <div class="header">
      <h1>Welcome To <br> Public Chat!</h1>
      <span>The best chatting services ever!</span>
</div>
      <div class="image">
         <img src="public chat.png" alt="" draggable="false">
      </div>
    <div class="buttons">
       <button id="login-btn">Login</button>
       <button id="reg-btn">Register</button>
    </div>
  </div>
  <div class="ourservices">
    <!--header>Our Services</header-->
    <div class="fast-service">
      <div class="box">
      <img src="public chat 2.jpg" alt="">
       <h1>Faster Service</h1>
      <p>
       Faster And More Accurate Service! Its working is very smooth , with lot of reliability and you can access it from anywhere!
      </p>
      </div>
    </div>
    <div class="public-yet-privste">
      <div class="box">
      <img src="public char 3.png" alt="">
      <h1>Public Yet Private?</h1>
      <p>
       Public Yet Private? What Nonsense! But SB Public Chat Turns NonSense Inot Real Sense! Enjoy full privacy for 24 hours, without any measures taken.
      </p>
      </div>
    </div>
  </div>
  <div class="contact-us">
    <h1>Drop Us A Mail!</h1>
    <form action="index.php" method="post">
      <input type="text" name="name" placeholder="Your Name" id=""><br>
      <textarea name="comments" placeholder="Message... " id="" cols="30" rows="10"></textarea><br>
      <button type="submit" name="submitBtnnnn">Send</button>
    </form>
  </div>
</body>
<script>
  const loginBtn = document.getElementById('login-btn');
  const regBtn = document.getElementById('reg-btn');
  loginBtn.addEventListener('click', () => {
    window.open('login,.php');
  })
  regBtn.addEventListener('click', () => {
    window.open('register.php');
  })
</script>
</html>