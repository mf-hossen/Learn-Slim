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

            <div class="col-md-2"></div>
            <div class="col-md-10">
                <fieldset style="width: 450px">
                    <legend>Add Employee</legend>
                    <form action="/insert" method="post" class="well">
                        <div>
                            <b>Name</b>
                            <input type="text" name="name" placeholder="Input your name" required>
                        </div><br>

                        <div>
                            <b>Designation</b>
                            <input type="text" name="designation" placeholder="Input your designation" required>
                        </div><br>

                        <div>
                            <b>Department</b>
                            <input type="text" name="department" placeholder="Input your department" required>
                        </div><br>

                        <div>
                            <b>Work_time</b>
                            <input type="text" name="work_time" placeholder="Input your work_time" required>
                        </div><br>

                        <div>
                            <b>Salary</b>
                            <input type="text" name="salary" placeholder="Input your salary" required>
                        </div><br>

                        <div>
                            </ br>
                           <a href="/employee"> <button class="btn btn-info" type="submit">Submit</button></a>
                        </div>
                    </form>

                </fieldset>


        </div>
                   
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
</body>
</html>





