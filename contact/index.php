<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="./stylecontact.css">
    <title>Recruiters and Students/Graduates</title>
  </head>
  <body>
  <section>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark mt-2">
            <div class="container-fluid">
             <a class="navbar-brand fw-bold" href="#"><img src="../ourlogo.png" alt="Logo image" width="150" height="150"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                      </li>
                  <li class="nav-item">
                    <a class="nav-link" href="../about/about.php">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="index.php">Contact</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <h1>Contact Us</h1>
        <p>Feel free to contact us; we will get back to you shortly.</p>
        <form action="mail.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject">
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input type="submit" value="Send">
        </form>
    </div>
    </div>
  </section>
</body>
</html>