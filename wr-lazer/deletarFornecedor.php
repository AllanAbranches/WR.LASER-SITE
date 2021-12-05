<?php include "conexao.php";
        $id = filter_input(INPUT_GET,'id');
        $DELETE = "DELETE FROM tb_fornecedor WHERE id_fornecedor = '$id'";
        mysqli_query($conexao, $DELETE);
        if(mysqli_affected_rows($conexao)){
            header("Refresh:2; url=listarFornecedor.php?pagina=1");
        }else{
          

        }
?>