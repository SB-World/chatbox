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
/*$userPart = $_POST['userpart'];*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--link rel="stylesheet" href="designs.css"-->
    <script src="https://kit.fontawesome.com/9f6ace1107.js"></script>
</head>
<body>
    <div class="container">
    <div class="user-panel">
        <div class="heading"><h1><?php echo $row["name"]; ?></h1></div>
        <div class="list">
        <?php
        $sqlQuery = "SELECT username FROM users";
        $res = mysqli_query($connect, $sqlQuery);
        if(mysqli_num_rows($res) > 0)
        {
            while ($rows = mysqli_fetch_assoc($res))
            {
                echo "<form id='my_form' action='private-chat.php' method='POST'><input type='text' style='border:none; outline: none;
                 background:#fff; font-size:20px;' name='choice' id='choice' onclick='submit_form()' value='$rows[username]' readonly><button type='submit' name='submit_btn'>Submit</button>
                 </form>";
            }
        } 
        if(isset($_POST["submit_btn"]))
        {
            $input_field = $_POST["choice"];

           
        }
        ?>
        </div> 
    </div>
    <div class="message-panel">
        <h1> <?php echo $input_field; ?> </h1>
        <form action="private-chat.php" method="POST">
        <input id="user-name" value="<?php echo  $input_field; ?>" style="display:none;" name="user-name">
            <input type="text" name="message" id="">
            <button type="submit" name="submitBtn">Send</button>
        </form>
        <?php
        if(isset($_POST["submitBtn"]))
        {
            $input_fieldd = $_POST["user-name"];
            $message_p = $_POST["message"];
            $queryy = "INSERT INTO privatechats VALUES('$message_p','$row[name]','$input_fieldd');";
            mysqli_query($connect, $queryy);
        } 
        ?>
    </div>
    </div>
  
</body>
   <style>
     *{
         margin:0;
         padding:0;
         box-sizing:border-box;
     }
     body {
         min-height:100vh;
         min-width:100vw;
         background:#eee;
         align-items:center;
         justify-content:center;
         display:flex;
     }
     .container{
         height:16cm;
         width: 80%;
         background: #fff;
         box-shadow:0px 3px 4px 5px rgba(0,0,0,0.1);
         border-radius:50px;
     }
     .heading {
         height:2cm;
         width:50%;
        align-items:center;
        justify-content:center;
        display:flex;
        font-size:15px;
        font-family:Helvetica rounded;
     }
     .heading h1 {
         border-bottom:2px solid dodgerblue;
     }
     .list{
         display:grid;
         place-items:left;
         padding-left:20px;
         gap:50px;
         margin-top:50px;
     }
     .list input {
        font-size:23px;
         font-family:Sans-serif;
         font-weight:bolder;
         cursor:pointer;
     }
     .message-panel {
         height:16cm;
         width: 30%;
         background:#eee;
         position:absolute;
        top:50%;
        left:67%;
        border-radius:50px;
        transform:translate(-20%,-50%);
     }
     
   </style>
    <script>
    /*function submit_form(){
        var form = document.getElementById("my_form");
        form.submit();
    }*/


    </script>
</html>