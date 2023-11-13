<?php
if( isset($_GET["id"]) ){
    $id = $_GET["id"];
    $servername ="localhost";
    $username = "root";
    $password = "";
    $database="social";
    // creating Connection
$connection=mysqli_connect($servername, $username, $password, $database);

$sql = "DELETE FROM posts WHERE id=$id";
$connection->query($sql);
}
header("location: ../16.php");
exit;
?>