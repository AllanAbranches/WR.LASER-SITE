<link rel = "stylesheet" href = "css/style.css" > 
<?php
include 'conexao.php';
class wrlazer
{
    #region Logar
    function logar($email, $senha)
    {
        global $conexao;
        $select = "SELECT*FROM tb_cliente WHERE  email_cliente = '$email' AND senha_cliente = '$senha';";
        $resultado = mysqli_query($conexao, $select);
        if ($resultado->num_rows > 0) {
            header('Location:index.php');
        } else {
            echo "<center><div class='alert alert-danger' style='max-width: 410px;' role='alert'>EMAIL OU SENHA INCORRETOS</div></center>";
        }
    }
    #endregion

    #region Cadastrar Cliente
    function cadastrarCliente($nome, $sobrenome, $email, $senha, $dt_nas, $cpf, $cep, $bairro, $rua, $cidade, $numero_end, $complemento, $sexx)
    {
        global $conexao;
        try {
            $nome = mysqli_real_escape_string($conexao, $nome);
            mysqli_query(
                $conexao,
                "INSERT INTO `tb_cliente` (id_cliente, `nome_cliente`, `sobrenome_cliente`, `email_cliente`, `senha_cliente`, `dt_nascimento_cliente`, `cpf_cliente`, `cep_cliente`, `bairro_cliente`, `rua_cliente`, `cidade_cliente`, `numero_end_cliente`, `complemento_end_cliente`, `fk_sexo`) VALUES (NULL, '$nome', '$sobrenome', '$email', '$senha', '$dt_nas', '$cpf', '$cep', '$bairro', '$rua', '$cidade', '$numero_end', '$complemento', '$sexx');"
            );
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
    #endregion

    #region Listar Produtos
    function produtos()
    {
        global $conexao;
        $SELECT = "SELECT*FROM tb_manufaturado";
        $PRODUTOS = mysqli_query($conexao, $SELECT);
        while ($produto = mysqli_fetch_assoc($PRODUTOS)) { ?> 
    <div class="card" style="width: 18rem;">
        <img src="img/img01.png" alt="Denim Jeans" style="width:200px">
          <div class="card-body">
                <h5 class="card-title">#NOME PRODUTO</h5>
                <p class="card-text"><?php echo $produto['descricao_manufaturado']; ?></p>
                <p class="price">R$<?php echo $produto['valor']; ?>,00</p>
                <?php echo '<a class="btn btn-primary" href="carrinho.php?acao=add&id=' . $produto['id_manufaturado'] . '">ADICIONAR AO CARRINHO</a>'; ?></a>
          </div>
    </div>

    <?php }
    }
    #endregion

    #region Cadastro de Funcionário
    function cadastro_funcionario($select_cargo, $funcionario, $sobrenome, $email, $cpf, $nasc, $sexo, $contratacao)
    {
        global $conexao;
        try {
            mysqli_query(
                $conexao,
                "INSERT INTO `bd_wrlazer`.`tb_funcionario` (`nome_funcionario`, `sobrenome_funcionario`,`email_funcionario`, `cpf_funcionario`, `senha_funcionario`, `dt_nascimento_funcionario`, `sexo_funcionario`, `dt_contratacao_funcionario`, `fk_cargo`) 
               VALUES ('$funcionario', '$sobrenome','$email', '$cpf', '', '$nasc', '$sexo', '$contratacao', '$select_cargo');"
            );
            if (mysqli_affected_rows($conexao)) {
                echo '<H1>Inserido com Sucesso</h1>';
                header("Refresh:2");
            }
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
    #endregion

    #region Cadastro de Manufaturado
    function Cadastro_manufaturado($nome_manu, $desc_manu, $valor_manu, $dimensao_manu, $conteudo, $select_tipo_manu, $select_porte_manu)
    {
        global $conexao;
        try {
            mysqli_query(
                $conexao,
                "INSERT INTO `tb_manufaturado` (`id_manufaturado`, `nome_manufaturado`, `descricao_manufaturado`, `valor`, `dimensao_manufaturado`, `imagem_manufaturado`, `fk_tipo_manufaturado`, `fk_porte`) 
               VALUES (default, '$nome_manu', '$desc_manu', '$valor_manu', '$dimensao_manu','$conteudo', '$select_tipo_manu', '$select_porte_manu');"
            );
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
    #endregion

    function editar_funcionario()
    {
    }
    function deletar_funcionario($id)
    {
        global $conexao;
        $id = filter_input(INPUT_GET, 'id');
        $DELETE = "DELETE FROM tb_funcionario WHERE id_funcionario = '$id'";
        mysqli_query($conexao, $DELETE);
        if (mysqli_affected_rows($conexao)) {
            echo '<h1>USUARIO APAGAOD</h1>';
            header("Location:listar_funcionario.php");
        } else {
            echo '<h1>USUARIO NAO FOI APAGADO</h1>';
            header("Location:listar_funcionario.php");
        }
    }

    function cadastrar_fornecedor($name, $cnpj, $email, $tel)
    {
        global $conexao;
        try {
            mysqli_query(
                $conexao,
                "INSERT INTO `tb_fornecedor` (`id_fornecedor`,`nome_fornecedor`, `cnpj_fornecedor`, `email_fornecedor`, `tel_fornecedor`)
               VALUES (default, '$name', '$cnpj', '$email', '$tel');"
            );
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
    function alterar_fornecedor($id, $name, $cnpj, $email, $tel)
    {
        global $conexao;
        try {
            mysqli_query($conexao, "UPDATE `bd_wrlazer`.`tb_fornecedor` SET `nome_fornecedor` = '$name',`cnpj_fornecedor` = '$cnpj',`email_fornecedor` = '$email',`tel_fornecedor` = '$tel' WHERE (`id_fornecedor` = '$id');");
            if (mysqli_affected_rows($conexao)) {
                echo '<h1>USUARIO ALTERADO</h1>';
                header("Location:listarFornecedor.php?pagina=1");
            }
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
    function cadastroProducao($select_func,$select_status,$data_producao,$qtd,$select_servico,$select_manu,$qtd_produzida){
        global $conexao;
        try {
            mysqli_query($conexao, "INSERT INTO `tb_producao` (`id_producao`, `fk_funcionario`, `fk_status`, `dt_producao`, `fk_estoque`, `fk_servico`, `fk_manufaturado`, `qtd_mproduzidos`) 
            VALUES (DEFAULT, '$select_func', '$select_status', '$data_producao', '$qtd', '$select_servico', '$select_manu', '$qtd_produzida');");
            
        } catch (Exception $erro) {
            echo "Erro - " . $erro;
        }
    }
}

