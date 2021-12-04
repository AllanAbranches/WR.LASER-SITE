<?php include "conexao.php";

        $id = filter_input(INPUT_GET,'id');
        $DELETE = "DELETE FROM tb_funcionario WHERE id_funcionario = '$id'";
        mysqli_query($conexao, $DELETE);
        if(mysqli_affected_rows($conexao)){
            
            header("Refresh:2; url=cad_funcionario.php?pagina=1");
        }else{
          

        }
?>