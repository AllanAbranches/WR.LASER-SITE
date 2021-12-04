<?php include 'conexao.php'?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <form action="" method="post">
            <input type="text" name="nome_manu" placeholder="Nome Manufaturado">
            <input type="text" name="desc_manu" placeholder="Descriçao Manufaturado">
            <input type="text" name="valor_manu" placeholder="Dimensao Manufaturado">
            <input type="text" name="dimensao_manu" placeholder="Imagem Manufaturado">
            <div><input name="imagem" type="file"/></div>
            <select name="select_tipo_manu" id="">
                <option >SELECIONE</option>
                <?php $SELECT = "SELECT*FROM tb_tipo_manufaturado"; 
                $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                <option value="<?php echo $cargo['id_tipo_manufaturado']; ?>">
                    <?php echo $cargo['tipo_manufaturado']; ?></option>
                <?php } ?>
            </select>
            <select name="select_porte_manu" id="">
                <option >SELECIONE</option>
                <?php $SELECT = "SELECT*FROM tb_porte"; 
                $RESULTADO = mysqli_query($conexao,$SELECT);
                while($cargo = mysqli_fetch_assoc($RESULTADO)){ ?>
                <option value="<?php echo $cargo['id_porte']; ?>">
                    <?php echo $cargo['Desc_porte']; ?></option>
                <?php } ?>
            </select>
            <input type="submit" name="btn_cadastrar" value="CADASTRAR">

        </form>

        
    </body>
</html>

<?php 
    require_once 'MetodosDAO.php';
    $wrlazer = new Wrlazer;
    if(isset($_POST['btn_cadastrar'])){
        
        $nome_manu =$_POST['nome_manu'];
        $desc_manu =$_POST['desc_manu'];
        $valor_manu =$_POST['valor_manu'];
        $dimensao_manu =$_POST['dimensao_manu'];
        $imagem = $_FILES['imagem']['tmp_name'];
    	$tamanho = $_FILES['imagem']['size'];
        $select_tipo_manu =$_POST['select_tipo_manu'];
        $select_porte_manu =$_POST['select_porte_manu'];
		
        $wrlazer->cadastro_funcionario($nome_manu,$desc_manu,$valor_manu,$conteudo, 
        $dimensao_manu,$select_tipo_manu,$select_porte_manu);
    }
?>