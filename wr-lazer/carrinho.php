<?php 
include 'conexao.php';
session_start();

    if(!isset($_SESSION['carrinho'])){
        $_SESSION['carrinho'] = array();
    }
    if(isset($_GET['acao']) && $_GET['acao']=="add"){
    //Adiciona ao carrinho 
    $id_produto = intval($_GET['id']);

    if(!isset($_SESSION['carrinho'][$id_produto])){

    $_SESSION['carrinho'][$id_produto]=1;

    }else{

    $_SESSION['carrinho'][$id_produto]+=1;

    }
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/carrinho.css">
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous">
        <title>Carrinho</title>
    </head>
    <body>
        <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #ADD8E6;" >
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="200px" height="100px" style=" image-rendering: pixelated;"  ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      </div>
    </nav>

    <?php


echo '        <div class="container">
<table class="table" style="border:1px solid black;">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Produto(IMAGEM)</th>
            <th scope="col">Descriçao</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Subtotal</th>
            <th scope="col"><-ADD-></th>
        </tr>
    </thead>';
if(count($_SESSION['carrinho'])==0){
    echo "<h1 style='font-weight: bold; text-align:center'>SEM NENHUM PRODUTO</h1>";

}else{
  
foreach($_SESSION['carrinho'] as $id_produto=>$qtd){
    $SELECT = "SELECT*FROM tb_manufaturado WHERE id_manufaturado='$id_produto'";
    $QUERY = mysqli_query($conexao, $SELECT);
    $VAR = mysqli_fetch_assoc($QUERY);
    $Desc = $VAR['descricao_manufaturado'];
    $DIMENSAO = $VAR['dimensao_manufaturado'];
    $valor = number_format($VAR['valor'],2,",",".");
    $SUBTOTAL =number_format($VAR['valor']*$qtd,2,",",".");
    $TOTAL = $SUBTOTAL;

    echo '
    <tbody>
    <tr>
    <th scope="row">IMAGEM</th>
    <th>'.$Desc .'</th>
    <th>R$ '.$valor.'</th>
    <th><input type="text" style="width:70px" value='.$qtd.'></th>
    <th>'.$SUBTOTAL.'</th>

  ';

}}
//print_r($_SESSION['carrinho']);
//session_destroy();

?>
    </tr>
</tbody>
<?php 
    echo '<tr>
    <td colspan="4">TOTAL    R$ '.$TOTAL.'</td>
    </tr>
    '
    
    ?>

</table>

</div>
<a href="index.php">ADICIONAR MAIS PRODUTOS</a>
</body>
</html>