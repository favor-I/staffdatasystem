<?php
include_once "./db_conn.php";
$id = "";
$fname = "";
$email = "";
$mobile = "";
$n_o_k = "";
$dob = "";
$position = "";
$depart = "";
$error = "";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

if(isset($_POST["submit"]))  {
  // print_r($_POST);
  // die();
  if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["tel_num"]) || empty($_POST["nok"]) || empty($_POST["dob"]) || empty($_POST["position"]) || empty($_POST["department"]) ) {
    $error = "<label class='text-danger'>All fields are required!</label>";
  } else if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["tel_num"]) && isset($_POST["nok"]) && isset($_POST["dob"]) && isset($_POST["position"]) && isset($_POST["department"])  ){
    $fname = $_POST["name"];
    $email = $_POST["mail"];
    $mobile = $_POST["tel_num"];
    $n_o_k = $_POST["nok"];
    $dob = $_POST["dob"];
    $position = $_POST["position"];
    $department_id = $_POST["department"];
    // echo($department_id);
    // die();
  }
}

$query = "UPDATE `full_staff_data` SET staff_id = '$id', full_name = '$fname', email = '$email', mobile = '$mobile' , n_o_k = '$n_o_k', d_o_b = '$dob' ,position = '$position', departments_id ='$department_id' WHERE staff_id = '$id'";
$result = $conn->query($query);
if ($result === TRUE) {
    echo "<script> alert('New record Updated Successfully!')</script>";
    header("refresh:0; url=http://localhost/staffdatasystem/employees.php");
} else {
    // echo "<script> alert('New record not stored. Error !!!')</script>";
    echo $conn->error;
}

?>