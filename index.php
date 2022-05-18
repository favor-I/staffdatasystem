<?php
include_once "./db_conn.php";
// Function to get all the dates in given range
function getDatesFromRange($start, $end, $format = 'd-m') {  
    // Declare an empty array
    $array = array(); 
    // Variable that store the date interval
    // of period 1 day
    $interval = new DateInterval('P1D');
  
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
  
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    // Use loop to store date into array
    foreach($period as $date) {                 
        $array[] = $date->format($format);
    }
    // Return the array elements
    return $array;
}

$current_time = time();
$thirty_days_time = $current_time + (29*24*60*60);

$present_day_date = date("Y-m-d");
$date_in_thirty_days = date("Y-m-d", $thirty_days_time);



// Function call with passing the start date and end date
$Date = getDatesFromRange($present_day_date, $date_in_thirty_days);

$staffNumQuery = ($conn->query("SELECT staff_id FROM full_staff_data"));
$department_num_query = ($conn->query("SELECT * FROM `departments`"));
$staff_birthday_detail_query = ($conn->query("SELECT `full_name`, `d_o_b` FROM `full_staff_data`"));

$numOfStaff =  mysqli_num_rows($staffNumQuery);

$department_num = mysqli_num_rows($department_num_query);
$staff_birthday_detail = mysqli_fetch_all($staff_birthday_detail_query,MYSQLI_ASSOC);

function birthdayWithinThirtyDays(){
    foreach($GLOBALS['staff_birthday_detail'] as $value) {
        $birthday = date("m-d",strtotime($value["d_o_b"]));
        $staff_name = $value["full_name"];
        if(in_array($birthday, $GLOBALS['Date']) === TRUE){
            echo "{$birthday} -- {$staff_name}";
        }
    }
}

function displayCard($cardTitle, $value, $btnName, $href) {
    return ("
    <div class='card'>
        <h2>{$cardTitle}</h2>
        <p>Total: {$value}</p>
        <a href= {$href}><button class='btn btn-info'>{$btnName}</button></a>
    </div>
    ");
};

function displayBirtHdayInfo($name, $birthday) {
    return ("
    <div  class='birthday-cards'>
        <h2>{$name}'s birthday is on: {$birthday}</h2>
    </div>
    "); 
};

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
    <link rel="stylesheet" href="./styles/style.css"/>
    <link rel="stylesheet" href="./styles/index.css"/>

</head>
<body>
    <nav>
        <ul>
            <a href=""><li>Dashboard</li></a>
            <a href=""><li>Staff Info</li></a>
            <a href=""><li>Departments</li></a>
        </ul>
    </nav>


    <section class="cards-section">
        <?php
            echo displayCard("Employee", $numOfStaff, "View Employees","http://localhost/staffdatasystem/employees.php"); 
            echo displayCard("Departments",$department_num, "View Departments","http://localhost/staffdatasystem/departments.php");        
        ?>
    </section>
    <section class="birthdaySection">
        <h2>Upcoming birthdays:</h2>
        <div class="display-cards">
            <?php 
                foreach($GLOBALS['staff_birthday_detail'] as $value) {
                    $birthday = date("d-m",strtotime($value["d_o_b"]));
                    $staff_name = $value["full_name"];
                    if(in_array($birthday, $GLOBALS['Date']) === TRUE){
                        echo displayBirtHdayInfo($staff_name,$birthday);
                    }
                }
            ?>
        </div>
    </section>
</body>
</html>