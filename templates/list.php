<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>

        th{
            background-color: grey;
        }

        caption{

            background-color: beige;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <table style="margin: 20px auto; background-color: aquamarine">
                <caption>Employee Table</caption>
                <tr><th>Id</th><th>Name</th><th>Designation</th><th>Salary</th></tr>
            <div class="col-md-6" style="text-align: center">
                <?php
                foreach ($employee as $emp){
                    echo "<tr>";
                    echo "<td>";
                    echo $emp['id'];
                    echo "</td>";

                    echo "<td>";
                    echo $emp['name'];
                    echo "</td>";

                    echo "<td>";
                    echo $emp['designation'];
                    echo "</td>";

                    echo "<td>";
                    echo $emp['salary'];
                    echo "</td>";
                    echo "</tr>";
                }
                ?>

            </div>
            </table>
            <div class="col-md-6">


            </div>
        </div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>





