<link rel = "stylesheet" href = "css/style.css" > <?php
include 'conexao.php';
class wrlazer
{ 
#region Cadastro
     #region Cadastrar Cliente
     function cadastrarCliente($nome, $sobrenome, $email, $senha, $dt_nasc_cli, $cpf, $cep, $bairro, $rua, $cidade, $numero_end, $complemento, $sexo_cli  ){
          global $conexao; 
          try {    
               $nome = mysqli_real_escape_string($conexao,$nome);              
               mysqli_query($conexao,"INSERT INTO `tb_cliente`
                (id_cliente, `nome_cliente`, 
                `sobrenome_cliente`, `email_cliente`, 
                `senha_cliente`, `dt_nascimento_cliente`, 
                `cpf_cliente`, `cep_cliente`, 
                `bairro_cliente`, `rua_cliente`,
                `cidade_cliente`, `numero_end_cliente`, 
                `complemento_end_cliente`, `sexo_cliente`) 
                VALUES 
                (NULL, '$nome', '$sobrenome', 
                '$email', '$senha', 
                '$dt_nasc_cli', '$cpf', 
                '$cep', '$bairro', 
                '$rua', '$cidade', 
                '$numero_end', '$complemento', 
                '$sexo_cli');");
              } catch (Exception $erro) {
              echo "Erro - " . $erro;
          }
          
     }
     #endregion

     #region Cadastrar Funcionario
     #region Cadastro de Funcionário
     function cadastro_funcionario($select_cargo,$funcionario,$sobrenome,$email,$cpf,$nasc,$sexo,$contratacao){
          global $conexao;
          try {    
               mysqli_query($conexao,"INSERT INTO `bd_wrlazer`.`tb_funcionario` (`nome_funcionario`, `sobrenome_funcionario`,`email_funcionario`, `cpf_funcionario`, `senha_funcionario`, `dt_nascimento_funcionario`, `sexo_funcionario`, `dt_contratacao_funcionario`, `fk_cargo`) 
               VALUES ('$funcionario', '$sobrenome','$email', '$cpf', '', '$nasc', '$sexo', '$contratacao', '$select_cargo');");
              } catch (Exception $erro) {
              echo "Erro - " . $erro;
          }
     }
     #endregion

     #region Cadastrar Produtos
     function cadastrarProdutos($nome, $descricao, $valor, $dimensao, $imagem){
          global $conexao; 
          try {    
               $nome = mysqli_real_escape_string($conexao,$nome);              
               mysqli_query($conexao,"INSERT INTO `tb_manufaturado` 
               (id_manufaturado, `nome_manufaturado`, 
               `descricao_manufaturado`, `valor`, 
               `dimensao_manufaturado`, `imagem_manufaturado`, 
               `fk_tipo_manufaturado`, `fk_porte`) 
               VALUES (NULL, '$nome', '$descricao', 
               '$valor', '$dimensao', '$imagem');");
              } catch (Exception $erro) {
              echo "Erro - " . $erro;
          }
          
     }
     #endregion
#endregion
     
#region Alterar
     #region Alterar Cliente
     #endregion

     #region Alterar Funcionario
     function alterarFuncionario($nome,$sobrenome,$email,$cpf,$nasc,$sexo,$contrat,$select_cargo,$id){
          global $conexao;
          try {    
               $nome = mysqli_real_escape_string($conexao,$nome);              
               mysqli_query($conexao,"UPDATE `bd_wrlazer`.`tb_funcionario` SET 
               `nome_funcionario` = '$nome', 
               `sobrenome_funcionario` = '$sobrenome', 
               `email_funcionario` = '$email', 
               `cpf_funcionario` = '$cpf', 
               `dt_nascimento_funcionario` = '$nasc',
               `sexo_funcionario` = '$sexo',
               `dt_contratacao_funcionario` = '$contrat',
               `fk_cargo` = '$select_cargo'
               modified=NOW()
               WHERE (`id_funcionario` = '$id');
               ");

              } catch (Exception $erro) {
              echo "Erro - " . $erro;
          }
     }
     #endregion

     #region Alterar Produto
     #endregion
#endregion



#region Deletar
     #region Deletar Cliente
     #endregion

     #region Deletar Funcionario
     #endregion

     #region Deletar Produto
     #endregion
#endregion
function produtos() {
     global $conexao;
     $SELECT = "SELECT*FROM tb_manufaturado";
     $PRODUTOS = mysqli_query($conexao, $SELECT);
     while ($produto = mysqli_fetch_assoc($PRODUTOS)) { ?> 
     <div class = "card" style = "width: 18rem;" > <img src="img/img01.png" alt="Denim Jeans" style="width:200px">
    <div class="card-body">
        <h5 class="card-title">#NOME PRODUTO</h5>
        <p class="card-text"><?php echo $produto['descricao_manufaturado'];?></p>
        <p class="price">R$<?php echo $produto['valor'];?>,00</p>
        <?php  echo '<a class="btn btn-primary" href="carrinho.php?acao=add&id='.$produto['id_manufaturado'].'">ADICIONAR AO CARRINHO</a>' ?></a>
</div>
</div>

<?php
     }
      }
}