<?php 
include_once "./db_conn.php";
$id = "";
if(isset($_GET["id"])) {
    $id = $_GET["id"];
}

$all_departments_query = $conn->query("SELECT * FROM department");
$all_departments_result = mysqli_fetch_all($all_departments_query,MYSQLI_ASSOC);




$query = "SELECT fsd.full_name, fsd.email, fsd.mobile, fsd.n_o_k, fsd.date_of_birth, fsd.position, dp.id, dp.name AS department
            FROM staff fsd, department dp
 WHERE fsd.departments_id = dp.id AND staff_id = $id";



$result =  $conn->query($query);


while ($current_staff = $result->fetch_assoc()) {
    $name       = $current_staff['full_name'];
    $mail       = $current_staff['email'];
    $mNum       = $current_staff['mobile'];
    $nok        = $current_staff['n_o_k'];
    $dob        = $current_staff['date_of_birth'];
    $pos        = $current_staff['position'];
    $department = $current_staff['department'];
    $department_id = $current_staff['id'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW STAFF RECORD SYSTEM</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css"/>
    <link rel="stylesheet" href="./styles/add_employees.css"/>
</head>
<body>
    <section>
        <div class="title">
            <h1>Update Employee Data</h1>
        </div>
        <form action="update.php?id=<?php echo $id; ?>" class="form data_entry_form" method="post" >
            <p class="error"><?php if(isset($_GET['err'])) { echo $_GET['err'];} ?> </p>
            <div class="form-group form_group">
                <label>Name</label>  
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Email</label>  
                <input type="text" value="<?php echo $mail ?>" name="mail" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Mobile Number</label>  
                <input type="tel" value="<?php echo $mNum ?>" name="tel_num" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Next of kin</label>  
                <input type="text" value="<?php echo $nok ?>" name="nok" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Date of Birth</label>  
                <input type="date" value="<?php echo $dob ?>" name="dob" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Position</label>  
                <input type="text" value="<?php echo $pos ?>" name="position" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Department</label>
                <select class="form-control" name="department">
                    <?php foreach($all_departments_result as $key => $value){
                        if($value['id'] == $GLOBALS['department_id']){
                            echo "<option  value='{$value['id']}' selected='selected'>  {$value['name']} </option>";
                        }else{
                            echo "<option  value='{$value['id']}'>  {$value['name']} </option>";
                        } 
                    }?>
                </select>
            </div>

            
            <input type="submit" name="submit" value="Update" class="btn btn-info btn_info" />
        </form>
    </section>

</body>
</html>