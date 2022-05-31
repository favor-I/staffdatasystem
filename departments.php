<?php
    include_once "./db_conn.php";
    $department_retrieval_query = $conn->query("SELECT * FROM `department`");
    $department_retrieval_result = mysqli_fetch_all($department_retrieval_query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STAFF DATA</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/style.css"/>
    <link rel="stylesheet" href="./styles/index.css"/> 
    <link rel="stylesheet" href="./styles/employees.css"/>
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

    <?php
    $row = 0;
    ?>
    <section>
        <h1 class="title">DEPARTMENT DETAILS</h1>
        <div class="add_btn">
            <a href="http://localhost/staffdatasystem/add_employee.php"><input type="submit" value="Add Department" class="btn btn-info add_btn" /></a>
        </div>
        <table class="table">
        <thead style="background: blueviolet; font-size: 14.7px; height: 1em">
            <tr class="head-tr">
                <th>S/N</th> 
                <th>Department Name</th>
            </tr>
        </thead>
        <?php foreach($department_retrieval_result as $value){$row++;?>
            <tbody>
                <tr class="content-row">
                    <td><?php echo $row; ?></td>
                    <td><?php echo $value['name'];?></td>
                </tr>
        <?php }?>
        </tbody>
        </table>
    </section>
</body>
</html>