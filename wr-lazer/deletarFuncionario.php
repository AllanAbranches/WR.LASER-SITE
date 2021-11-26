<?php include "conexao.php";

        $id = filter_input(INPUT_GET,'id');
        $DELETE = "DELETE FROM tb_funcionario WHERE id_funcionario = '$id'";
        mysqli_query($conexao, $DELETE);
        if(mysqli_affected_rows($conexao)){
           echo '<script>alert("USUARIO APAGADO COM SUCESSO");</script>';
            header("Location:listar_funcionario.php");
        }else{
            echo '<script>alert("USUARIO NAO APAGADO");</script>';
            header("Location:listar_funcionario.php");
        }
?>