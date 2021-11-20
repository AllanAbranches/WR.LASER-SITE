<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/log.css" >
        <title>Login</title>

        
    </head>
    <body>
        <center>
    <div class="form-log-fundo">
        <img src="../wr-lazer/img/logo.png" alt="">
        <div class="form-log-pt">
            <form action="" method="post">
                <input class="caixas-log" type="email" placeholder="E-mail" name="txt_email"><br>
                <input class="caixas-log" type="password" placeholder="Senha" name="txt_senha"><br>
            </form>
            <input class="caixas-log" type="submit" name="btn_entrar"><br><br><br>
                <a class="link-log" href="cadastro.php">AINDA NAO SE CADASTROU? CADASTRE-SE</a>
                
        </div>
    </div>
       
        </center>
        
        <?php            
            require_once 'MetodosDAO.php';
            $wrlazer = new Wrlazer;
            session_start();

            if(isset($_SESSION["logado"])&& $_SESSION["logado"]==true){
                header("Location:index.php");
                exit;
            }

        if (isset($_POST['btn_entrar'])) {
            $email = $_POST['txt_email'];
            $senha = $_POST['txt_senha'];
            $email = mysqli_real_escape_string($conexao,$email);
            $senha = mysqli_real_escape_string($conexao,$senha);

            $wrlazer->logar($email, $senha);
        }
        ?>
    </body>
</html>