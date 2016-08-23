<?php
//var_dump($update_data);
//foreach ($update_data as $data) {
    //echo $data['name'];
//}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Update Employee</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">
    <ol class="breadcrumb">
             
        <li><a href="/employee">Home</a></li>
        <li><a href="/add">Add Employee</a></li>
        <li><a href="#">Update</a></li>
    </ol>

    <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
            <div class="btn-toolbar" role="toolbar">
                <a href="/add" class="btn btn-info btn-group pull-right">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> CREATE
                </a>
                <!--<a href="/delete" class="btn btn-danger btn-group pull-right">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE
                </a>-->
                <a href="/employee" class="btn btn-success btn-group pull-right">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> EMPLOYEES
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        </div>
             
        <form action="/update" method="post" style="width: 450px; margin: 0 auto">
            <legend><h3>Employee Update Form</h3></legend>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php echo $update_data['name']; ?>" class="form-control" id="name">
            </div>

            <input type="hidden" name="id" value="<?php echo $update_data['id']; ?>" class="form-control" id="id">


            <div class="form-group">
                <label for="des">Designation:</label>
                <select name="designation_id" class="form-control" id="desi" required>
                    <?php
                        if($update_data['designation_name']){?>
                    <option  value="<?php echo $update_data['designation_id']?>" selected="selected"><?php echo $update_data['designation_name']?></option>
                    <?php } ?>
                    <option value="1">Manager</option>
                    <option value="2">Receptionist</option>
                    <option value="3">Engineer</option>

                </select>
            </div>
            <div class="form-group">
                <label for="dept">Depatrment:</label>
                <select name="department_id" class="form-control" id="dept">

                    <?php
                    if($update_data['department_name']){?>
                        <option value="<?= $update_data['department_id'] ?>" selected="selected"><?= $update_data['department_name'] ?></option>
                    <?php } ?>
                    <option value="1">HRM</option>
                    <option value="2">Desk</option>
                    <option value="3">IT</option>


                </select>
            </div>

            <div class="form-group">
                <label for="dept">Work Type:</label>
                <select name="work_time" class="form-control" id="wtype">
                    <?php
                        if($update_data['work_time']){?>
                    <option value='<?php echo $update_data['work_time']?>'><?php echo $update_data['work_time']?></option>
                    <?php } ?>
                    <option value="day">Day</option>
                    <option value="night">Night</option>
                    <option value="full">Full</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dept">Salary:</label>
                <input type="text" name="salary" value="<?php echo $update_data['salary']; ?>" class="form-control"
                       id="salary">
            </div>
            <button type="submit" class="btn btn-info">Submit</button>
        </form>
    </div>
</div>

</div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>





