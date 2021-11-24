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
        <img class="logo-log" src="../wr-lazer/img/logo.png" alt="">
        <div class="form-log-pt">
            <form action="" method="post">
                <input class="caixas-log" type="email" placeholder="E-mail" name="txt_email"><br>
                <input class="caixas-log" type="password" placeholder="Senha" name="txt_senha">
                <input class="btn-log" type="submit" name="btn_entrar" value="ENTRAR">
            </form>
            <div class="mov-btn-log">
                
                <a class="link-log" href="cadastro.php">AINDA NAO SE CADASTROU? CADASTRE-SE</a>
                
            </div> 
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

<style>

body{
    margin: 0;
}

.form-log-fundo{
    width: 600px;
    height: 500px;
    margin-top: 50px;
    background-color: #3a3a3a;
    border-radius:20px ;
}

.form-log-pt{
    padding: 0px 10px 0px 0px;

}


.caixas-log{
    width: 180px;
    padding: 8px;
    margin-top: 10px;
}

.btn-log{
margin-left:auto;
margin-right:auto;
display:block;
}
.logo-log{
    margin-top: 5px;
}

.link-log{
    font-size: 10px;
    color:aliceblue;
    text-decoration: none;
}

*/
</style>