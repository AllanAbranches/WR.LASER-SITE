<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/index.css"> 
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                <div class="icones"><div class="user"> 
                    <a href="#"> <span class="iconify" data-icon="carbon:user-avatar-filled-alt" style="color: black; font-size: 45px;"></span></a>
                </div>
                <div class="cart" ><a href="carrinho.php?acao"><span class="iconify" data-icon="typcn:shopping-cart" style="color: black; font-size: 45px;"></span></a>
                </div>
                </div>

            </div>
        </nav>
        <div class="caixa" style="height:200px; margin-left:auto; margin-right:auto; display:block;">
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" >
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="img/img04.jpg" alt="First slide" ">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/img05.jpg" alt="Second slide"style="width:200px;">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="" alt="Third slide" style="width:200px;">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
        <br><br><br>
        <center>
            <div class="exib-prod">
               <?php 
               require_once 'MetodosDAO.php';
               $wrlazer = new Wrlazer;
               $wrlazer->produtos();
               ?>
            </div><br><br>
        </center>
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