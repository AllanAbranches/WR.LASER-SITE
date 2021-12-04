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
        <center>
            <div class="box">
        <div class="container">
            <br>
            <form action="" method="post" class="frm">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="name" name="nome" class="form-control" placeholder="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <input
                            type="text"
                            name="sobrenome"
                            class="form-control"
                            placeholder="Sobrenome">
                    </div>
                </div>
                <div class="form-group"">
                    <input type="text" name="email" class="form-control" placeholder="Eimail">
                </div>
                <div class="form-group">
    
                    <input type="text" class="form-control" placeholder="Password">
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
                            <?php $SELECT = "SELECT*FROM tb_cargo"; $RESULTADO = mysqli_query($conexao,$SELECT);
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
                    <input type="submit" name="btn_cadd" class="btn btn-primary btn-lg btn-block" />
            </form>
            </div>
        </div>
            <div class="listagem">
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
                           <a href='editar_funcionario.php?id=".$row['id_funcionario']."'>ALTERAR</a> |
                           <a href='del_funcionario.php?id=".$row['id_funcionario']."' name='btn_excluir'>DELETAR</a></td>
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


echo "<a class='tag_a' href='cad_funcionario.php?pagina=1'><<</a> ";
for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
    if($pag_ant >=1){
         echo "|<a class='tag_a'  href='cad_funcionario.php?pagina=$pag_ant'>$pag_ant</a> |"; 
    }
   
}
echo "<a href='#' class='tag_a'>$pagina</a>";

for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
    if($pag_dep <= $quantidade_pg){
        echo "|<a class='tag_a'  href='cad_funcionario.php?pagina=$pag_dep'>$pag_dep</a> |"; 
    }
}

echo "<a class='tag_a' href='cad_funcionario.php?pagina=$quantidade_pg'>>></a>";
?>
            </div>
                </div>
        </body>
    </html>
    <style>

        .container {
            float:left;
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