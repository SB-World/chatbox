<?php
require 'config.php';
if(!empty($_SESSION["id"])){
$id = $_SESSION["id"];
$result = mysqli_query($connect, "SELECT * FROM users WHERE id = $id");
$row = mysqli_fetch_assoc($result);
}
else {
header("Location: login,.php");
}	
if(isset($_POST['submitBtn'])){
    $userPart = $_POST['userpart'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="9f6ace1107.js"></script>
   
</head>
<body>
    <div class="menu">
       <div class="profile"><i class="fas fa-user"></i><h1><?php echo $row["name"]; ?></h1></div>
       <a href="#">Dashboard</a>
       <a href="settings.php">Settings</a>
       <a href="contactus.php">Contact Us</a>
       <a href="logout.php">Logout</a>
    </div>
    <div class="board">
        <div class="user-details">
            <div class="pro-embed">
                <i class="fas fa-user"></i> 
            </div>
            <h1><?php echo $row["name"]; ?> </h1>
        </div>
        <a class="public-chat-direct" href="chatbox.php">
        <i class="fas fa-comment-dots"></i>
        <span>Public Chat</span></a>
</div>
</div>
<!--div class="head1"><h1>Private Chats</h1></div>
<div class="private-chats">
    <?php
     /*$sqlQ = "SELECT username FROM users";
     $rss= mysqli_query($connect, $sqlQ);
     
     if(mysqli_num_rows($rss) > 0) {
         while ($rowss = mysqli_fetch_assoc($rss))
         {
              echo "<form action='private-chat.php' id='form' method='post'><input  type='text' value='$rowss[username]' readonly name='userpart'><button type='submit' name='submitBtn'>Start Chat</button></form>";
         }
     }*/
     
    ?>
</div-->

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
    min-height: 100vh;
    min-width: 100vw;
}
.menu 
{
    height: 100vh;
    width: 8cm;
    float: left;
    background: #123;
    display: grid;
    place-items: left;
    padding-left: 50px;
}
.menu a 
{
    text-decoration: none;
    color: #fff;
    font-family: Poppins;
    font-size: 17.5px;
}
.menu a:hover 
{
    height: 1.5cm;
    width: auto;
    background: rgba(255,255,255,0.05);
    border-radius: 50px;
    align-items: center;
    justify-content: center;
    display: flex;
}
.user-details 
{
    height: 2cm;
    width: 80%;
    box-shadow: 2px 4px 5px rgba(0,0,0,0.2);
    align-items: center;
    justify-content: center;
    display: flex;
    position:absolute;
    flex-wrap:wrap;
    flex-direction: row;
    top:0;
    left:300px;
}
.user-details h1 
{
    font-family: Poppins;
}
.pro-embed
{
    height: 0.8cm;
    width: 0.8cm;
    border-radius: 50%;
    background-color: yellowgreen;
    align-items:center;
    justify-content:center;
    display:flex;
    color:#fff;
    position: absolute;
    left: 20px;
}
.public-chat-direct
{
    height: 2cm;
    width: 80%;
    box-shadow: 2px 4px 5px rgba(0,0,0,0.2);
    align-items: center;
    justify-content: center;
    display: flex;
    position:absolute;
    flex-wrap:wrap;
    flex-direction: row;
    top:100px;
    left:300px;
}
.public-chat-direct i 
{
    left: 20px;
    position: absolute;
    color: skyblue;
    font-size:20px;
}
.public-chat-direct span
{
    font-family: Poppins;
    cursor: pointer;
    color: #000;
}
.menu .profile 
{
    align-items:left;
    display: flex;
    padding-top: 50px;
}
.profile i 
{
    font-size: 20px;
    color: #fff;
}
.profile h1 
{
    padding-left: 30px;
    font-family: Open Sans;
    color: #fff;
}
.close-acc{ 
    position: absolute;
    top: 50%;
    left: 40px;
    transform: translateY(-50%);
}
.private-chats {
    position: absolute;
    top: 50%;
    left:320px;
    transform:translateY(-50%);
    width: 100%;

}
.private-chats input {
    height: 2cm;
    width: 50%;
    background: rgba(255,255,255,0.05);
    box-shadow: 0 3px 5px 6px rgba(0,0,0,0.1);
    font-family: Helvetica Rounded;
    cursor:pointer;
    border: none;
    outline:none;
    font-size:20px;
}
.private-chats button 
{
    height: 2cm;
    width:3.5cm;
    background:#123;
    color: #fff;
    border:none;
    font-size:17px;
    border-radius: 15px;
    cursor:pointer;
}
.private-chats button:hover{
    opacity:0.7;
}
.head1 h1 {
    position:absolute;
    top: 28%;
    font-family:open sans;
    font-size: 2em;
    left:320px;
    transform: translateY(-35%);
}
</style>
</html>