<?php include "conexao.php";
$id = filter_input(INPUT_GET,'id');
$select = "SELECT * FROM TB_FUNCIONARIO WHERE id_funcionario = '$id'";
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
    <form action="alterarFuncionario.php" method="post">
        ID:  <?php echo $row['id_funcionario'];?><br>
        <input type="text" name="nome" value="<?php echo $row['nome_funcionario'];?>"><br>
        <input type="text" name="sobrenome" value="<?php echo $row['sobrenome_funcionario'];?>"><br>
        <input type="text" name="email" value="<?php echo $row['email_funcionario'];?>"><br>
        <input type="text" name="cpf" value="<?php echo $row['cpf_funcionario'];?>"><br>
        <input type="date" name="nasc" value="<?php echo $row['dt_nascimento_funcionario'];?>"><br>
        <input type="text" name="sexo" value="<?php echo $row['sexo_funcionario'];?>"><br>
        <input type="date" name="contrat" value="<?php echo $row['dt_contratacao_funcionario'];?>"><br>
        <select name="select_cargo" id="">
                <option >SELECIONE</option>
                <?php $SELECT = "SELECT*FROM TB_CARGO"; $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                <option value="<?php echo $cargo['id_cargo']; ?>"><?php echo $cargo['nome_cargo']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" value="ATUALIZAR" name="btn_atualizar">
    </form>
</body>
</html>