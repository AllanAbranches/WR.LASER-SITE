<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
        <link rel="stylesheet" href="./css/log.css">
    <title>Login</title>
    </head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary " >
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="180px" height="80px" style=" image-rendering: pixelated;"  ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      </div>
    </nav>

    <div  style="background-color: white; " id="logreg-forms">
        <!--FORMULARIO LOGIN-->
        <form action="" class="form-signin" method="POST" >
                <center>
                <div class="fs-2 mb-3">
                    
                        <h1>LOGIN</h1><br>
                </div>
                    <button class="btn btn-outline-primary" style="width: 180px;" type="button"><span ><i class="fab fa-facebook-f"></i>  Facebook</span></button>
                    <button class="btn btn-outline-danger" style="width: 180px;" type="button"><span><i class="fab fa-instagram" ></i>  Instagram</span></button>
                </center>
                <br>
                <p style="text-align:center"> OR  </p>
                  <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Insira seu email" required="" autofocus=""> <br>
                  <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Insira sua senha" required="">
                <button class="btn btn-dark btn-block" style="color: white;" name="btn_entrar" type="submit"><i class="fas fa-sign-in-alt"></i> Sign in</button>
             <div class="social-login">
            
            <a style="color: blue;" href="" id="forgot_pswd">Esqueceu sua senha?</a>
           
            </div>
            <hr>
            
            <!-- <p>Don't have an account!</p>  -->
            <a href="cadastroCliente.php" style="color: black;"  class="btn btn-outline-dark btn-block" type="submit" name="btn_newAccount" id="btn-signup"><i class="fas fa-user-plus"></i> Sign up</a>
        </form>
        <!--FORMULARIO LOGIN-->
            <form action="/reset/password/" class="form-reset">
                <input type="email" id="resetEmail" class="form-control" placeholder="Email address" required="" autofocus="">
                <button class="btn btn-primary btn-block" type="submit">Reset Password</button>
                <a href="#" id="cancel_reset"><i class="fas fa-angle-left"></i> Back</a>
            </form>
     </div>

    <section class="">
  <!-- Footer -->
  <footer class="text-center text-white bg-secondary" style="background-color: black;">
    <!-- Grid container -->
    <div class="container p-4 pb-0">
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3" >Os melhores preços e os produtos da melhor qualidade, aqui na WR.LASER</span>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

  </footer>
  <!-- Footer -->
</section>
</body>
</html>
<?php            
    require_once 'MetodosDAO.php';
    $wrlazer = new Wrlazer;
    session_start();
    if(isset($_SESSION["logado"])&& $_SESSION["logado"]==true){
       header("Location:index.php");
       exit;
    }
    if (isset($_POST['btn_entrar'])) {
       $email = $_POST['email'];
       $senha = $_POST['senha'];
       $email = mysqli_real_escape_string($conexao,$email);
       $senha = mysqli_real_escape_string($conexao,$senha);
       $wrlazer->logar($email, $senha);
     }
        ?>
