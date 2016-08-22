<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Details of <?php echo $details['name'] ?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        th {
            background-color: black;
            color: white;
            text-align: right;
        }

        caption {

            background-color: beige;
        }
    </style>
</head>
<body>

<div class="container">

    <ol class="breadcrumb">
             
        <li><a href="/employee">Home</a></li>
        <li><a href="/employee">Employee</a></li>
        <li><a href="#"><?php echo $details['name'] ?></a></li>
    </ol>
    <?php
    if (!empty($msg)) { ?>
        <div class="alert alert-success" style="text-align: center; font-size: 18px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php
                echo $msg['message'][0];
            ?>
        </div>

    <?php } ?>

           
    <div class="row">
        <div class="col-md-6"><h3>Employee Details</h3></div>
        <div class="col-md-6">
            <div class="btn-toolbar" role="toolbar">
                <a href="/add" class="btn btn-info btn-group pull-right">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> CREATE
                </a>
                <a href="/delete" class="btn btn-danger btn-group pull-right">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> DELETE
                </a>

                <a href="/update/<?php echo $details['id']; ?>" class="btn btn-warning btn-group pull-right">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> UPDATE
                </a>
                <a href="/employee" class="btn btn-success btn-group pull-right">
                    <span class="glyphicon glyphicon-list" aria-hidden="true"></span> EMPLOYEES
                </a>
            </div>
        </div>
    </div>
    <br><br>


    <div class="container">
        <table class="table table-responsive" style='width: 350px'>

            <tr>
                <td><b>Name:</b></td>
                <td><?php echo $details['name'] ?></td>
            </tr>
            <tr>
                <td><b>Designation:</b>:</td>
                <td><?php echo $details['designation'] ?></td>


            </tr>

            <tr>
                <td><b>Department:</b></td>
                <td><?php echo $details['department'] ?></td>


            </tr>

            <tr>
                <td><b>Work Type:</b></td>
                <td><?php echo $details['work_time'] ?></td>
            </tr>


            <tr>
                <td><b>Salary:</b></td>
                <td><span class="glyphicon glyphicon-usd"></span><?php echo number_format($details['salary']); ?></td>

            </tr>

        </table>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</body>
</html>





