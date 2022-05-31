<?php
// require_once "./config.php";
$serverName = "localhost";
$username = "root";
$password = "";
$dbname = "employee_data";


$conn = new mysqli($serverName, $username, $password, $dbname);
//Check connection
if($conn->connect_error) {
  die("Connection failed !!!. {$conn->connect_error}");
}

$query = "CREATE TABLE staff(
  staff_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  mobile VARCHAR(15) NOT NULL,
  n_o_k VARCHAR(100) NOT NULL,
  d_o_b DATETIME NOT NULL,
  position VARCHAR(100) NOT NULL
)";
$query1 = "CREATE TABLE  departments(
  department_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  department VARCHAR(100) NOT NULL
)";
$fsdQuery = $conn->query($query);
$deptQuery = $conn->query($query1);
if( $fsdQuery && $deptQuery === True) {
  echo "<script>alert('Table created successfully!')</script>";
} else{
  echo "Error creating Table !!! {$conn->error}";
}
?>