<?php
    //session_start();
    include './database_connection.php';

    $error = "";
    if (isset($_POST['submit']))  {
        session_start(); // Start the session
        $conn = new mysqli($server,$user,$pass,$database);


        if($conn->connect_error){
            die("Connection failed: ".$conn->connect_error);
            echo "Connection failed";
        }
        else {

            $Email = $_POST["email"];
            $Password=$_POST["password"];
            $Password=md5($Password);
            $_SESSION['email'] = $Email;
            
            // Admin login 
            $stmt = $conn -> prepare("SELECT * FROM `adminn` WHERE `email`=? AND `password`=?");
            $stmt -> bind_param("ss",$Email,$Password);
            $user = null;

            $stmt->execute();

            $result = $stmt->get_result();

            //there will be two options for this coz i have admiin and student interface
            if($result -> fetch_assoc()) {
                header( 'Location: ./admin/view/student.php');
            }
            else {
                echo '<script>alert("Wrong credentials, Please Try again")</script>';
                // $error = " Wrong credentials: User does not exist. Try again";
            }


            //Recruiter login 
            $recruit = $conn -> prepare("SELECT * FROM `recruiter` WHERE `email`=? AND `password`=?");
            $recruit -> bind_param("ss",$Email,$Password);
            $user = null;

            $recruit->execute();

            $result = $recruit->get_result();

            //if true enter into the next page interface
            if($result -> fetch_assoc()) {
                header( 'Location: ./recruiter/view/page1.php');
            }
            else {
                echo '<script>alert("Wrong credentials, Please Try again")</script>';
                // $error = " Wrong credentials: User does not exist. Try again";
            }

        }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Login</title>
</head>

<body>
    <!--Looking the page-->

    <body onload="myFunction()" style="margin:0;">

        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <!--container of sign in as the user-->
            <div class="container">
                <form id="form" class="form" method="POST" >
                    <h1>Login</h1>
                    <?php if (isset($_GET['error'])) { ?>

                    <p class="error">
                        <?php echo $_GET['error']; ?>
                    </p>

                    <?php } ?>

        
                    <div class="form-control">
                        <input type="text" name="email" placeholder="Email Address" id="email" autocomplete="off"
                        value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                        <small id='emailError'></small>
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password" id="password" autocomplete="off"
                        value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" required>
                        <small id='passwordError'></small>
                    </div>
                    <small id='success'></small>
                    <button type="submit" name="submit" id='submitBtn'>Login</button>
                    <p>Forgot your password, Click <a style="color: blue;text-decoration: none;" href="forgot-password.php"> here</a> to reset</p>
                    <h2>Not registered yet! Register <a style="color: blue;text-decoration: none;" href="index.php"> here</a></h2>

                </form>
            </div>


        </div>

        <!--script that allow the page to take sometimes to load for the next page-->
        <script>
            var myVar;

            function myFunction() {
                myVar = setTimeout(showPage, 500);
            }

            function showPage() {
                document.getElementById("loader").style.display = "none";
                document.getElementById("myDiv").style.display = "block";
            }
        </script>


        <!--codes that support the script and jquery library-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="./script.js"></script>

    </body>
    <!--End of a body instrustructions-->

</html>