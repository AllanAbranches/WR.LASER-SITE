<?php include "conexao.php";
$id = filter_input(INPUT_GET,'id');
$select = "SELECT ID_FUNCIONARIO AS 'ID',
NOME_FUNCIONARIO AS 'NOME',
SOBRENOME_FUNCIONARIO AS 'SOBRENOME',
CPF_FUNCIONARIO AS 'CPF',
EMAIL_FUNCIONARIO AS 'EMAIL',
SENHA_FUNCIONARIO AS 'SENHA',
DT_NASCIMENTO_FUNCIONARIO AS 'DATA NASCIMENTO',
SEXO_FUNCIONARIO AS 'SEXO',
DT_CONTRATACAO_FUNCIONARIO 'DATA CONTRATAÇÃO',
NOME_CARGO AS 'CARGO',
SALARIO_CARGO AS 'SALARIO CARGO'
FROM TB_FUNCIONARIO
INNER JOIN TB_CARGO on TB_FUNCIONARIO.ID_FUNCIONARIO = TB_CARGO.ID_CARGO WHERE id_funcionario = '$id'";
$query = mysqli_query($conexao, $select);
$row  = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Funcionário</title>
</head>
<body>
    <form action="" method="post">
        ID:  <?php echo $row['ID'];?><br>
        <input type="text" name="nomeFunc" placeholder="NOME" value="<?php echo $row['NOME'];?>"><br>
        <input type="text" name="sobrenomeFunc" placeholder="SOBRENOME" value="<?php echo $row['SOBRENOME'];?>"><br>
        <input type="text" name="emailFunc" placeholder="EMAIL" value="<?php echo $row['EMAIL'];?>"><br>
        <input type="text" name="cpfFunc" placeholder="CPF" value="<?php echo $row['CPF'];?>"><br>
        <input type="date" name="dtnascFunc" placeholder="DATA NASCIMENTO" value="<?php echo $row['DATA NASCIMENTO'];?>"><br>
        <input type="text" name="sexoFunc" placeholder="SEXO" value="<?php echo $row['SEXO'];?>"><br>
        <input type="date" name="dtcontratFunc" placeholder="DATA CONTRATAÇÃO" value="<?php echo $row['DATA CONTRATAÇÃO'];?>"><br>
        <select name="select_cargo" id="">
                <option >SELECIONE</option>
                <?php $SELECT = "SELECT*FROM tb_cargo"; $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nome_cargo']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="ALTERAR" name="btnAlterar">
    </form>
    <?php
        if(isset($_POST['btnAlterar'])){
            $nome =$_POST['nomeFunc'];
            $sobrenome =$_POST['sobrenomeFunc'];
            $email = $_POST['emailFunc'];
            $senha = $_POST['senhaFunc'];
            $dt_nas = $_POST['dt_nascFunc'];
            $cpf = $_POST['cpfFunc'];
            $sexx = $_POST['select_sex'];

            $wrlazer->cadastrar($nome,$sobrenome,$email, $senha,$dt_nas,$cpf,$cep ,$bairro,$rua ,$cidade,$numero_end ,$complemento,$sexx );
        }

    
    ?>
</body>
</html>