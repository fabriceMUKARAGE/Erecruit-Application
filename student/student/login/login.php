<?php
    session_start();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Student login</title>
</head>

<body>
    <!--Looking the page-->

    <body onload="myFunction()" style="margin:0;">

        <div id="loader"></div>
        <div style="display:none;" id="myDiv" class="animate-bottom">
            <!--container of sign in as the user-->
            <div class="container">
                <form id="form" class="form" action = '../functions/login_Checks.php' method="POST" >
                    <h1>Login</h1>
                    <?php //if (isset($_GET['error'])) { ?>

                    <p class="error">
                        <?php //echo $_GET['error']; ?>
                    </p>

                    <?php //} ?>

                    <div class="form-control">
                        <input type="text" name="email" placeholder="Email Address" id="email" autocomplete="off"
                        value="" required>
                        <small id='emailError'></small>
                    </div>
                    <div class="form-control">
                        <input type="password" name="password" placeholder="Password" id="password" autocomplete="off"
                        value="" required>
                        
                        <small id='passwordError'></small>
                    </div>
                    <small id='success'></small>
                    <button type="submit" name="submit" id='submitBtn'>Login</button>
                    <p>Forgot your password, Click <a style="color: blue;text-decoration: none;" href="forgot-password.php"> here</a> to reset</p>
                    <h2>Not registered yet! Register <a style="color: blue;text-decoration: none;" href="./../../../index.php"> here</a></h2>
        </form>
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
    <!--End of the body instructions-->

</html>