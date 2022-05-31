<?php
include_once "./db_conn.php";
include_once "./all_functions.php";
$birthdays;

$current_time = time();
$thirty_days_timestamp = $current_time + (29*24*60*60);


$current_day = date("d");
$current_days_month = date("m");
$last_day_of_current_days_month = date("t");

$day_in_thirty_days = date("d", $thirty_days_timestamp);
$month_in_thirty_days = date("m", $thirty_days_timestamp);


if($current_days_month !== $month_in_thirty_days){
    $birthdays = "SELECT full_name,date_of_birth, day_of_birth, month_of_birth FROM staff 
    WHERE (day_of_birth BETWEEN $current_day AND $last_day_of_current_days_month AND month_of_birth = $current_days_month ) OR (day_of_birth BETWEEN 1 AND $day_in_thirty_days AND month_of_birth = $month_in_thirty_days)";
} else{
    $birthdays = "SELECT full_name,date_of_birth, day_of_birth, month_of_birth FROM staff 
    WHERE (day_of_birth BETWEEN $current_day AND $last_day_of_current_days_month OR day_of_birth BETWEEN 2 AND $day_in_thirty_days)  
    AND (month_of_birth = $current_days_month OR month_of_birth = $month_in_thirty_days);";

}

$staffNumQuery = ($conn->query("SELECT staff_id FROM staff"));
$department_num_query = ($conn->query("SELECT * FROM `department`"));
$staff_birthday_detail_query = $conn->query($birthdays);


$num_of_staff =  mysqli_num_rows($staffNumQuery);

$department_num = mysqli_num_rows($department_num_query);
$staff_birthday_detail = mysqli_fetch_all($staff_birthday_detail_query,MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Data System</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/index.css"/> 

</head>
<body>
    <nav>
        <div class="logo">
            <li><a href="http://localhost/staffdatasystem/">Staff DB</a></li>
        </div>
        <ul>
            <li><a href="http://localhost/staffdatasystem/">Dashboard</a></li>
            <li><a href="http://localhost/staffdatasystem/employees.php">Staff Info</a></li>
            <li><a href="http://localhost/staffdatasystem/departments.php">Departments</a></li>
        </ul>
    </nav>


    <section class="section">
        <h1>All Details</h1>
        <div class="birthday_card_row">
            <?php
                echo displayCard("Employee Info", $num_of_staff, "View Employees","http://localhost/staffdatasystem/employees.php"); 
                echo displayCard("Departments",$department_num, "View Departments","http://localhost/staffdatasystem/departments.php");        
            ?>
        </div>
    </section>
    <section class="section">
        <h2>Upcoming birthdays:</h2>
        <div class="birthday_cards_display">
            <?php 
                foreach($staff_birthday_detail as $key => $value){
                    $result_in_date_time = strtotime($value["date_of_birth"]);
                    $celebrants_dob = date("l-d-F", $result_in_date_time);
                    $celebrants_name = $value["full_name"];
                    echo displayBirtHdayInfo($celebrants_name,$celebrants_dob);
                }
            ?>
        </div>
    </section>
</body>
</html>