<?php 
include_once "./db_conn.php";
$id = "";

if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

$delete = "DELETE FROM full_staff_data WHERE `full_staff_data`.`staff_id` = $id";
$delete1 = "DELETE FROM departments WHERE `departments`.`department_id` = $id";
$result = $conn->query($delete);
$result1 = $conn->query($delete1);

if($result && $result1 === TRUE) {
    echo ("<script>alert('Record deleted successfully')</script>");
    header("refresh:0; url=http://localhost/staffdatasystem/employees.php");
} else {
    echo ("<script>alert('Error deleting record!')</script>");
}
?>