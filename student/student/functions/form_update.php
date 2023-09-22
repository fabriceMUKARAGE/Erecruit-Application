<?php
session_start();
include_once (dirname(__FILE__)).'/../controllers/form_controller.php';

$details = getDetails();

foreach($details as $key => $values){}


// check if button is clicked
if(isset($_POST['submit'])){
        // Grab form data

        $name = $_POST['name'];
        $email = $_POST['email'];  
        
        $school=$_POST['school'];  
        $major=$_POST['major'];
        $year=$_POST['year'];
        
        //sending skills into the database
        $skills=$_POST['skills'];
        $newskills= implode(',', $skills);
        
        //job or internship interested in
        $job=$_POST['job'];
        if (isset($_FILES['pdf_file']['name']))
            {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
    
            move_uploaded_file($file_tmp,"./pdf/".$file_name);
            
            $errors = array();


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }

            $file_extension = pathinfo($resume, PATHINFO_EXTENSION);
            if ($file_extension != "pdf") {
                $errors[] = "Invalid file format. Only pdf is allowed";
            }
       

    // update post if empty
    $updatedProfile =updateForm($id,$name, $email, $school, $major,  $year, $newskills,  $job, $file_name);
    if($updatedProfile){
         
    header("Location: account.php?id=". $values['id'] );   
    die; 
        
    }else{
       return false;
    }
}
}
