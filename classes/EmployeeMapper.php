<?php

class EmployeeMapper extends Mapper
{

    public function getEmployee()
    {
        $sql = "SELECT employe.id ,employe.name, employe.work_time , employe.salary, department.name as department_name , designation.name as designation_name
FROM `employe` 
join department join designation 
on employe.department_id = department.id  and employe.designation_id = designation.id";
        $stmt = $this->db->query($sql);
        $result = [];

        while ($row = $stmt->fetchAll()) {

            $result = $row;
        }
        return $result;
    }

    public function AddEmployee($data)
    {
        {
            // var_dump($data); die();
            try {
                $stmt = $this->db->prepare("INSERT INTO employe (name,designation_id,department_id,work_time,salary)VALUES (:name,:designation_id,:department_id,:work_time,:salary)");
                $stmt->bindParam(':name', $data['name']);
                $stmt->bindParam(':designation_id', $data['designation_id']);
                $stmt->bindParam(':department_id', $data['department_id']);
                $stmt->bindParam(':work_time', $data['work_time']);
                $stmt->bindParam(':salary', $data['salary']);

                $stmt->execute();

                return $this->db->lastInsertId();

            } catch (Exception $e) {
                throw $e;

            }
        }
    }


    public function GetbyId($id)
    {
        $sql = "SELECT employe.id ,employe.name, employe.work_time , employe.salary, department.name as department_name , designation.name as designation_name
FROM `employe` 
join department join designation 
on employe.department_id = department.id  and employe.designation_id = designation.id where employe.id='$id'";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch();
        return $row;
    }


    public function EditEmployee($data)
    {
        try {

            $id = $data['id'];
            $stmt = $this->db->prepare("update employe set name=:name, designation_id=:designation_id, department_id=:department_id, work_time=:work_time, salary=:salary where id='$id'");
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':designation_id', $data['designation_id']);
            $stmt->bindParam(':department_id', $data['department_id']);
            $stmt->bindParam(':work_time', $data['work_time']);
            $stmt->bindParam(':salary', $data['salary']);
            $stmt->execute();

            $details = $this->GetDetails($id);
            return $details['emplye_id'];

        } catch (Exception $e) {
            throw $e;

        }

    }

    public function GetDetails($id)
    {

        $sql = "SELECT employe.id as emplye_id,employe.name, employe.work_time , employe.salary,designation.id as desi_id,department.id as desi_id, department.name as department_name , designation.name as designation_name
FROM `employe` 
join department join designation 
on employe.department_id = department.id  and employe.designation_id = designation.id 
where employe.id='$id'";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch();
        //var_dump($row);
        return $row;
    }


    public function EmpDelete($id)
    {
        //var_dump($id);
        $sql = "DELETE FROM employe where id='$id'";
        $stmt = $this->db->query($sql);
        return $stmt;
    }


}