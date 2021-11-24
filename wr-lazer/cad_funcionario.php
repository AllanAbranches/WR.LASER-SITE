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
        <title>Document</title>
    </head>
    <body>
        <h1>CADASTRO DE FUNCIONÁRIO
        </h1>

        <form action="" method="post" class="frm">

            <input type="text" name="funcionario" placeholder="Nome do Funcionario">
            <input type="text" class="sobrenome" name="sobrenome" placeholder="Sobrenome">
            <input type="text" name="email" placeholder="E-mail">
            <input type="text" name="cpf" placeholder="CPF">
            <br>
            <center>
                <label for="">Nascimento</label><input type="date" name="nasc" placeholder="Data de Nascimento"><br>
                <br>

                <td>Sexo:</td>
                <td><input checked="checked" name="sexo" type="radio" value="Masculino"/>
                    Masculino
                    <input name="sexo" type="radio" value="Feminino"/>
                    Feminino
                    <span class="style1">*</span>
                </td>

                <br>
                <label for="">Contratação</label><input type="date" name="contratacao" placeholder="Data de Contrataçao">
            </center>
            <br>
            <select name="select_cargo" id="">
                <option >SELECIONE</option>
                <?php $SELECT = "SELECT*FROM tb_cargo"; $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nome_cargo']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="btn_cadd" value="CADASTRAR">
            
        </form>
     
    </body>
</html>

<style>
    input[type="text"],
    input[type="date"],
    input[type="submit"],
    select {
        margin-left: auto;
        margin-right: auto;
        display: block;
        padding: 8px;
    }
    .frm{
 
        margin-left:auto;
        margin-right:auto;
        display:block;
    }
    .sobrenome{
        display:block;
    }
</style>
<?php
        require_once 'MetodosDAO.php';
        $wrlazer = new Wrlazer;
        if(isset($_POST['btn_cadd'])){
            
            $select_cargo =$_POST['select_cargo'];
            //$salario =$_POST['salario'];
            $funcionario =$_POST['funcionario'];
            $sobrenome =$_POST['sobrenome'];
            $email =$_POST['email'];
            $cpf =$_POST['cpf'];
            $nasc =$_POST['nasc'];
            $sexo =$_POST['sexo'];
            $contratacao =$_POST['contratacao'];

            $wrlazer->Cadastro_manufaturado($select_cargo,$funcionario,$sobrenome,$email,$cpf,$nasc,$sexo,$contratacao);
        }



//INSERT INTO `bd_wrlazer`.`tb_funcionario` (`nome_funcionario`, `sobrenome_funcionario`,`email_funcionario`, `cpf_funcionario`, `senha_funcionario`, `dt_nascimento_funcionario`, `sexo_funcionario`, `dt_contratacao_funcionario`, `fk_cargo`) VALUES ('João', 'Silva','lovato.py@gmail.com', '019.791.970-75', '1234565', '2000-06-17', 'M', '2007-02-16', '1');
?>