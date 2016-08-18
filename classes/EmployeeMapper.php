<?php

class EmployeeMapper extends Mapper
{
    public function getEmployee()
    {
       $sql = "SELECT * FROM employee";
        $stmt = $this->db->query($sql);
        $result =[];

        while($row = $stmt->fetchAll()){

            $result = $row;
        }
            return $result;
    }

}