<?php
require 'config.php';

$sql = "SELECT * FROM chatapp";
$results = mysqli_query($connect, $sql);
if(mysqli_num_rows($results) > 0) {
    while($row = mysqli_fetch_assoc($results))
    {
        echo "<img src=". $row["Images"] .">";
    }
}
?>