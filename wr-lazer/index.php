<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/index.css">
        <link rel="stylesheet" type="text/css" href="./css/main.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <title>Wrlazer</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ADD8E6;" >
            <div class="container">
                    <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="200px" height="100px" style="image-rendering: pixelated;" ></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="Index">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="https://www.instagram.com/wr.laser/">Contact</a>
                        </li>
                    </ul>
                  
                 
                </div>  
                <div class="icones">
                  <div class="user">
                    <span class="iconify" data-icon="carbon:user-avatar-filled-alt" style="color: black; font-size: 45px;"></span>
                  </div>
                <div class="cart" >
                      <span class="iconify" data-icon="typcn:shopping-cart" style="color: black; font-size: 45px;"></span>
                </div>
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
            </div><br><br>
        </center>
        <div class="slider-principal">
            <img src="./img/cachorro.jpg" width="" height="700px" >     
                <img src="./img/gathorro.jpg" width="" height="700px">
            <img src="./img/gato.jpg" width="" height="700px">               
        </div>
<section class="">
  <footer class="text-center text-white" style="background-color: #ADD8E6;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
            <p class="d-flex justify-content-center align-items-center">
              <span class="me-3" ><p></p> Não possui conta ainda?</span>
              <button type="button" class="btn btn-outline-light btn-rounded">
                Cadastre-se!
              </button>
            </p>
        </section>
      <!-- Section: CTA -->
    </div>
  </footer>
</section>
    </body>
</html>

<style>
    .icones{
        margin-left:auto;
        margin-right:auto;
        display:inline-block;
        width:180px;
    }
    .cart{
        display:inline-block;
    }
    .user{
        display:inline-block;
        margin-right:20px;
    }
</style>