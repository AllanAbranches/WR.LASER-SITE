<?php include "conexao.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
</head>
<body>
    <br>
    <center><h1>LISTAR FUNCIONÁRIO</h1></center>
<div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">SOBRENOME</th>
                        <th scope="col">CPF</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">SENHA</th>
                        <th scope="col">DATA DE NASCIMENTO</th>
                        <th scope="col">SEXO</th>
                        <th scope="col">DATA DE CONTRATAÇAO</th>
                        <th scope="col">CARGO</th>
                        <th scope="col">SALARIO</th>
                        <th scope="col">ALTERAR/EXCLUIR</th>
                    </tr>
                </thead>

                <?php $SELECT = "	SELECT ID_FUNCIONARIO AS 'ID',
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
	INNER JOIN TB_CARGO on TB_FUNCIONARIO.ID_FUNCIONARIO = TB_CARGO.ID_CARGO"; 
        
        $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>

                <tbody>
                    <tr>
                        <th scope="row"><?php echo $cargo['ID'];?>
                        </th>
                        <td><?php echo $cargo['NOME']; ?></td>
                        <td>
                            <?php echo $cargo['SOBRENOME']; ?></td>
                        <td><?php echo $cargo['CPF']; ?></td>
                        <td><?php echo $cargo['EMAIL']; ?></td>
                        <td><?php echo $cargo['SENHA']; ?></td>
                        <td><?php echo $cargo['DATA NASCIMENTO']; ?></td>
                        <td><?php echo $cargo['SEXO']; ?></td>
                        <td><?php echo $cargo['DATA CONTRATAÇÃO']; ?></td>
                        <td><?php echo $cargo['CARGO']; ?></td>
                        <td><?php echo $cargo['SALARIO CARGO']; ?></td>
                        <td>
                            <?php echo "<button style='background-color:green;' name='btn_alterar'><a style='color:white;' href='editar_funcionario.php?id=".$cargo['ID']."'>ALTERAR</a></button>
                            <button style='background-color:red;' name='btn_excluir'><a style='color:white' href='listar_funcionario.php?id=".$cargo['ID']."'>DELETAR</a></button></td>";?>
                        <?php
            echo "<br>";    
            } 
                ?>
 
<?php 

if(isset($_POST['btn_excluir'])){
    $id = filter_input(INPUT_GET,'id');
    $DELETE = "DELETE FROM tb_funcionario WHERE id_funcionario = '$id'";
    $PRODUTOS = mysqli_query($conexao, $DELETE);
}


?>

</body>
</html>
<style>
.table{
    font-size:10px;
    width:1100px;
}
</style>