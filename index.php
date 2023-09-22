<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="./index.css">
    <title>Recruiters and Students/Graduates</title>
  </head>
  <body>
  <section>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark mt-2">
            <div class="container-fluid">
             <a class="navbar-brand fw-bold" href="#"><img src="ourlogo.png" alt="Logo image" width="150" height="150"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Home</a>
                      </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./about/about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="./contact/index.php">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
    </div>
    <div class="displaying">
        <div class="txt">
            <p><span>Connecting Recruiters <br>and Students/Graduates</span></p>
            <a class="bt"  href="./login.php"><button style="background-color: #3c3c3c; color: white; padding: 5px 10px; border-radius: 5px;" type="submit" id='connect'>Login</button></a><br>
            
            <select id="user" aria-label="users" onchange="redirectToPage()">
            <option value="">Register As</option>
            <option value="student/register/register.php">Student</option>
            <option value="recruiter/register/register.php">Recruiter</option>
          </select>

          <style>
            /* Style the select element */
            select {
              padding: 12px;
              font-size: 33px;
              border: none;
              cursor: pointer;
              background-color: #3c3c3c; 
              color: white; 
              padding: 5px 10px; 
              border-radius: 5px;
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
            var selectBox = document.getElementById("user");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue === "student/register/register.php") {
              window.location.href = selectedValue;
            }
            if (selectedValue === "recruiter/register/register.php") {
              window.location.href = selectedValue;
            }
          }
          </script>

        </div>
    </div>
  </section>
  <section></section>
</body>
</html>