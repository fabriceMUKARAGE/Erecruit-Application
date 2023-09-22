<?php 

require('../model/ee.php');

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->read();
   //  print_r($data);
    if($db->totalRowCount()>0){ 
        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
            <th>Electrical And Electronics Engineering Student Name</th>
            <th>Position of interest</th>
            <th>Schedule for the interview</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['name'].'</td>
            <td>'.$row['job'].'</td>

            <td>
            <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['id'].'">
            <button style="background-color: #2B5105; color: white; padding: 5px 10px; border-radius: 5px;">Invite</button></a>&nbsp;&nbsp;
            </td></tr>';
        }
        $output .='</tbody></table>';
        echo $output;
    }else{
        echo '<h3 class="text-center text-secondary mt-5">:( no any student available )</h3>';
    }
}

//interview
if(isset($_POST['interview_id'])){
    $id = $_POST['interview_id'];
    $db->interviewMessage($id);
}


if(isset($_POST['info_id'])){
    $id = $_POST['info_id'];
    $row = $db->getUserBiId($id);
    echo json_encode($row);
}


?>