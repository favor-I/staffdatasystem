<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Employee Data</title>
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
            <h1>Add New Employee</h1>
        </div>
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
                <label>Mobile Number</label>  
                <input type="tel" name="tel_num" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Next of kin</label>  
                <input type="text" name="nok" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Date of Birth</label>  
                <input type="date" name="dob" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Position</label>  
                <input type="text" name="position" class="form-control" />
            </div>

            <div class="form-group form_group">
                <label>Department</label><br>  
                <select class="form-control" name="department">
                    <option>---Select---</option>
                    <option  value="5">Business Dev</option>
                    <option  value="2">Engineering</option>
                    <option  value="1">Marketing</option>
                    <option  value="7">Account</option>
                    <option  value="3">Finance</option>
                    <option  value="6">Sales</option>
                    <option  value="4">Legal</option>
                </select>
            </div>
            
            <input type="submit" name="submit" value="Save" class="btn btn-info btn_info" /><br />
        </form>
    </section>
</body>
</html>