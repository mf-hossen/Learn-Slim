<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Employee List</title>

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
            text-align: left;
        }

        caption {

            background-color: beige;
        }
    </style>
</head>
<body>

<div class="container">

    <ol class="breadcrumb">
             
        <li><a href="#">Home</a></li>
               
        <li><a href="#">Employee</a></li>
    </ol>


    <?php
    if (!empty($delete_message)) { ?>
        <div class="alert alert-success" style="text-align: center; font-size: 18px">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php
                echo $delete_message['delete_message'][0];
            ?>
        </div>

    <?php } ?>

           
    <div class="row">
               
        <div class="col-md-6">
            <h2 class="pull-left">Employee List</h2>
        </div>
               
        <div class="col-md-6">
            <a href="/add" class=" glyphicon glyphicon-plus btn btn-info pull-right" type="button">
                CREATE</a>
        </div>
    </div>
    <br><br>

    <div class="row">
        <table class="table table-responsive">
            <tr>
                <th>Name</th>
                <th>Designation</th>

                <th>Department</th>
                <th>Work Type</th>
                <th>Salary</th>
                <th>Action</th>
            </tr>
            <div class="col-md-6" style="text-align: center">
                <?php
                foreach ($employee as $emp) { ?>

                    <tr>

                        <td class='text-left'><a href="/details/<?php echo $emp['id'];?>"><?php echo $emp['name'] ?></a></td>
                        <td class='text-left'> <?php echo $emp['designation'] ?></td>
                        <td class='text-left'> <?php echo $emp['department'] ?></td>
                        <?php
                        $time = $emp['work_time'];
                        if ($time == "day") {
                            echo "<td style='color: green'>$time</td>";
                        } elseif ($time == "night") {
                            echo "<td style='color: orange'>$time</td>";

                        } else {
                            echo "<td style='color: grey'>$time</td>";
                        }
                        ?>
                        <td class='text-right'><span
                                class="glyphicon glyphicon-usd"></span><?php echo $number = number_format($emp['salary'],2) ?>
                        </td>


                        <td class='text-right'>

                            <a href='/details/<?php echo $emp['id'] ?>'><span class='glyphicon glyphicon-eye-open'
                                                                              title="View Employee"
                                                                              aria-hidden=\"true\"></span></a>
                            <a href='/update/<?php echo $emp['id'] ?>'><span class='glyphicon glyphicon-pencil'
                                                                             title="Edit Employee" aria-hidden=\"true\"
                                                                             style='color: green'></span></a>
                            <a href='/delete/<?php echo $emp['id']?>'><span class='glyphicon glyphicon-remove'
                                                                             title="Remove Employee" aria-hidden=\"true\"
                                                                             style='color: red'></span></a>

                        </td>

                    </tr>

                <?php } ?>


            </div>
        </table>
        <div class="col-md-6">


        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</body>
</html>





