<?php
$hostname = "localhost";
$username = "root";
$password = "";
$db_name = "employee_data";

$conn = new mysqli($hostname, $username, $password,$db_name);
if($conn->connect_error) {
    echo "<string> alert('Connection failed !!!')</string>";
    echo $conn->connect_error;
}
?>