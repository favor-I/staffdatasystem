<?php 
include_once "./db_conn.php";
$id = "";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

$delete = "DELETE FROM full_staff_data WHERE `full_staff_data`.`staff_id` = $id";
$result = $conn->query($delete);

if($result === TRUE) {
    echo ("<script>alert('Record deleted successfully')</script>");
    header("refresh:0; url=http://localhost/staffdatasystem");
} else {
    echo ("<script>alert('Error deleting record!')</script>");
}
?>