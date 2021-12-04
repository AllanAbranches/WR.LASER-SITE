<?php include "conexao.php";
$id = filter_input(INPUT_GET,'id');
$select = "SELECT ID_FUNCIONARIO,
NOME_FUNCIONARIO,
SOBRENOME_FUNCIONARIO,
CPF_FUNCIONARIO ,
EMAIL_FUNCIONARIO ,
SENHA_FUNCIONARIO ,
DT_NASCIMENTO_FUNCIONARIO ,
SEXO_FUNCIONARIO,
DT_CONTRATACAO_FUNCIONARIO,
NOME_CARGO ,
SALARIO_CARGO
FROM TB_FUNCIONARIO
INNER JOIN TB_CARGO on TB_FUNCIONARIO.FK_CARGO = TB_CARGO.ID_CARGO WHERE id_funcionario = '$id'";
$query = mysqli_query($conexao, $select);
$row  = mysqli_fetch_assoc($query);

?>
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
    <title>Editar Funcionário</title>
</head>
<body>
    <div class="container">

<h1>ALTERAR DADOS FUNCIONARIO</h1>
<form action="" method="post" class="frm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="name" name="nome" class="form-control" placeholder="nome" value="<?php echo $row['NOME_FUNCIONARIO'];?>">
                    </div>
                    <div class="form-group col-md-6">
                        <input
                            type="text"
                            name="sobrenome"
                            class="form-control"
                            placeholder="Sobrenome" value="<?php echo $row['SOBRENOME_FUNCIONARIO'];?>">
                    </div>
                </div>
                <div class="form-group"">
                    <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $row['EMAIL_FUNCIONARIO'];?>">
                </div>
                <div class="form-group">
    
                    <input type="text" class="form-control" name="senha" placeholder="Password">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">

                        <input type="text" name="cpf" class="form-control" placeholder="CPF" value="<?php echo $row['CPF_FUNCIONARIO'];?>" >
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12 nasc">
                        <label>Data de Nascimento</label>
                            <input type="date" name="nasc" placeholder="Data de Nascimento" value="<?php echo $row['DT_NASCIMENTO_FUNCIONARIO'];?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="inputCity">Data de Contrataçao
                            </label>
                            <input type="date" name="contratacao"  value="<?php echo $row['DT_CONTRATACAO_FUNCIONARIO'];?>">
                        </div>
                    </div>
                    <div class="form-group col-md-12 cargo">
                        <select name="select_cargo" id="inputState" class="form-control" >
                            <option selected="selected" value="<?php echo $row['NOME_CARGO'];?>">Selecione o Cargo</option>
                            <option>Atual - <?php echo $row['NOME_CARGO'];?></option>
                            <?php $SELECT = "SELECT*FROM tb_cargo"; $RESULTADO = mysqli_query($conexao,$SELECT);
                    while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                            <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nome_cargo']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                    <legend class="col-form-label col-sm-0">Sexo atual:</legend>
                    <input type="text"  value="<?php echo $row['SEXO_FUNCIONARIO'];?>" disabled = "true">
                    </div>
      
                    <input type="submit" name="btn_cad" value="Alterar" class="btn btn-primary btn-lg btn-block" />
            </form>
            </div>
    <?php 
if(isset($_POST['btn_cad'])){
    
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $senha = $_POST['senha'];
    $nasc = $_POST['nasc'];
   // $sexoo = $_POST['sexo'];
    $nome = $_POST['nome'];
    $contratacao = $_POST['contratacao'];
    $cargo = $_POST['select_cargo'];

    $ALTERAR = "UPDATE `tb_funcionario` 
    SET `nome_funcionario` = '$nome',
        `sobrenome_funcionario` = '$sobrenome',
        `email_funcionario` = '$email',
        `cpf_funcionario` = '$cpf',
        `senha_funcionario` = '$cpf',
        `dt_nascimento_funcionario` = '$nasc',
        `dt_contratacao_funcionario` = '$contratacao', 
        `fk_cargo` = '3'
         WHERE `tb_funcionario`.`id_funcionario` = '$id';";
    mysqli_query($conexao, $ALTERAR);
    if(mysqli_affected_rows($conexao)){
    header("Refresh:1; url=cad_funcionario.php?pagina=1");
    }

    }
    //`sexo_funcionario` = '$sexo',
    ?>
</body>
</html>
<style>
    input[type="date"] {
        margin: 2px;
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
        transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
    }
</style>

