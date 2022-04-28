<?php
include_once "./db_conn.php";

$fname = "";
$email = "";
$n_o_k = "";
$position = "";
$error = "";


if(isset($_POST["submit"]))  
{
  if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["nok"]) || empty($_POST["position"]) ) {
    $error = "<label class='text-danger'>All fields are required!</label>";
  } else if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["nok"]) && isset($_POST["position"])){
    $fname = $_POST["name"];
    $email = $_POST["mail"];
    $n_o_k = $_POST["nok"];
    $position = $_POST["position"];
    // $department = $_POST["dept"];
  }
}




$query = "INSERT INTO full_staff_data ( full_name, email, next_of_kin, position) 
VALUES('$fname', '$email', '$n_o_k', '$position');";
// $query_y = "INSERT INTO department (department_name) VALUE ('$department')";
// $conn->query($query);
if ($conn->query($query) === TRUE) {
    echo "<script> alert('New record Stored Successfully!')</script>";
} else {
    echo "<script> alert('New record not stored. Error !!!')</script>";
    echo $conn->error;
}

$conn->close();
header("refresh:0; url=http://localhost/staffdatasystem?err={$GLOBALS['error']}");
?>