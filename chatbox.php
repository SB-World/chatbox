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

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--link rel="stylesheet" href="designs.css"-->
    <script src="9f6ace1107.js"></script>
</head>
<body>
  
    <div class="container">
        <div class="header">
      
            <div class="popup-box">
            <h1 id="profile-name"><?php echo $row["name"]; ?>  </h1>
            <header>Public Chat</header>
            </div>
        
        </div>
        <div class="message-panel">
        
                  <?php if(isset($_POST['sendBtn']))
{

    $message = $_POST["message"];
    
    

    if($message != "")
    {
        $query = "INSERT INTO chatapp VALUES('$message','$row[name]','','')";
        mysqli_query($connect, $query);
    }
    else 
    {
       echo 
        "<script> alert('Message Cannot Be Empty'); </script>";
    }
     
} 
if(isset($_POST['add']))
{
    header("Location: upload-image.php");

 
}
if(isset($_POST['addVid']))
{
    header("Location: upload-video.php");
}
$sql = "SELECT * FROM chatapp";
$resulte = mysqli_query($connect, $sql);
if(mysqli_num_rows($resulte) > 0)
{
    while($rows = mysqli_fetch_assoc($resulte))
    {
        if (($row["name"] == $rows["Usern"]) && ($rows["Videos"] == ""))
        {
            echo "<div style='padding-left: 1100px;'> <h1 style='font-family: sans-serif; overflow:hidden; overflow-x: scroll; padding-right: 50px; font-size: 16px; background: dodgerblue;'>". $rows["Usern"] ."<br><span style='font-size: 20px; font-family: Poppins'>". $rows["Message"] ."</span></h1> <br><img src=". $rows["Images"] ."></div>";
        }
        else if (($row["name"] == $rows["Usern"]) && ($rows["Videos"] != ""))
        {
            echo "<div> <h1 style='font-family: sans-serif; font-size: 16px; overflow:hidden; overflow-x: scroll;'>". $rows["Usern"] ."<br><span style='font-size: 20px; font-family: Poppins'>". $rows["Message"] ."</span></h1><video src=". $rows["Videos"] ." controls type='video/mp4'></video></div>";
        }
        else if (($row["name"] != $rows["Usern"]) && ($rows["Videos"] != "")){
            echo "<div> <h1 style='font-family: sans-serif; font-size: 16px; overflow:hidden; overflow-x: scroll;'>". $rows["Usern"] ."<br><span style='font-size: 20px; font-family: Poppins'>". $rows["Message"] ."</span></h1> <br> <img src=". $rows["Images"] ."> <br> <video src=". $rows["Videos"] ." controls type='video/mp4'></video></div>";

        }
        else if (($row["name"] != $rows["Usern"]) && ($rows["Videos"] == ""))
        {
            echo "<div> <h1 style='font-family: sans-serif; font-size: 16px; overflow:hidden; overflow-x: scroll;'>". $rows["Usern"] ."<br><span style='font-size: 20px; font-family: Poppins'>". $rows["Message"] ."</span></h1> <br> <img src=". $rows["Images"] ."> </div>";
        }
    }
}




?>
       
</div>

        <div class="send-input">
            <form action="chatbox.php" method="post">
           
            <input type="text" name="message" id="mess">
           <button type="submit" id="submit" name="sendBtn">Send Message</button>
            
            </form> 
            <form action="chatbox.php" method="post">
                <button type="submit" name="add" ><i class="fas fa-plus"></i>Photo</button>
            </form>
            
                <button type="submit" name="addVid" onclick="alert('We are working on this page yet!');"><i class="fas fa-plus"></i>Video</button>
            <!--form action="chatbox.php" method="post">
                <button type="submit" name="addVid"><i class="fas fa-plus"></i>Video</button>    
            </form-->
         
        </div>
    </div>
    
</body>
<style>
    *{
    margin:0;
    padding:0;
    box-sizing:border-box;
}
body
{
    background:#fff;
   user-select:none;
}
.container
{
    height:100vh;
    width:100vw;
    background:#fff;
}
.header
{
    height:2cm;
    width: 100%;
    background:#123;
    box-shadow:0px 2px 3px 4px rgba(0,0,0,1);
}
.header h1 
{
    float: right;
    padding-top: 20px;
    padding-right: 50px;
    color: #fff;
    font-size: 20px;
    font-family: Poppins;
}
.header header 
{
    text-align: center;
    color: #fff;
    padding-top:20px;
    font-size: 40px;
    font-family: Open Sans;
}
.send-input 
{
    height: 2cm;
    width: 100%;
    box-shadow: 0px 2px 3px 4px rgba(0,0,0,0.1);
    position: absolute;
    top: 100%;
    left: 0;
    transform: translateY(-100%);
    align-items: center;
    justify-content: center;
    display: flex;
    gap: 40px;
}

.send-input input[type=text]
{
    height: 1cm;
    border-radius: 50px;
    border: 1px solid silver;
    width:50%;
    outline: none;
    font-size: 18px;
    font-family: Open Sans;
    padding-left: 15px;
}
.send-input input[type=text]:focus
{
    border: 1px solid dodgerblue;
}
.send-input button 
{
    height: 1cm;
    width: 3.5cm;
    background-color: #123;
    border: none;
    border-radius: 12px;
    color: #fff;
    font-size: 12px;
    font-family: sans-serif;
    cursor: pointer;
}
.send-input button:hover 
{
    opacity: 0.7;
}
.message-panel 
{
    height:80%;
    width: 100%;
    background-color: #fff;
    overflow: hidden;
    position: absolute;
    top: 2cm;
    left: 0;
    bottom: 2cm;
    overflow-y: scroll;
    padding-left: 100px;
    padding-right: 100px;
    padding-top: 50px;
    gap: 20px;
}
.message-panel 
h1 {
    height: auto;
    overflow-y: scroll;
    width: 7cm;
    overflow-x: scroll;
    padding-left: 20px;
    overflow:ellipsis;
    overflow:hidden;
    background: #123;
   margin: 2px;
   font-size: 22px;
   color: #fff;
   border-radius: 20px;
  
}
.message-panel 
h1::-webkit-scrollbar {
   width:5cm;
}
.rival-message
{
    float: left;
    font-size: 25px;
    height: auto;
    width: auto;
    background: dodgerblue;
    color: #fff;
    font-family: Open Sans;
}
/*form i{
    cursor: pointer;
    transition: 0.5s;
}
form i:hover {
    height: 1cm;
    width: 1cm;
    border-radius: 50%;
    background: #1b1b1b;
    color: #fff;
    justify-content:center;
    align-items:center;
    display:flex;
}*/

</style>
<!--script src="https://cdn.jsdelivr.net/npm/emoji-button@latest/dist/index.min.js">

</script-->
<script>
    alert('Pro-TIP: Some Messages Are Too Long, And Sometimes They Are Hidden. Click on the message and press the Arrow Left Or Arrow Right Keys To View The Full Message. Have A Good Time On Realtime! uwu');
    /*var input = document.querySelector("#mess");
    var picker = new EmojiButton ({
        position: 'right-start'
    })

    picker.on('emoji',function(emoji){
        input.value += emoji;
    })

    input.addEventListener('click', function(){
        picker.pickerVisible
    })*/
</script>
</html>