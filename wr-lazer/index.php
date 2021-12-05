<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/index.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Wrlazer</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary  " >
            <div class="container">
                    <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="180px" height="80px" style="image-rendering: pixelated;" ></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br>
        <center>
            <div class="exib-prod">
               <?php 
               require_once 'MetodosDAO.php';
               $wrlazer = new Wrlazer;
               $wrlazer->produtos();
               ?>
            </div>
     
        </center>
<section class="">
  <footer class="text-center text-white bg-secondary" style="background-color: black;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
              <span class="me-3" ><p></p>  Register for free</span>
              <button type="button" class="btn btn-outline-light btn-rounded">
                Sign up!
              </button>
            </p>
        </section>
      <!-- Section: CTA -->
    </div>
  </footer>
</section>
    </body>
</html>
