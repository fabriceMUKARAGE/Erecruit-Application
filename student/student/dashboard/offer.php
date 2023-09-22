<?php
session_start();
//$values['id']=$_SESSION['id'] ;
$value['name']=$_SESSION['name'] ;
$value['email']=$_SESSION['email'] ;
$value['year']=$_SESSION['year'] ;
$value['skills']=$_SESSION['skills'] ;
$value['job']=$_SESSION['job'] ;
$values['id']=$_SESSION['id'];
$value['interview']=$_SESSION['interview'];

include '../../../database_connection.php';
include_once (dirname(__FILE__)).'/../controllers/form_controller.php';

if(isset($_GET['id'])){
  
  $value = getSingleDetail($_GET['id']);
  if(empty($value)){
    return false;
  }
}else{
  
}


error_reporting(0);

session_start();

// if (isset($_SESSION['name'])) {
//     header("Location: ./account.php");
// }

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];  
    
    $job=$_POST['job'];

    //Resume
    if (isset($_FILES['pdf_file']['name']))
        {
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];

        move_uploaded_file($file_tmp,"./pdf/".$file_name);
        
        $errors = array();

        $file_extension = pathinfo($resume, PATHINFO_EXTENSION);
        if ($file_extension != "pdf") {
            $errors[] = "Invalid file format. Only pdf is allowed";
        }

                            $sql = "INSERT INTO offer (name, email, job, letter)
                                VALUES ('$name','$email','$job','$file_name')";
                            $result = mysqli_query($conn, $sql);
                            if ($result) {
                                echo '<script>
                                window.location="./offer.php";
                                
                                </script>';
                                
                            }
                        
                    else if( !empty($file_name)) {
                        echo "<script>alert('All inputs must be filled.')</script>";
                    }
            
    }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Offer</title>
    <link rel="stylesheet" href="../style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.css" />
    <!-- Boxicons CDN Link -->
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="sidebar">
    <ul class="nav-links">
      <li>
          <a href="account.php?id=<?php echo $values['id'];?>">
            <i class='fas fa-user' ></i>
            <span class="links_name">My Account</span>
          </a>
        </li>
        <li>
          <a href="interview.php?id=<?php echo $values['id'];?>" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Check Interview/<br>Status</span>
          </a>
        </li>
        <li>
          <a href="offer.php?id=<?php echo $values['id'];?>" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Report Offers/<br>Hires</span>
          </a>
        </li>

        <li>
       
          <a href="account_update.php" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Update My Account</span>
          </a>
        </li>

        <li class="log_out">
          <a href="../../../index.php">
            <i class='bx bx-log-out'></i>
            <span class="links_logout" style="font-size: 20px;">Sign out</span>
          </a>
        </li>
      </ul>
  </div>
  <section class="home-section">
    <nav>
      <div class="sidebar-button">
        <i class='bx bx-menu sidebarBtn'></i>
        <span class="dashboard" style="color: black; font-size: 40px;">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="../images/profile.jpeg" alt="">
        <span class="admin_name">Me</span>
        <i class='bx bx-chevron' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        
          <h4>Received an offer? Kindly upload here</h4>
        </div>
        <div class="container">
        <form method="POST" action=" " id="form" class="form" enctype="multipart/form-data" action="./request.php">

        <div class="form-control">
                <input type="text" placeholder="Enter name" name="name" id="name"
                value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
                <small id='nameError'></small>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Enter Email" name="email" id="email"
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                <small id='emailError'></small>
            </div>
            
            <div class="form-control">
                      <input type="text" placeholder="Role Title" name="job" id="job"
                      value="<?php echo isset($_POST['job']) ? $_POST['job'] : ''; ?>" required>
                      <small id='jobError'></small>
            </div>
                  <div class="form-control">
                  <label for="resume">Offer Letter(PDF only):</label>
                  <input type="file" name="pdf_file"
                      class="form-control" accept=".pdf"
                      title="Upload PDF"/>
                      <small id='fileError'></small>
                  </div>

            <small id='success'></small>
            <br> <br>
            <button type="submit" name="submit" id='submitBtn'>Submit</button>
            
        </form>

      
      <div class="ml-5 mr-5">
      <hr class="my-1">
    <div class="table-responsive" id="showUser">

    </div>
  </div>
  </div>
  </section>
                <style> #submitBtn {
                background-color: #4CAF50;
                color: white;
                padding: 10px 20px;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                font-weight: bold;
                cursor: pointer;
              }

              #submitBtn:hover {
                background-color: #3e8e41;
              }
              </style>
  

  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="script.js"></script>

  <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
      sidebar.classList.toggle("active");
      if(sidebar.classList.contains("active")){
      sidebarBtn.classList.replace("bx-menu" ,"bx-menu-alt-right");
    }else
      sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    }
</script>
 
<script type="text/javascript">
$(document).ready(function() {
    
    Swal.fire({
            title: 'Submitted! Thank you',
            showConfirmButton: false,
            type: 'success',
            icon: 'success',
            timer: 1000,
            timerProgressBar: true,
        })

    })
</script> 

</body>
</html>
