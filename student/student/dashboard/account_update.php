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
 

if(isset($_GET['id'])){
  
  $value = getSingleDetail($_GET['id']);
  if(empty($value)){
    return false;
  }
}else{
   
}


//connect to the form class
//include_once (dirname(_FILE_)).'/../controllers/form_controller.php';
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

function updateForm($id,$name, $email, $year, $skills, $job){
    // Create new form object
    $form = new Form;

    // Run query
    
$runQuery = $form->update($id,$name, $email, $year,$skills, $job);

    if($runQuery){
        return $runQuery;
    }else{
        return false;
    }
}




$details = getDetails();

foreach($details as $key => $values){}


// when the button is clicked

if(isset($_POST['submit'])){
        // take the data from the form

        $name = $_POST['name'];
        $email = $_POST['email'];  
        $year=$_POST['year'];
        $skills=$_POST['skills'];
        $job=$_POST['job'];
        $id=$values['id'];
        $updatedProfile =updateForm($id,$name, $email, $year, $skills, $job);

        if($updatedProfile){ 
        session_start();
        header("Location: account.php?id=". $values['id'] );  
        
        die; 
            
        }else{
          return false;
        }
    }

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Update your account</title>
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
        

  
    <!-- <div class="col-xl-8"> -->

      <div class="card">
      
            
            </div>
            
                 
            <!-- <div class="container"> -->
        <form method="POST" action=" " id="form" class="form" enctype="multipart/form-data" >
            <h3 style="color:black">Account Update</h3>

            <label for="name"> Name</label>
            <div class="form-control">
                <input type="text"  name="name" id="name"
                value="<?= $value['name'] ?> " required>
                <small id='nameError'></small>
            </div>
            <label for="Major"> Email</label>
            <div class="form-control">
                <input type="text" placeholder="Enter Email" name="email" id="email"
                value="<?=$value['email'] ?> " required>
                <small id='emailError'></small>
            </div>

            <label for="Major"> Year level</label>

            <div class="form-control">
                <input type="text" placeholder="Update Year" name="year" id="year"
                value=" <?=$value['year']?> " required>
                <small id='emailError'></small>
            </div>
    
            <label for="Major"> Your skills</label>
            
            <div class="form-control">
                <input type="text" placeholder="Enter your skills" name="skills" id="skills"
                value=" <?=$value['skills']?> " required>
                <small id='emailError'></small>
            </div>
            
            <label for="jor"> Job interested in</label>
            <div class="form-control">
                <input type="text" placeholder="Enter Job/internship interested in" name="job" id="job"
                value=" <?=$value['job'] ?> " required>
                <small id='jobError'></small>
            </div><br>
            

            
            <div class="text-center">
            <button type="submit" name="submit" id='submitBtn'>Save Changes</button>
            </div>
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
        </form>
    </div>
<!-- End Update Form -->

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
 


</body>
</html>
