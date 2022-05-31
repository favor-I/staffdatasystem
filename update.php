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
  if(empty($_POST["name"]) || empty($_POST["mail"]) || empty($_POST["tel_num"]) || empty($_POST["nok"]) || empty($_POST["dob"]) || empty($_POST["position"]) || empty($_POST["department"]) ) {
    $error = "<label class='text-danger'>All fields are required!</label>";
  }
  
  if(isset($_POST["name"]) && isset($_POST["mail"]) && isset($_POST["tel_num"]) && isset($_POST["nok"]) && isset($_POST["dob"]) && isset($_POST["position"]) && isset($_POST["department"])  ){
    $fname = $_POST["name"];
    $email = $_POST["mail"];
    $mobile = $_POST["tel_num"];
    $n_o_k = $_POST["nok"];
    $dob = $_POST["dob"];
    $position = $_POST["position"];
    $department_id = $_POST["department"];
    $update_time = date('Y-m-d H:i:s');
    
  }
}
$query = "UPDATE `staff` SET staff_id = '$id', full_name = '$fname', email = '$email', mobile = '$mobile' , n_o_k = '$n_o_k', date_of_birth = '$dob' ,position = '$position', departments_id ='$department_id', updated_at = '$update_time' WHERE staff_id = '$id'";
$result = $conn->query($query);
if ($result === TRUE) {
    echo "<script> alert('New record Updated Successfully!')</script>";
    header("refresh:0; url=http://localhost/staffdatasystem/employees.php");
} else {
    echo $conn->error;
}


$conn->close();
?>