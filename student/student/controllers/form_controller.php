<?php
//connect to the form class
include_once (dirname(__FILE__)).'/../classes/form-class.php';

function getDetails(){
    // Create new form object
    $form = new Form;

    // Run query
    $runQuery = $form->Details();

    if($runQuery){
        $details = array();
        while($record = $form->db_fetch()){
            $details[] = $record;
        }
        return $details;
    }else{
        return false;
    }
}

function getSingleDetail($id){
    // Create new form object
    $form = new Form;

    // Run query

    $runQuery = $form->getSingleDetail($id);

    if($runQuery){

        $forms = $form->db_fetch();
        if(!empty($forms)){
            return $forms;
        }else{
            return [];
        }
        
    }else{
        return false;
    }
}

function updateForm($id,$name, $email, $school, $major,  $year, $newskills,  $job, $file_name){
    // Create new form object
    $form = new Form;

    // Run query
    $runQuery = $form->update($id,$name, $email, $school, $major,  $year, $newskills,  $job, $file_name);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}



?>