<?php

class DepartmentMapper extends Mapper
{
    public function GetDepartment()
    {
            $sql = "SELECT * FROM department";
            $stmt = $this->db->query($sql);
            $row = $stmt->fetchAll();
            return $row;
    }
}