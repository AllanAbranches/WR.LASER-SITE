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
<div class="listagem">
            <table class="table table-bordered table-dark">
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

                <?php 
                   $pagina_atual =  filter_input(INPUT_GET,'pagina');
                   $pagina = (!empty($pagina_atual))? $pagina_atual :1;
                   //SETAR A QUANTIDADE DE ITENS POR PAGINA 
                   $qtd_result_pg = 10;
                   
                   //CALCULAR O INICIO DA VISUALIZAÇAOP 
                   $inicio  = ($qtd_result_pg *$pagina_atual)-$qtd_result_pg ;
                   $result_func = "SELECT*FROM tb_funcionario inner join tb_cargo on tb_funcionario.fk_cargo = tb_cargo.id_cargo LIMIT $inicio, $qtd_result_pg "; 
                   $RESULTADO = mysqli_query($conexao,$result_func);
                   
                   $result_pg = "SELECT COUNT(id_funcionario) AS num_result FROM tb_funcionario ";
                   $resultado_pg = mysqli_query($conexao,$result_pg);
                   $row_pg = mysqli_fetch_assoc($resultado_pg);
                   //echo $row_pg['num_result'];
                   //quantidade de pagina
                   
                   $quantidade_pg = ceil($row_pg['num_result']/$qtd_result_pg);
                   
                   //LIMITAR OS LINKS ANTES E DEPOIS
                   $max_links = 2;
                   
                

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
                        <td>********</td>
                        <td><?php echo $row['dt_nascimento_funcionario']; ?></td>
                        <td><?php echo $row['sexo_funcionario']; ?></td>
                        <td><?php echo $row['dt_contratacao_funcionario']; ?></td>
                        <td><?php echo $row['nome_cargo']; ?></td>
                        <td><?php echo $row['salario_cargo']; ?></td>
                        <td>
    
                           <?php
                           echo "
                           <form action='' method='post'>
                           <a class='btn btn-success'  href='alterarFuncionario.php?id=".$row['id_funcionario']."'>ALTERAR</a> 
                           <a class='btn btn-danger' href='deletarFuncionario.php?id=".$row['id_funcionario']."' name='btn_excluir'>DELETAR</a></td>
                           </form>";
                           
                           
                }
                
                  if(isset($_POST['btn_exclur'])){
                    require_once 'MetodosDAO.php';
                    $wrlazer = new Wrlazer;
                    $id = filter_input(INPUT_GET,'id');
                    $wrlazer->deletar_funcionario($id);
                  }
                  
               
        ?>
</table>
<?php 


echo "<a class='tag_a' href='listarFuncionario.php?pagina=1'><<</a> ";
for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >=1){
         echo "|<a class='tag_a'  href='listarFuncionario.php?pagina=$pag_ant'>$pag_ant</a> |"; 
    }
   
}
echo "<a href='#' class='tag_a'>$pagina</a>";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "|<a class='tag_a'  href='listarFuncionario.php?pagina=$pag_dep'>$pag_dep</a> |"; 
    }
}

echo "<a class='tag_a' href='listarFuncionario.php?pagina=$quantidade_pg'>>></a>";
?>
            </div>
                </div>
</body>
</html>
