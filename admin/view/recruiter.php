<?php
// session_start();
// $Email = $_SESSION['email'];
// echo "Welcome " . $Email;
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
          <a href="student.php" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Pending Students/<br>Graduates</span>
          </a>
        </li>

        <li>
          <a href="approved_student.php" class="active">
            <i class='fas fa-user' ></i>
            <span class="links_name">Approved Students/<br>Graduates</span>
          </a>
        </li>

        <li>
          <a href="recruiter.php">
            <i class='fas fa-user' ></i>
            <span class="links_name">Recruiters</span>
          </a>
        </li>

        <li>
          <a href="offer.php">
            <i class='fas fa-file-pdf' ></i>
            <span class="links_name">Offer letters</span>
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
        <span class="dashboard" style="color: black; font-size: 40px;">Dashboard</span>
      </div>

      <div class="profile-details">
        <img src="../images/profile.jpeg" alt="">
        <span class="admin_name">Admin</span>
        <i class='bx bx-chevron' ></i>
      </div>
    </nav>

    <div class="home-content">
      <div class="display">
        <div class="info">
          <h2>All Recruiters</h2>
        </div>
        <div class="info1">
          <a href="../controller/recruiter.php?export=excel" class="btn btn-info m-1 float-right">
          <i class="fas fa-table fa-lg"></i>&nbsp;&nbsp;Export to Excel</a>
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
    ShowAllUsers();

    function ShowAllUsers() {
          $.ajax({
              url: ["../controller/recruiter.php"],
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

      // Delete ajax request 
      $("body").on("click", ".delBtn", function(e) {
          e.preventDefault();
          var tr = $(this).closest("tr");
          del_id = $(this).attr("id");
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  url: '../controller/recruiter.php',
                  type: 'POST',
                  data: {
                    del_id: del_id
                  },
                success: function(response) {
                  tr.css('background-color', '#ff6666');
                  Swal.fire({
                    title: 'Recruiter deleted successfully!',
                    showConfirmButton: false,
                    type: 'success',
                    icon: 'success',
                    timer: 1800,
                    //timerProgressBar: true,
                  })
                  ShowAllUsers();
                        }
                    });

                }
            })

        });


      // Show users detail  page
      $("body").on("click",".infoBtn",function(event){
          event.preventDefault();
          info_id = $(this).attr("id");
          $.ajax({
            url: "../controller/recruiter.php",
            type: "POST",
            data: {info_id: info_id},
            success: function(response) {
              //console.log(response);
              data = JSON.parse(response);
              Swal.fire({
                title: '<strong>Recruiter info : ID '+data.id+'</strong>',
                type: 'info',
                html: '<b>ID:</b> '+data.id + '<br>' + 
                      '<b>Full Name:</b> '+data.name + '<br>' + 
                      '<b>Email:</b> '+data.email + '<br>' + 
                      '<b>Phone:</b> '+ data.phone + '<br>' + 
                      '<b>Company Name:</b> '+data.company
                      
              })
            }
          });
      });

    })
</script> 

</body>
</html>
