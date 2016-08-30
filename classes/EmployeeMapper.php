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
                $stmt = $this->db->prepare("INSERT INTO employe (name,designation_id,department_id,work_time,salary,description)VALUES (:name,:designation_id,:department_id,:work_time,:salary,:description)");
                $stmt->bindParam(':name', $data['name']);
                $stmt->bindParam(':designation_id', $data['designation_id']);
                $stmt->bindParam(':department_id', $data['department_id']);
                $stmt->bindParam(':work_time', $data['work_time']);
                $stmt->bindParam(':salary', $data['salary']);
                $stmt->bindParam(':description', $data['description']);
                $stmt->execute();

                return $this->db->lastInsertId();

            } catch (Exception $e) {
                throw $e;

            }
        }
    }


    public function GetbyId($id)
    {
        $sql = "SELECT employe.id ,employe.name, employe.work_time ,employe.description, employe.salary, department.name as department_name , designation.name as designation_name
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

        $sql = "SELECT employe.id as emplye_id,employe.name, employe.work_time , employe.salary,employe.description, designation.id as desi_id,department.id as desi_id, department.name as department_name , designation.name as designation_name
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


    public function empAttendence($data)
    {
        {
            //var_dump($data); die();
            try {


                $stmt = $this->db->prepare("INSERT INTO attendence (employee_id,check_in,check_out,date,year)
VALUES (:employee_id,:check_in,:check_out,:date,:year)");
                $stmt->bindParam(':employee_id', $data['employee_id']);
                $stmt->bindParam(':check_in', date('Y-m-d h:i:s'));
                $stmt->bindValue(':check_out', null);
                $stmt->bindParam(':date', date('Y-m-d'));
                $stmt->bindParam(':year', date('Y'));
                //$stmt->bindParam(':status', $data['Present']);
                $stmt->execute();

                return $this->db->lastInsertId();


            } catch (Exception $e) {
                throw $e;

            }
        }
    }


    public function getAttendence($date)
    {
	$date=date('Y-m-d');
        $sql ="select * from attendence where date BETWEEN '$date' and '$date'";
        $stmt = $this->db->query($sql);
        $result = [];

        while ($row = $stmt->fetchAll()) {

            $result = $row;
        }
        return $result;
    }

    public function empPunch($data)
    {
        try {
            //var_dump($data); die();
            $id = $data['employee_id'];
            $stmt = $this->db->prepare("update attendence set check_out=:check_out where employee_id='$id'");
            $stmt->bindParam(':check_out', date('Y-m-d h:i:s'));
            $stmt->execute();

        } catch (Exception $e) {
            throw $e;

        }

    }



}
