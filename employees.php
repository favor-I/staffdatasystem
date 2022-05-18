<?php include_once "./db_conn.php"; ?>
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
    <link rel="stylesheet" href="./styles/employees.css"/>
</head>
<body>


    <?php
    $retrieve = "SELECT fsd.staff_id, fsd.full_name, fsd.email, fsd.mobile, fsd.n_o_k, fsd.d_o_b, fsd.position, dp.name  FROM full_staff_data fsd, departments dp
                WHERE fsd.departments_id = dp.id";

    $result = $conn->query($retrieve);
    // print_r($result->fetch_assoc());
    // die();
    $row = 0;
    ?>
    <section>
        <h1 class="title">EMPLOYEE DETAILS</h1>
        <div class="add_btn">
            <a href="http://localhost/staffdatasystem/add_employee.php"><input type="submit" value="Add Employee" class="btn btn-info add_btn" /></a>
        </div>
        <table class="table">
        <thead style="background: blueviolet; font-size: 14.7px; height: 1em">
            <tr class="head-tr">
                <th>S/N</th> 
                <th>Name</th>
                <th>Email</th>
                <th>Mobile Number</th>
                <th>Next of Kin</th>
                <th>Date of Birth</th>
                <th>Position</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php while($each_row = $result->fetch_assoc()){$row++;?>
            <tbody>
                <tr class="content-row">
                    <td><?php echo $row; ?></td>
                    <td><?php echo $each_row['full_name'];?></td>
                    <td><?php echo $each_row['email'];?></td>
                    <td><?php echo $each_row['mobile'];?></td>
                    <td><?php echo $each_row['n_o_k'];?></td>
                    <td><?php echo $each_row['d_o_b'];?></td>
                    <td><?php echo $each_row['position'];?></td>
                    <td><?php echo $each_row['name'];?></td>

                    <td>
                        <div style="display: flex; flex-direction: row;">
                            <form class="" action="config.php" method="POST">
                                <a href="http://localhost/staffdatasystem/delete.php?id=<?php echo $each_row['staff_id'];?>"><input style="margin-right: .15em;" class="btn btn-danger btn_delete" placeholder="Delete" value="Delete" type="button"></a>
                                <a href="http://localhost/staffdatasystem/update_form.php?id=<?php echo $each_row['staff_id'];?>"><input style="margin-left: .15em;" class="btn btn-warning btn_delete" placeholder="Delete" value="Update" type="button"></a>
                            </form>
                        </div>
                    </td>
                </tr>
        <?php }?>
        </tbody>
        </table>
    </section>
</body>
</html>