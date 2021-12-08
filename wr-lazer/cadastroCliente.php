<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "./css/cadCliente.css"> 
        
        <!-- Adicionando JQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
        <script src="./js/api_cep.js"></script>
        <script src="./js/maskdocument.js"></script>
            <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script>

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
        <title>Cadastro</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ADD8E6;">
    <div class="container">
      <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="200px" height="100px" style=" image-rendering: pixelated;"  ></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </nav>
        <br><br>
        <center>
    <div class="shadow p-3 mb-5 bg-white rounded" style=" width: 550px; ">
            <div style="width: 500px; height: 800px;" ><br>
                <div class="fs-2 mb-3">
                        <h1>CADASTRO</h1><br>
                </div>
                <form class="row g-3" action="" method="POST" >
                    <div class="col-md-6">
                        <label for="inputName" class="form-label">Nome:</label>
                        <input  name="nome" type="nome" class="form-control" id="inputName" placeholder="Insira o seu nome">
                    </div>
                    <div class="col-md-6">
                        <label for="inputSurname" class="form-label">Sobrenome:</label>
                        <input name="sobrenome" type="sobrenome" class="form-control" id="inputSurname" placeholder="Insira o seu sobrenome">
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
                        <label for="inputEmail4" class="form-label">CPF:</label>
                        <input name="cpf" type="cpf" class="form-control" id="inputEmail4" placeholder="Insira somente números">
                    </div>
                    <div class="col-md-6">
                        <label for="inputDate" class="form-label">Data de nascimento:</label>
                        <input id="dtnasc" name="dt_nasc" placeholder="DD/MM/AAAA" class="form-control input-md" required="" type="text" maxlength="10" OnKeyPress="formatar('##/##/####', this)" onBlur="showhide()">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputZipcode" class="form-label">CEP:</label>
                        <input name="cep" type="text" class="form-control" id="cep" placeholder="">
                    </div>
                    <br><br><br><br>
                    <div class="col-md-6">
                        <label for="inputNumberHouse" class="form-label">Nº:</label>
                        <input name="numero_end" type="text" class="form-control" id="numero_end_cliente" placeholder="">
                    </div>
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
                
                    <div class="col-md-2" >
                    <label for="inputState" class="form-label">UF:</label>
                        <select name="uf" class="form-select" id="uf"  style="width: 60px; height: 30px; ">
                            <option selected></option>
                        
                        </select><br><br><br>
                    </div>
                    <div class="col-12">
                        <button style="width: 300px;" name="btn_cadastrar" type="submit" class="btn btn-dark btn-block">Cadastrar-se</button><br><br>
                    </div>
                </form>
                <a href="listarFuncionario.php?pagina=1"></a>
            </div>
        </center>
    </div>
    <section class="">
  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: #ADD8E6;" >
    <!-- Grid container -->
    <div class="container p-4 pb-0"  >
      <!-- Section: CTA -->
      <section class="">
        <p class="d-flex justify-content-center align-items-center">
          <span class="me-3"><p></p> Entre com a sua conta: <p></p></span>
          <input type="submit" name="btn_cadastrar" class="btn btn-outline-light btn-rounded" >
            <a style="color: white;" href="login.php">Login</a>
          </button>
        </p>
      </section>
      <!-- Section: CTA -->
    </div>
    <!-- Grid container -->

  </footer>
  <!-- Footer -->
</section>
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

            $wrlazer->cadastrarCliente($nome,$sobrenome,$email, $senha,$dt_nasc,$cpf,$cep ,$bairro,$rua ,$cidade,$numero_end ,$complemento,$sexx );
        }
        ?>

    </body>
</html>