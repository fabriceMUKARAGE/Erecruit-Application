<?php 

include '../../database_connection.php';
error_reporting(0);

session_start();

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone= $_POST['phone'];
  $company= $_POST['company'];   
  $password = md5($_POST['password']);
  $cpassword = md5($_POST['password2']);

  if ($password == $cpassword) {
    $sql = "SELECT * FROM recruiter WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    
    if (!$result->num_rows > 0) {
      if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $sql = "INSERT INTO recruiter (name, email,phone,company,password)
            VALUES ('$name','$email','$phone','$company','$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          header("Location: ../../login.php");
          die;
          $name = "";
          $email = "";
          $_POST['password'] = "";
          $_POST['password2'] = "";
        } else {
          echo "<script>alert('Woops! Something Wrong Went.')</script>";
        }
      
      }

      else{
        echo "<script>alert('Invalid Email Format.!')</script>";
      }
    }
      
    else {
        echo "<script>alert('Woops! Email Already Exists.')</script>";
    }
   
      
  } 
  else {
    echo "<script>alert('Password Not Matched.')</script>";
  }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="dist/virtual-select.min.css" />
    <script src="dist/virtual-select.min.js"></script>
    <title>Recruiter registration</title>
</head>
<body>
    <div class="container">
        <form method="POST" action=" " id="form" class="form">
            <h2 style="color:black">Recruiter Registration</h2>
            <div class="form-control">
                <input type="text" placeholder="Enter Full Name" name="name" id="name" 
                value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" pattern="[a-zA-Z. ]{1,50}" required>
                <small id='nameError'></small>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Enter Email" name="email" id="email" 
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                <small id='emailError'></small>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Enter Phone Number" name="phone" id="phone" 
                value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''; ?>" pattern="[0-9]{10}" maxlength="10" required>
                <small id='emailError'></small>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Company Name" name="company" id="company" 
                value="<?php echo isset($_POST['company']) ? $_POST['company'] : ''; ?>" required>
                <small id='emailError'></small>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Enter your password" name="password" id="password" 
                value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
                <small id='passwordError'></small>
            </div>
            <div class="form-control">
                <input type="password" placeholder="Confirm password" name="password2" id="password2" 
                value="<?php echo isset($_POST['password2']) ? $_POST['password2'] : ''; ?>" required>
                <small id='password2Error'></small>
            </div>
            
            <small id='success'></small>
            <button type="submit" id='submitBtn' name='submit'>Register</button>
            <h2>Already registered! Login<a style="color: blue; text-decoration: none;" href="./../../login.php"> here</a></h2>
        </form>
    </div>

            

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>