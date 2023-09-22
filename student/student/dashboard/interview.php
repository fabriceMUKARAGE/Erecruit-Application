<?php
session_start();

include_once (dirname(__FILE__)).'/../controllers/form_controller.php';
//$values['id']=$_SESSION['id'] ;
$value['name']=$_SESSION['name'] ;
$value['email']=$_SESSION['email'] ;
$value['year']=$_SESSION['year'] ;
$value['skills']=$_SESSION['skills'] ;
$value['job']=$_SESSION['job'] ;
$values['id']=$_SESSION['id'];
$value['interview']=$_SESSION['interview'];
//connect to database class
//include_once (dirname(_FILE_)).'/../controllers/form_controller.php';

if(isset($_GET['id'])){
  
  $value = getSingleDetail($_GET['id']);
  if(empty($value)){
    return false;
  }
}else{
  
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Notification</title>
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
        <span class="user_name">Me</span>
        <i class='bx bx-chevron' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        <div class="info">
      
        </div>
        

        <!--START HEREEEEEEEEEEEEEEEEEEEEEEEEEEEE -->



        <div class="tab-content pt-2">

  <h5 class="card-title">Your Interview Invitations will appear Here</h5>


  <div class="row">
    
    <div class="col-lg-9 col-md-8"><?= $value['interview'] ?></div>
  </div>
  
</div>
</div>

      <!-- END HEREEEEEEEEEEEEEEEEEEEEEEE -->


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
 
<!-- <script type="text/javascript">
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
</script>  -->

</body>
</html>
