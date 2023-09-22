<?php 

require('../model/approved_student.php');

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->read();
   //  print_r($data);
    if($db->totalRowCount()>0){ 
        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>Full name</th>
                <th>Email</th>
                <th>Major</th>
                <th>Year</th>
                <th>Check Resume</th>
               
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['name'].'</td>
            <td>'.$row['email'].'</td>
            <td>'.$row['major'].'</td>
            <td>'.$row['year'].'</td>
            <td><a href="./../../recruiter/resume/'.$row['resume'].'" download>'.$row['resume'].'</a></td>
            
            <td>
                <a href="#" title="View Details" class="text-success infoBtn" id="'.$row['id'].'">
                <button style="background-color: #007bff; color: white; padding: 5px 10px; border-radius: 5px;">View</button></a>&nbsp;&nbsp; 

                <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['id'].'">
                <i class="fas fa-trash-alt fa-lg"></i></a>&nbsp;&nbsp;
                
            </td></tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( no any user present in the database )</h3>';
    }
}

//delete
if(isset($_POST['del_id'])){
    $id = $_POST['del_id'];

    $db->delete($id);
}


if(isset($_POST['info_id'])){
    $id = $_POST['info_id'];
    $row = $db->getUserBiId($id);
    echo json_encode($row);
}


//export to the excel document
if(isset($_GET['export']) && $_GET['export'] == "excel"){
    header("Content-Type: application/xls");
    header("Content-Disposition: attachment; filename=users.xls");
    header("pragma: no-cache");
    header("Expires: 0");

    $data = $db->read();
    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Username</th><th>Email</th><th>School</th><th>major</th><th>year</th><th>resume</th>';

    foreach($data as $row){
        echo '<tr>
        <td>'.$row['id'].'</td>
        <td>'.$row['username'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['school'].'</td>
        <td>'.$row['major'].'</td>
        <td>'.$row['year'].'</td>
        <td>'.$row['resume'].'</td>
        </tr>';
    }
    echo '</table>';
}

?>