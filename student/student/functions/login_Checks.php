<?php
session_start();
//connect to form controller
include_once (dirname(__FILE__)).'/../controllers/form_controller.php';

$details = getDetails();

foreach($details as $key => $values){}


$connection = new mysqli(SERVER,USERNAME,PASSWD,DATABASE);

if ($connection->connect_error) die($connection->connect_error);


if(isset($_POST['submit'])){
// Grab form inputs
$user= $_POST['email'];
$pword =md5($_POST['password']);

$sql = "SELECT * FROM `approvedstudent` where email = '$user' limit 1";

$result = mysqli_query($connection, $sql);
if ($result){
if ($result && mysqli_num_rows($result)> 0){
$data = mysqli_fetch_ASSOC($result);
if ( $data ['password'] === $pword){
session_start();
$_SESSION['id'] = $value['id'];
$_SESSION['name'] = $value['name'];
$_SESSION['email'] = $value['email'];
$_SESSION['job'] = $value['job'];
$_SESSION['id']= $values['id'];
$_SESSION['interview'] = $value['interview'];

header("Location: ../dashboard/account.php?id=". $values['id'] );   
die;
} 

}

echo '<h6 style = "color:red;">'."Invalid name or password provided". "</h6>";
}

}
?>
