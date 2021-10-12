<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        
    </head>
    <body>
        <center>

        <form action="" method="post">
            <input type="email" placeholder="E-mail" name="txt_email"><br>
            <input type="password" placeholder="Senha" name="txt_senha"><br>
            <input type="submit" name="btn_entrar"><br><br><br>
            <a href="cadastro.php">AINDA NAO SE CADASTROU? CADASTRE-SE</a>
        </form>
            
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