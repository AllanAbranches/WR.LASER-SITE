<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/cadCliente.css"> 
        
        <!-- Adicionando JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script src="./js/api_cep.js"></script>
        
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
    <center>
                    <h1>Cadastrar-se</h1>
                    <br>
            <div class="form-cadCliente">
                <form class="row g-3">
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Nome:</label>
                        <input  name="nome" type="nome" class="form-control" id="inputName" placeholder="Ex:Lucas">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSurname" class="form-label">Sobrenome:</label>
                        <input name="sobrenome" type="sobrenome" class="form-control" id="inputSurname" placeholder="Ex:Oliveira">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Email:</label>
                        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="example@example.com">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Senha:</label>
                        <input name="senha" type="password" class="form-control" id="inputPassword4" placeholder="Insira pelo menos 8 carateres">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputDate" class="form-label">Data de nascimento:</label>
                        <input name="dt_nas" type="date" class="form-control" id="inputDate" placeholder="">
                    </div>
                    <div class="col-md-6">
                        <label for="inputZipcode" class="form-label">Cep:</label>
                        <input name="cep" type="text" class="form-control" id="cep" placeholder="">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputDistrict" class="form-label">Bairro:</label>
                        <input name="bairro" type="text" class="form-control" id="bairro" placeholder="Chacara das garças">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStreet" class="form-label">Rua:</label>
                        <input name="rua" type="text" class="form-control" id="rua" placeholder="Rua flores do jardim">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputCity" class="form-label">Cidade:</label>
                        <input name="cidade" type="text" class="form-control" id="cidade" >
                    </div>
                    <br><br><br><br>
                    <div class="col-md-2" style="margin-top: 40px;">
                    <label for="inputState" class="form-label"  >UF</label>
                        <select name="uf" id="uf" class="form-select" style="width: 50px; height: 30px; ">
                            <option selected></option>
                        </select>
                    </div>
                    <div class="col-12">
                        <button name="btn_cadastrar" type="submit" class="btn btn-success btn-block">Sign in</button>
                    </div>
                </form>
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
            $dt_nas = $_POST['dt_nasc'];
            $cpf = $_POST['cpf'];
            $cep = $_POST['cep'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $cidade = $_POST['cidade'];
            $uf = $_POST['uf'];
            $numero_end = $_POST['numero_end'];
            $complemento = $_POST['complemento'];
            $sexx = $_POST['select_sex'];

            $wrlazer->cadastrar($nome,$sobrenome,$email, $senha,$dt_nasc,$cpf,$cep ,$bairro,$rua ,$cidade,$numero_end ,$complemento,$sexx );
        }
        ?>

    </body>
</html>