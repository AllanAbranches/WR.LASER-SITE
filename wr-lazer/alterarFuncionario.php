<?php include "conexao.php";
    if(isset($_POST['btn_atualizar'])){
    

        $id = filter_input(INPUT_GET,'id');
        $nome = filter_input(INPUT_POST,'nome');
   
        $UPDATE ="UPDATE `tb_funcionario` SET 
        `nome_funcionario` = '$nome', 
        `sobrenome_funcionario` = 'aaaaaaaaaaaaaA', 
        `email_funcionario` = 'aaaaaaaaaaaaaaaaA', 
        `senha_funcionario` = '1232',
        `dt_nascimento_funcionario` = '11111112',
        `dt_contratacao_funcionario` = '1111112',
        `fk_cargo` = '3' WHERE `tb_funcionario`.`id_funcionario` = $id";
        mysqli_query($conexao, $UPDATE);
        if(mysqli_affected_rows($conexao)){
        

        }else{
            echo '<script>alert("USUARIO NAO ALTERADO");</script>';

        }
    }
?>