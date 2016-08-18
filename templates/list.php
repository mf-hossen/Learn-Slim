<table border="1" style="margin: 20px auto">
    <caption>Employee Table</caption>
    <tr><th>Id</th><th>Name</th><th>Designation</th><th>Salary</th></tr>


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

</table>