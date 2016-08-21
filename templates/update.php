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
    <title>Add Emloyee</title>

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
               
        <li><a href="#">Add Employee</a></li>
    </ol>


         <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
        </div>
             <form action="/update" method="post" style="width: 450px; margin: 0 auto">
                <legend><h3>Employee Update Form</h3></legend>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php foreach ($update_data as $data) {
                    echo $data['name'];
                }?>" class="form-control" id="name">
            </div>

            <input type="hidden" name="id" value="<?php foreach ($update_data as $data) {
                echo $data['id'];
            }?>" >

            <div class="form-group">
                <label for="des">Designation:</label>
                <select name="designation" class="form-control" id="desi" required>
                    <?php
                        foreach ($update_data as $data) {
                        echo $data['designation'];

                        }
                    ?>

                    <option value="manager">Manager</option>
                    <option value="reception">Reception</option>
                    <option value="keeping">Keeper</option>
                </select>
            </div>
            <div class="form-group">
                <label for="dept">Depatrment:</label>
                <select name="department" class="form-control" id="dept" required>

                    <?php
                    foreach ($update_data as $data) {
                        echo $data['department'];

                    }
                    ?>
                    <option value="hrm">HRM</option>
                    <option value="reception">Reception</option>
                    <option value="keeping">Keeper</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dept">Work_type:</label>
                <select name="work_time" class="form-control" id="wtype" required>
                    <?php
                    foreach ($update_data as $data) {
                        echo $data['work_time'];

                    }
                    ?>
                    <option value="day">Day</option>
                    <option value="night">Night</option>
                    <option value="full">Full</option>
                </select>
            </div>

            <div class="form-group">
                <label for="dept">Salary:</label>
                <input type="text" name="salary" value="<?php foreach ($update_data as $data) {
                    echo $data['salary'];
                }?>"" class="form-control" id="salary">
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





