<?php

//connect to database class
require_once (dirname(__FILE__)).'/../settings/db_connection.php';

class Form extends db_connection {


    public function Details(){
        //sql query
        $sql = "SELECT * FROM `approvedstudent`";

        //run query
        return $this->db_query($sql);
    }


    public function getSingleDetail($id){
        // sql query
        $sql = "SELECT * FROM `approvedstudent` WHERE `id`='$id'";

        // run query
        return $this->db_query($sql);
    }

    // updating user details

    //public function update($id,$name, $email, $school, $major,  $year, $newskills,  $job, $file_name){
     public function update($id,$name, $email,  $year, $skills, $job){
        // sql query
        //$sql = "UPDATE `approvedstudent` SET `name`='$name',`email`='$email',`school`='$school',`major`='$major',`year`='$year',`skills`='$newskills',`job`='$job',`resume`='$file_name' WHERE `id`='$id'";
        $sql = "UPDATE `approvedstudent` SET `name`='$name',`email`='$email',`year`='$year',`skills`='$skills',`job`='$job' WHERE `id`='$id'";
        
        // run query
        return $this->db_query($sql);
    }  
    

}


?>