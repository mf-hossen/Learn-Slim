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

    public function addemployee($data){
        {
            // var_dump($data); die();
            try {
                $stmt = $this->db->prepare("INSERT INTO employee (name,designation,department,work_time,salary)VALUES (:name,:designation,:department,:work_time,:salary)");



                $stmt->bindParam(':name', $data['name']);
                $stmt->bindParam(':designation', $data['designation']);
                $stmt->bindParam(':department', $data['department']);
                $stmt->bindParam(':work_time', $data['work_time']);
                $stmt->bindParam(':salary', $data['salary']);

                $stmt->execute();

                return $this->db->lastInsertId();

            } catch (Exception $e) {
                throw $e;
                //return false;
            }
        }
    }
}