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
    <title>Student registration</title>
</head>
<body>
    <div class="container">
        <form method="POST" action=" " id="form" class="form" enctype="multipart/form-data" action="./request.php">
            <h2 style="color:black">Student Registration</h2>
            <div class="form-control">
                <input type="text" placeholder="Enter Full Name" name="name" id="name"
                value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
                <small id='nameError'></small>
            </div>
            <div class="form-control">
                <input type="text" placeholder="Enter Email" name="email" id="email"
                value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
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
            <div class="form-control">
                    <label for="Major"> Select Your School</label>
                    <select name="school" id="school">
                    <option value="">Select University</option>
                    <option value="Ashesi University">Ashesi Univeristy</option>
                    <option value="KNUST">KNUST</option>
                    <option value="Legon University">Legon University</option>
                    </select>
                <small id='schoolError'></small>
            </div>
            <div class="form-control">
                    <label for="Major"> Select Your Major of Study</label>
                    <select name="major" id="major">
                    <option value="">Select the Major</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                    <option value="Electrical And Electronics Engineering">Electrical And Electronics Engineering</option>
                    <option value="Computer Science">Computer Science</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="Management Information System">Management Information System</option>
                    </select>
                <small id='majorError'></small>
            </div>
            <div class="form-control">
                    <label for="Major"> Select Your Year</label>
                    <select name="year" id="year">
                    <option value="">Select the Year</option>
                    <option value="Year 1">Year 1</option>
                    <option value="Year 2">Year 2</option>
                    <option value="Year 3">Year 3</option>
                    <option value="Year 4">Year 4</option>
                    <option value="Graduate">Graduate</option>
                    </select>
                <small id='yearError'></small>
            </div>
    
            <label for="Major"> Select Your Main Skills</label>
            <div class="form-control" id="itemList" style="display: flex;flex-direction:row; font-size:xx-small; font-weight:200 " >
                <input type="checkbox" name="skills[]" id="2" value="Business skills">
                <label for="item2">Business Skills</label>
                <input type="checkbox" name="skills[]" id="3" value="Web Design">
                <label for="item3">Web Design</label>
                <input type="checkbox" name="skills[]" id="4" value="Marketing">
                <label for="item4">Marketing</label>
                <input type="checkbox" name="skills[]" id="5" value="Problem Solving">
                <label for="item5">Problem solving</label>     
                <small id='skillsError'></small>
                <input type="checkbox" name="skills[]" id="6" value="Leadership">
                <label for="item6">Leadership</label>
                <input type="checkbox" name="skills[]" id="9" value="Programming">
                <label for="item9">Programming</label>
                <input type="checkbox" name="skills[]" id="10" value="Engineerin Skills">
                <label for="item10">Engineering skill</label>      
                <small id='skillsError'></small>
            </div>              
            

            <div class="form-control">
                <input type="text" placeholder="Enter Job/internship interested in" name="job" id="job"
                value="<?php echo isset($_POST['job']) ? $_POST['job'] : ''; ?>" required><br>
                <small id='jobError'></small>
            </div>
            <div class="form-control">
            <label for="resume">Upload Your Resume with your Firstname_Lastname.pdf</label>
            <input type="file" name="pdf_file"
                 class="form-control" accept=".pdf"
                 title="Upload PDF"/>
                <small id='fileError'></small>
            </div>

            <small id='success'></small>
            <button type="submit" name="submit" id='submitBtn'>Register</button>
            <h2>Already registered! Login<a style="color: blue; text-decoration: none;" href="../student/login/login.php"> here</a></h2>
        </form>
    </div>


<?php 
    include '../../database_connection.php';
    error_reporting(0);

    session_start();

    if (isset($_SESSION['name'])) {
        header("Location: ./request.php");
    }

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];  
        $password = md5($_POST['password']);
        $cpassword = md5($_POST['password2']);
        $school=$_POST['school'];  
        $major=$_POST['major'];
        $year=$_POST['year'];
        
        //sending skills into the database
        $skills=$_POST['skills'];
        $newskills= implode(',', $skills);
        
        //job or internship interested in
        $job=$_POST['job'];

        //Resume
        if (isset($_FILES['pdf_file']['name']))
            {
            $file_name = $_FILES['pdf_file']['name'];
            $file_tmp = $_FILES['pdf_file']['tmp_name'];
    
            move_uploaded_file($file_tmp,"./../../recruiter/resume/".$file_name);
            
            $errors = array();


            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }

            $file_extension = pathinfo($resume, PATHINFO_EXTENSION);
            if ($file_extension != "pdf") {
                $errors[] = "Invalid file format. Only pdf is allowed";
            }

            $sql = "SELECT * FROM student WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                    if(!empty($school) && !empty($major) && !empty($year) && !empty($newskills) && !empty($file_name)){
                            if ($password == $cpassword) {
                                $sql = "INSERT INTO student (name, email, password, school, major, year, skills, job, resume)
                                    VALUES ('$name','$email','$password','$school','$major','$year','$newskills','$job','$file_name')";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo '<script>
                                    window.location="./request.php";
                                    
                                    </script>';
                                    
                                }
                            }     
                            else {
                                echo "<script>alert('Password Not Matched.')</script>";
                            }
                        }

                        else if(empty($school) || empty($major) || !empty($year) || !empty($skills) || !empty($file_name)) {
                            echo "<script>alert('All inputs must be filled.')</script>";
                        }
                }
                else{
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                        echo "<script>alert('Invalid email.')</script>";

                    }
                }

            }
            else {
                echo "<script>alert('Woops! Email Already Exists.')</script>";
              }
                
        }
    }
?>
            
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="./script.js"></script>
</body>
</html>