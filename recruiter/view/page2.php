<?php
// session_start();
// $Email = $_SESSION['email'];
// echo "Welcome " . $Email;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title>Hiring</title>
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
          <a href="#" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Students in the system</span>
          </a>
        </li>

        <li class="log_out">
          <a href="../../index.php">
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
        <span class="dashboard" style="color: black; font-size: 40px;">Hire Students/Graduates</span>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        <div class="info">
          <h4 style="color:#2B5105">Check them by their:</h4>
          <a href="./page3.php"><button style="background-color: #4CAF50; color: white; padding: 12px; font-size: 16px; border: none; cursor: pointer;" type="submit" id='connect'>Resumes</button></a>
          <a href="./page2.php"><button style="background-color: #4CAF50; color: white; padding: 12px; font-size: 16px; border: none; cursor: pointer;" type="submit" id='connect'>Skills</button></a>


          <select id="major" aria-label="Major of Study" onchange="redirectToPage()">
            <option value="">Select a major</option>
            <option value="cs.php">Computer Science</option>
            <option value="ce.php">Computer Engineering</option>
            <option value="ba.php">Business Administration</option>
            <option value="me.php">Mechanical Engineering</option>
            <option value="ee.php">Electrical and Electronics Engineering</option>
            <option value="mis.php">Management Information System</option>
          </select>

          <style>
            /* Style the select element */
            select {
              background-color: #4CAF50;
              color: white;
              padding: 12px;
              font-size: 16px;
              border: none;
              cursor: pointer;
            }
            
            /* Style the options in the select */
            option {
              background-color: #dee2e6;
              border: none;
              padding: 8px 16px;
              font-size: 16px;
              color: #333;
            }
          </style>

          <script>
          function redirectToPage() {
            var selectBox = document.getElementById("major");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue === "ce.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "cs.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "me.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "ee.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "ba.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "mis.php") {
              window.location.href = selectedValue;
            }
          }
          </script>


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
    

    ShowAllUsers();

    function ShowAllUsers() {
          $.ajax({
              url: ["../controller/page2.php"],
              type: "POST",
              data: {
                  action: "view"
              },
              success:function(response) {
                  // console.log(response);
                  $("#showUser").html(response);
                  $("table").DataTable();
              }
          });
      }

      // informing candidate about the interview 
      $("body").on("click", ".delBtn", function(e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          del_id = $(this).attr("id");
          Swal.fire({
            title: 'Are you sure you want to invite the candidate for the interview?',
            text: "The candidate will be notified when you confirm this!",
            showCancelButton: true,
            confirmButtonColor: '#2B5105',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Confirm!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  url: '../controller/page2.php',
                  type: 'POST',
                  data: {
                    del_id: del_id
                  },
                success: function(response) {
                  tr.css('background-color', '#ff6666');
                  Swal.fire({
                    title: 'Confirmed, Student will be notified about the invite!',
                    showConfirmButton: false,
                    type: 'success',
                    icon: 'success',
                    timer: 3500,
                    //timerProgressBar: true,
                  })
                  ShowAllUsers();
                        }
                    });

                }
            })

        });

    })
</script> 

</body>
</html>
