<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/cad.css" > 
        <title>Cadastro</title>
        <!-- Adicionando JQuery -->
        <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/api_cep.js"></script>

    </head>
    <body>
<center>
      <div class="form-cad-fundo">
        <img src="../wr-lazer/img/logo.png" alt="">
         <div class="form-cad-pt">
            <div class="form-cad-pt2">
                <form action="" method="POST">
                    <input class="caixas-cad" type="name" name="nome" placeholder="NOME"><br>
                    <input class="caixas-cad" type="text" name="sobrenome" placeholder="SOBRENOME"><br>
                    <input class="caixas-cad" type="email" name="email" placeholder="E-MAIL"><br>
                    <input class="caixas-cad" type="text" name="senha" placeholder="SENHA"><br>
                    <input class="caixas-cad" type="text" name="dt_nas" placeholder="DATA DE NASCIMENTO"><br>
                    <select class="caixas-cad" name="select_sex" id="">
                        <option >SELECIONE</option>
                        <?php $SELECT = "SELECT*FROM tb_sexo"; $RESULTADO = mysqli_query($conexao,$SELECT);
                        while($sexo = mysqli_fetch_assoc($RESULTADO)){ ?>
                        <option  value="<?php echo $sexo['id_sexo']; ?>"><?php echo $sexo['sexo']; ?></option>
                        <?php } ?>
                    </select><br><br><br><br><br><br>
             </div>
             <div class="form-cad-pt2">
                <input class="caixas-cad" type="text" name="cpf" placeholder="CPF"><br>
                    <input class="caixas-cad" type="text" name="cep" placeholder="CEP" id="cep" value=""><br>
                    <input class="caixas-cad" type="text" name="rua" placeholder="RUA" id="rua" value=""><br>
                    <input class="caixas-cad" type="text" name="bairro" placeholder="BAIRRO" id="bairro" value=""><br>
                    <input class="caixas-cad" type="text" name="cidade" placeholder="CIDADE" id="cidade" value=""><br>
                    <input class="caixas-cad" type="text" name="uf" placeholder="UF" id="uf" size="2" value=""><br>
                    <input class="caixas-cad" type="text" name="numero_end" placeholder="NUMERO DO ENDEREÇO"><br>
                    <input class="caixas-cad" type="text" name="complemento" placeholder="COMPLEMENTO"><br>
                </form>
             </div>          
         </div>
                  <div class="mov-btn-cad">
                    <input class="btn-cad" type="submit" name="btn_cadastrar" value="CADASTRAR">
                  </div>     
      </div>
    </center>
        <?php 
         require_once 'MetodosDAO.php';
         $wrlazer = new Wrlazer;

         
        if(isset($_POST['btn_cadastrar'])){
            $nome =$_POST['nome'];
            $sobrenome =$_POST['sobrenome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $dt_nas = $_POST['dt_nas'];
            $cpf = $_POST['cpf'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $numero_end = $_POST['numero_end'];
            $complemento = $_POST['complemento'];
            $sexx = $_POST['select_sex'];

            $wrlazer->cadastrar($nome,$sobrenome,$email, $senha,$dt_nas,$cpf,$cep ,$bairro,$rua ,$cidade,$numero_end ,$complemento,$sexx );
        }
        ?>

    </body>
</html>