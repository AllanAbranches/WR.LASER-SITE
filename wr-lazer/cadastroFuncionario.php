<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <title>Cadastro de funcionario</title>
    </head>
    <body>
        <center>
            <div class="box">
        <div class="container">
            <br>
            <form action="" method="post" class="shadow p-3 mb-5 bg-white rounded">
                <div class="form-row">
                <h1>Cadastrar funcionario</h1>
                    <div class="form-group col-md-6">
                        <input type="name" name="nome" class="form-control" placeholder="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" name="sobrenome" class="form-control" placeholder="Sobrenome">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
    
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">

                        <input type="text" name="cpf" class="form-control" placeholder="CPF" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 nasc">
                        <label>Data de Nascimento</label>
                            <input type="date" name="nasc" placeholder="Data de Nascimento">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCity">Data de Contrataçao
                            </label>
                            <input type="date" name="contratacao" placeholder="Data de Nascimento">
                        </div>
                    </div>
                    <div class="form-group col-md-12 cargo">
                        <select name="select_cargo" id="inputState" class="form-control">
                            <option selected="selected">Selecione o Cargo</option>
                            <?php $SELECT = "SELECT*FROM tb_cargo"; 
                            $RESULTADO = mysqli_query($conexao,$SELECT);
                    while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                            <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nome_cargo']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <fieldset class="form-group col-md-12">
                        <div class="row">
                            <legend class="col-form-label col-sm-1 pt-0">Sexo</legend>
                            <div class="col-sm-4">
                                <div class="form-check">
                                    <input class="form-check-input" name="sexo" type="radio" value="Masculino"/>
                                    <label class="form-check-label" for="gridRadios1">Masculino</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" name="sexo" type="radio" value="Feminino"/>
                                    <label class="form-check-label" for="gridRadios1">Feminino</label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <input value="Cadastrar" type="submit" name="btn_cadd" class="btn btn-primary btn-lig"/><p></p>
                    <a  style="margin-left: 10px;" href="listarFuncionario.php?pagina=1" type="button" class="btn btn-success btn-lig">Listar</a>
            </form><br><br>
            </div>
        </div>
    </center>
        </body>
    </html>
    <style>

        .container {
           width:420px;
           margin-left:auto;
           margin-right:auto;
           margin-top:80px;
           height:500px;
           border-radius: 0.25rem;
        }
        .listagem{

            width:500px;
            font-size:10px;
            margin-left:auto;
            margin-right:auto;
        }
        .box{
            margin-left:auto;
            margin-right:auto;
            display:block;
            width:1340px;
        }
        input[type="date"]{
            margin:2px;
            display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}

.tag_a{
    padding:8px;
    font-size:16px;
    margin:3px;
    border:1px solid black;
    background-color:black;
    color:white;
    text-decoration:none;
}

.tag_a:hover{
    padding:8px;
    font-size:16px;
    margin:3px;
    border:1px solid black;
    background-color:black;
    color:red;
    text-decoration:none;
}


    </style>
    <?php
        require_once 'MetodosDAO.php';
        $wrlazer = new Wrlazer;
        if(isset($_POST['btn_cadd'])){
            
            $select_cargo =$_POST['select_cargo'];
            //$salario =$_POST['salario'];
            $funcionario =$_POST['nome'];
            $sobrenome =$_POST['sobrenome'];
            $email =$_POST['email'];
            $cpf =$_POST['cpf'];
            $nasc =$_POST['nasc'];
            $sexo =$_POST['sexo'];
            $contratacao =$_POST['contratacao'];

            $wrlazer->cadastro_funcionario($select_cargo,$funcionario,$sobrenome,$email,$cpf,$nasc,$sexo,$contratacao);
            
        }



//INSERT INTO `bd_wrlazer`.`tb_funcionario` (`nome_funcionario`, `sobrenome_funcionario`,`email_funcionario`, `cpf_funcionario`, `senha_funcionario`, `dt_nascimento_funcionario`, `sexo_funcionario`, `dt_contratacao_funcionario`, `fk_cargo`) VALUES ('João', 'Silva','lovato.py@gmail.com', '019.791.970-75', '1234565', '2000-06-17', 'M', '2007-02-16', '1');
?>