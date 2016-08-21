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

    public function AddEmployee($data){
        {
            // var_dump($data); die();
            try {
                $stmt = $this->db->prepare("INSERT INTO employee (name,designation,salary,work_time,department)VALUES (:name,:designation,:salary,:work_time,:department)");



                $stmt->bindParam(':name', $data['name']);
                $stmt->bindParam(':designation', $data['designation']);
                $stmt->bindParam(':department', $data['department']);
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
        $sql = "SELECT * FROM employee where id='$id'";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetchAll();
        return $row;
    }

    public function EditEmployee($data)
    {
        $id=$data['id'];
        //var_dump($data); die();
        $stmt = $this->db->prepare("update employee set name=:name, designation=:designation, department=:department, work_time=:work_time, salary=:salary where id='$id'");
        $stmt->bindParam(':name', $data['name']);
        $stmt->bindParam(':designation', $data['designation']);
        $stmt->bindParam(':department', $data['department']);
        $stmt->bindParam(':work_time', $data['work_time']);
        $stmt->bindParam(':salary', $data['salary']);
        //$stmt = $this->db->query($sql);
        $stmt->execute();
        //return $stmt->withStatus(302)->withHeader('Location', 'your-new-uri');
        return $stmt;

    }

    public function GetDetails($id)
    {
        //var_dump($id);
        $sql = "SELECT * FROM employee where id='$id'";
        $stmt = $this->db->query($sql);
        $row = $stmt->fetch();
        return $row;
    }
}