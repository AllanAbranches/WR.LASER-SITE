<?php include "conexao.php";

        $id = filter_input(INPUT_GET,'id');
        $DELETE = "DELETE FROM tb_producao WHERE id_producao = '$id'";
        mysqli_query($conexao, $DELETE);
        if(mysqli_affected_rows($conexao)){
            
            header("Refresh:2; url=listarProducao.php?pagina=1");
        }else{
          

        }
?>