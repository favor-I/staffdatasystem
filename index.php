<?php include_once "./db_conn.php"; ?>
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
    <link rel="stylesheet" href="./style.css"/> 
</head>
<body>

    <form action="./config.php" class="form data_entry_form" method="post" >
        <p class="error"><?php if(isset($_GET['err'])) { echo $_GET['err'];} ?> </p>
        <div class="form-group form_group">
            <label>Name</label>  
            <input type="text" name="name" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Email</label>  
            <input type="text" name="mail" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Next of kin</label>  
            <input type="text" name="nok" class="form-control" />
        </div>

        <div class="form-group form_group">
            <label>Position</label>  
            <input type="text" name="position" class="form-control" />
        </div>
        <!-- <div class="form-group">
            <label for="Department"> Department</label>
            <input type="text" name="dept" class="form-control" id="dept_el" placeholder="Department">
        </div> -->
        
        <!-- <div class="form-group form_group">
            <label>Passport Photograph:</label>  
            <input type="file" name="passport" class="form-control" />
        </div>               -->
        
        <input type="submit" name="submit" value="Append" class="btn btn-info btn_info" /><br />
    </form>

    <?php
    $retrieve = "SELECT * FROM full_staff_data";

    $result = $conn->query($retrieve);
    $row = 0;
    ?>
    <table class="table">
    <thead style="background: blueviolet; font-size: 14.7px; height: 1em">
        <tr>
            <th>S/N</th> 
            <th>Name</th>
            <th>Email</th>
            <th>Next of Kin</th>
            <th>Position</th>
            <th>Actions</th>
            <!-- <th>Department</th> -->
        </tr>
    </thead>
    <?php while($each_row = $result->fetch_assoc()){$row++;//print_r($each_row);?>
        <tbody>
            <tr class="content-row">
                <td><?php echo $row; ?></td>
                <td><?php echo $each_row['full_name'];?></td>
                <td><?php echo $each_row['email'];?></td>
                <td><?php echo $each_row['next_of_kin'];?></td>
                <td><?php echo $each_row['position'];?></td>
                <!-- <td><?php //echo $each_dept['department_name'] ?></td> -->
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
</body>
</html>