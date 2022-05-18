<?php
include_once "./db_conn.php";

$fname = "";
$email = "";
$n_o_k = "";
$position = "";
$error = "";


if(isset($_POST["submit"]))  
{
  if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["tel_num"]) || empty($_POST["nok"]) || empty($_POST["dob"]) || empty($_POST["position"]) || empty($_POST["position"]) || empty($_POST["department"]) ) {
    $error = "<label class='text-danger'>All fields are required!</label>";
  } else if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["tel_num"]) && isset($_POST["nok"]) && isset($_POST["dob"]) && isset($_POST["department"]) && isset($_POST["position"]) && isset($_POST["department"]) ){
    $fname = $_POST["name"];
    $email = $_POST["mail"];
    $mobile = $_POST["tel_num"];
    $n_o_k = $_POST["nok"];
    $d_o_b = $_POST["dob"];
    $position = $_POST["position"];
    $department = $_POST["department"];
    // echo $department_id;
    // die();
  }
}


$fullStaffQuery = "INSERT INTO full_staff_data ( full_name, email, mobile, n_o_k, d_o_b, position, departments_id) 
VALUES('$fname', '$email', '$mobile', '$n_o_k', '$d_o_b', '$position', '$department')";
// $query1 = "INSERT INTO departments(id) VALUE('$department_id');";

$full_staff_query = $conn->query($fullStaffQuery);
// $deptQuery = $conn->query($query1);
if ($full_staff_query === TRUE) {
    echo "<script> alert('New record Stored Successfully!')</script>";
} else {
    echo "<script> alert('New record not stored. Error !!!')</script>";
    echo $conn->error;
}

$conn->close();
header("refresh:0; url=http://localhost/staffdatasystem/employees.php?err={$GLOBALS['error']}");
?>