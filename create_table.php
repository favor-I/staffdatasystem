<?php
// require_once "./config.php";
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "employee_data";


//Establish connection to db
// $conn = new mysqli($serverName, $username, $password);
//Establishing connection after database wis created
$conn = new mysqli($serverName, $username, $password, $dbname);
//Check connection
if($conn->connect_error) {
  die("Connection failed !!!. {$conn->connect_error}");
}

//Define query
// $sql = "CREATE DATABASE $dbname";
$sql = "CREATE TABLE full_staff_data(
  staff_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  next_of_kin VARCHAR(100) NOT NULL,
  position VARCHAR(100) NOT NULL
)";
if($conn->query($sql) === True) {
  // echo "Database created successfully!";
  echo "Table created successfully!";
} else{
  // echo "Error creating database {$conn->error}";
  echo "Error creating Table !!! {$conn->error}";
}
?>