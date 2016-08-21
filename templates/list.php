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
             
        <li><a href="#">Home</a></li>
               
        <li><a href="#">Employee</a></li>
    </ol>
           
    <div class="row">
               
        <div class="col-md-6">
                           <h2 class="pull-left">Employee List</h2>
                   
        </div>
               
        <div class="col-md-6">
                       <a href="/insert" class=" glyphicon glyphicon-plus btn btn-info pull-right" type="button">
                CREATE</a>


                   
        </div>
    </div><br><br>

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


                // english notation (default)
                foreach ($employee as $emp) { ?>

                     <tr>

                   <td class='text-right'> <?php echo $emp['name'] ?></td>

                         <td class='text-right'> <?php echo $emp['designation'] ?></td>



                         <td class='text-right'> <?php echo $emp['department'] ?></td>

                         <td class='text-right'> <?php echo $emp['work_time'] ?></td>

                         <td class='text-right'> <?php echo $number= number_format($emp['salary']) ?></td>



                    <td class='text-right'>

                    <span class='glyphicon glyphicon-eye-open' title=\"View Employee\" aria-hidden=\"true\"></span>
                    <a href='/update/<?php echo $emp['id']?>'><span class='glyphicon glyphicon-pencil' title=\"Edit Employee\" aria-hidden=\"true\" style='color: green'></span></a>
                    <span class='glyphicon glyphicon-remove' title=\"Remove Employee\" aria-hidden=\"true\" style='color: red'></span>

                    </td>

                    </tr>

              <?php  } ?>


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





