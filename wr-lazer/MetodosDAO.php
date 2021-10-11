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
     function cadastrar(){
          global $conexao;

     }
}

?>