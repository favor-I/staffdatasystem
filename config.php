<?php
include_once "./db_conn.php";

$fname = "";
$email = "";
$n_o_k = "";
$position = "";
$error = "";


if(isset($_POST["submit"]))  
{
  if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["tel_num"]) || empty($_POST["nok"]) || empty($_POST["dob"]) || empty($_POST["dob"]) || empty($_POST["position"]) || empty($_POST["department"]) ) {
    $error = "<label class='text-danger'>All fields are required!</label>";
  } else if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["tel_num"]) && isset($_POST["nok"]) && isset($_POST["dob"]) &&  isset($_POST["position"]) && isset($_POST["department"]) ){
    $fname = $_POST["name"];
    $email = $_POST["mail"];
    $mobile = $_POST["tel_num"];
    $n_o_k = $_POST["nok"];
    $date_of_birth = $_POST["dob"];
    $dob_timestamp = strtotime($date_of_birth);
    $day = date("d", $dob_timestamp);
    $month = date("m", $dob_timestamp);
    $position = $_POST["position"];
    $department = $_POST["department"];
  }
}


$fullStaffQuery = "INSERT INTO staff ( full_name, email, mobile, n_o_k, date_of_birth, day_of_birth, month_of_birth, position, departments_id) 
VALUES('$fname', '$email', '$mobile', '$n_o_k', '$date_of_birth', '$day', '$month', '$position', '$department')";

$full_staff_query = $conn->query($fullStaffQuery);

if ($full_staff_query === TRUE) {
    echo "<script> alert('New record Stored Successfully!')</script>";
} else {
    echo "<script> alert('New record not stored. Error !!!')</script>";
    echo $conn->error;
}

$conn->close();
header("refresh:0; url=http://localhost/staffdatasystem/employees.php?err={$GLOBALS['error']}");
?>