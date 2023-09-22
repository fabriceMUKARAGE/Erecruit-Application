<?php
session_start();

//connect to database class
include_once (dirname(__FILE__)).'/../controllers/form_controller.php';

if(isset($_GET['id'])){
  
  $value = getSingleDetail($_GET['id']);
  $_SESSION['id'] =$value['id'];
  if(empty($value)){
    return false;
  }
}else{

}
$values['id']=$_SESSION['id'];
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
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
          <a href="interview.php" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Check Interview/<br>Status</span>
          </a>
        </li>
        <li>
          <a href="offer.php" class="active">
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
        <span class="user_name">Me</span>
        <i class='bx bx-chevron' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        <div class="info">
      
        </div>
        


        <!--START HEREEEEE formmmmmmm -->
    <div class="col-xl-8">

      <div class="card">

            <div class="card-body pt-3">

        <ul class="nav nav-tabs nav-tabs-bordered">

    <li class="nav-item" >
      <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
    </li>

    

    </ul>


    <div class="tab-content pt-2">
       <div class="tab-pane fade show active profile-overview" id="profile-overview">

        <h5 class="card-title">Profile Details</h5>

        

        <div class="row">
          <div class="col-lg-3 col-md-4 label "> Name</div>
          <div class="col-lg-9 col-md-8"><?= $value['name'] ?> </break></div>

        </div>

        </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label ">Email</div>
            <div class="col-lg-9 col-md-8"> <?= $value['email'] ?></div>
          </div>

          </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">School</div>
            <div class="col-lg-9 col-md-8"><?= $value['school'] ?></div>
          </div>

          </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Major</div>
            <div class="col-lg-9 col-md-8"><?= $value['major'] ?></div>
          </div>

          </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Year</div>
            <div class="col-lg-9 col-md-8"><?= $value['year'] ?></div>
          </div>

          </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Skills</div>
            <div class="col-lg-9 col-md-8"><?= $value['skills'] ?></div>
          </div>

          </br>

          <div class="row">
            <div class="col-lg-3 col-md-4 label">Job </div>
            <div class="col-lg-9 col-md-8"><?= $value['job'] ?></div>
          </div>

        <?php   
         
        $_SESSION['name'] = $value['name'];
        $_SESSION['email'] = $value['email'];
        $_SESSION['job'] = $value['job'];
        $_SESSION['year'] = $value['year'];
        $_SESSION['skills'] = $value['skills'];
        $_SESSION['interview'] = $value['interview'];
       
       


        ?>
          
        </div>


        </div>

        </div>
        </div>

             


          
          <div class="ml-5 mr-5">
          <hr class="my-1">
        <div class="table-responsive" id="showUser">

        </div>
      </div>
      </div>
  </section>

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
            title: 'Welcome!',
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
