<link rel = "stylesheet" href = "css/style.css" > 
<?php
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
     function cadastrarFuncionario($nome, $sobrenome, $email, $senha, $cpf, $dt_nasc_func, $sexo_func, $dt_contratacao){
          global $conexao; 
          try {    
               $nome = mysqli_real_escape_string($conexao,$nome);              
               mysqli_query($conexao,"INSERT INTO `tb_funcionario` 
               (id_funcionario, `nome_funcionario`, 
               `sobrenome_funcionario`, `email_funcionario`, 
               `senha_funcionario`, `dt_nascimento_funcionario`, 
               `cpf_funcionario`, `sexo_funcionario`) 
               VALUES 
               (NULL, '$nome', 
               '$sobrenome', '$email', 
               '$senha', '$cpf', 
               '$dt_nasc_func', $sexo_func, 
               $dt_contratacao');");
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
}

