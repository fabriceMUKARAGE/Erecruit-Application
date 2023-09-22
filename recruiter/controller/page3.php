<?php 

require('../model/page3.php');

$db = new Database();

if(isset($_POST['action']) && $_POST['action']== "view"){
    $output = '';
    $data = $db->read();
   //  print_r($data);
    if($db->totalRowCount()>0){ 
        $output .= '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
            <th>Student Email</th>
            <th>Students Resume</th>
            <th>Schedule for the interview</th>
            </tr>
        </thead>
        <tbody>
        ';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td>'.$row['email'].'</td>
            <td><a href="./../../recruiter/resume/'.$row['resume'].'" download>'.$row['resume'].'</a></td>
            <td>

                <a href="#" title="Delete" class="text-danger delBtn" id="'.$row['id'].'">
                <button style="background-color: #2B5105; color: white; padding: 5px 10px; border-radius: 5px;">Invite</button></a>&nbsp;&nbsp;

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

?>