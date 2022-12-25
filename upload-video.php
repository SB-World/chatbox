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
if (isset($_POST['submit']))
{
    /*$file = $_FILES['file'];

    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];

    echo $fileName;*/
     $videoName = $_POST['file'];
    $sqlQuery = "INSERT INTO chatapp VALUES('','$row[name]','','$videoName')";
    mysqli_query($connect, $sqlQuery);
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
    <form action="upload-video.php" method="post" enctype="multipart/form-data">
        <input type="text" name="file" id="file">
        <button type="submit" name="submit" onclick="alertFile()">Upload</button>
    </form>
</body>
<!--script>
    function alertFile(){
        alert(document.getElementById('file').value);
    }
  
</script-->
</html>