<link rel = "stylesheet" href = "css/estilo.css" > <?php

include 'conexao.php';
class wrlazer
{
     function logar($email, $senha){
          global $conexao;

          $select = "SELECT*FROM tb_cliente WHERE  email_cliente = '$email' AND senha_cliente = '$senha';";
          $resultado  = mysqli_query($conexao,$select);

          if($resultado->num_rows >0){
               header('Location:index.php');
          }else{
               echo "<br><center>EMAIL OU SENHA INCORRETOS</center>";
          }
     }
     function cadastrar($nome,$sobrenome,$email,$senha,$dt_nas,$cpf,$cep,$bairro,$rua,$cidade,$numero_end,$complemento,$sexx  ){
          global $conexao; 

          try {    
               $nome = mysqli_real_escape_string($conexao,$nome);              
               mysqli_query($conexao,"INSERT INTO `tb_cliente` (id_cliente, `nome_cliente`, `sobrenome_cliente`, `email_cliente`, `senha_cliente`, `dt_nascimento_cliente`, `cpf_cliente`, `cep_cliente`, `bairro_cliente`, `rua_cliente`, `cidade_cliente`, `numero_end_cliente`, `complemento_end_cliente`, `fk_sexo`) VALUES (NULL, '$nome', '$sobrenome', '$email', '$senha', '$dt_nas', '$cpf', '$cep', '$bairro', '$rua', '$cidade', '$numero_end', '$complemento', '$sexx');");
     
              } catch (Exception $erro) {
              echo "Erro - " . $erro;
          }
          
     }
     function produtos(){
          global $conexao;

    $SELECT = "SELECT*FROM tb_manufaturado";
    $PRODUTOS = mysqli_query($conexao,$SELECT);

    while ($infos = mysqli_fetch_array($PRODUTOS)) {?> 
    <div class = "card" > <img src="img/img01.png" alt="Denim Jeans" style="width:200px">
    <!--PUXAR IMAGEM DO PRODUTO-->
    <h1>
        <!--PUXAR O NOME DO PRODUTO-->
    </h1>
    <p class="price">R$
        <?php echo $infos['valor'];?>,00</p>
    <?php echo $infos['qtd_manufaturado'];?>
    <p >Descriçao:<?php echo $infos['descricao_manufaturado'];?></p>
    <p>
        <button>Adicionar ao carrinho</button>
    </p>
</div>

<?php
    }

    

     }
}