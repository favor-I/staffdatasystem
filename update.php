<?php
include_once "./db_conn.php";
$id = "";
$fname = "";
$email = "";
$n_o_k = "";
$position = "";
$error = "";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

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

$query = "UPDATE `full_staff_data` SET staff_id = '$id', full_name = '$fname', email = '$email', next_of_kin = '$n_o_k', position = '$position' WHERE staff_id = '$id'";

if ($conn->query($query) === TRUE) {
    echo "<script> alert('New record Updated Successfully!')</script>";
    header("refresh:0; url=http://localhost/staffdatasystem");
} else {
    // echo "<script> alert('New record not stored. Error !!!')</script>";
    echo $conn->error;
}

?>