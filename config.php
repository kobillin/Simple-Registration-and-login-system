<?php 

$dbServername ="localhost";
$dbUsername ="root";
$dbPassword ="";
$dbName ="atecsco";

 $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


 if (!$conn) {
    echo "Error: Unable to connect to MySQL.".mysqli_connect_error();
    exit;
 }

 // echo "Success: A proper connection to MySQL was made!";

?>
