<?php

class DesignationMapper extends Mapper
{
    public function GetDesignation()
    {
        $sql = "SELECT * FROM designation";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }
}