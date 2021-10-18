
        <link rel = "stylesheet" href = "css/style.css" > 
<?php

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
          while ($produto = mysqli_fetch_assoc($PRODUTOS)) {?> 
          <div class="container">
          <div class = "card" > <img src="img/img01.png" alt="Denim Jeans" style="width:200px">
          <!--PUXAR IMAGEM DO PRODUTO-->
          <p><?php echo $produto['descricao_manufaturado'];?></p>
          <p class="price">R$<?php echo $produto['valor'];?>,00</p>
          <?php  echo '<a href="carrinho.php?acao=add&id='.$produto['id_manufaturado'].'">ADICIONAR AO CARRINHO</a>' ?>
          </div>
</div>
<?php
    }

    

     }
}


