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
    <center><h1>LISTAR FUNCIONÁRIO</h1></center>
<div style="margin-left:auto; margin-right:auto; display:block; width:1300px; font-size:12px;">
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

                <?php $SELECT = "SELECT*FROM tb_funcionario I"; 
        
        $RESULTADO = mysqli_query($conexao,$SELECT);
                while($row = mysqli_fetch_assoc($RESULTADO)){ ?>

                <tbody>
                    <tr>
                        <?php echo "<th scope='row'>"?> 
                        <?php echo $row['id_funcionario'];?>
                        </th>
                        <td><?php echo $row['nome_funcionario']; ?></td>
                        <td>
                            <?php echo $row['sobrenome_funcionario']; ?></td>
                        <td><?php echo $row['cpf_funcionario']; ?></td>
                        <td><?php echo $row['email_funcionario']; ?></td>
                        <td><?php echo $row['senha_funcionario']; ?></td>
                        <td><?php echo $row['dt_nascimento_funcionario']; ?></td>
                        <td><?php echo $row['sexo_funcionario']; ?></td>
                        <td><?php echo $row['dt_contratacao_funcionario']; ?></td>
                        <td><?php echo $row['fk_cargo']; ?></td>
                        <td></td>
                        <td>
    
                           <?php
                           echo "
                           <form action='' method='post'>
                           <a href='editar_funcionario.php?id=".$row['id_funcionario']."'>ALTERAR</a> |
                           <a href='deletarFuncionario.php?id=".$row['id_funcionario']."'>EXCLUIR</a></td>
                           </form>";
                           
                }

        ?>
</body>
</html>