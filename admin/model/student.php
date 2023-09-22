<?php
class Database
{

   // private $dsn = "sqlsrv:Server=localhost;Database=test";    // Conect with SQLServer
   private $dsn = "mysql:host=localhost;dbname=capstone";   // Conect with MySQL
   private $username = "root";
   private $pass = "";
   public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->pass);
            // echo "Succesfully Conected!";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function read()
    {
        $data = array();
        $sql = "SELECT id, name, email, school, major, year, resume FROM student order by id DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
            $data[] = $row;
        }
        return $data;
    }


    public function getUserBiId($id)
    { 
        $sql = "SELECT id, name, email, school, major, year, resume FROM student WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['id' => $id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function delete($id)
    {
        $sql1 = "DELETE FROM student WHERE id=:id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->execute(['id' => $id]);
        return true;
    }

    //approve function
    public function approve($id)
    {
        $sql1 = "INSERT INTO Approvedstudent (id, name, email, password, school, major, year, skills, job, resume) SELECT
        id, name, email, password, school, major, year, skills, job, resume FROM student WHERE id=:id";
        $stmt1 = $this->conn->prepare($sql1);
        $stmt1->execute(['id' => $id]);

        //after approving the student
        if ($sql1){
            $sql2 = "DELETE FROM student WHERE id=:id";
            $stmt2 = $this->conn->prepare($sql2);
            $stmt2->execute(['id' => $id]);
        }
        return true;
    }

    public function totalRowCount()
    {
        $sql = "SELECT count(*)  FROM student";
        $result = $this->conn->prepare($sql);
        $result->execute();
        $number_of_rows = $result->fetchColumn();
        return $number_of_rows;
    }

}
$ob = new Database();
