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

    $_SESSION['carrinho'][$id_produto]=1;

    }

}
    //DELETA O PRODUTO SELECIONADO
    if($_GET['acao']=='del'){
        $id = intval($_GET['id']);
        if(isset($_SESSION['carrinho'][$id])){
            unset($_SESSION['carrinho'][$id]);
        }
    }
    //ATUALIZA O PRODUTO SELECIONADO
    if($_GET['acao'] == 'update'){ 
        if(is_array($_POST['prod'])){
            foreach($_POST['prod'] as $id => $qtd){
               $id_produto = intval($id);
               $qtd = intval($qtd); 
               if(!empty($qtd) || $qtd <> 0){
                   $_SESSION['carrinho'][$id] = $qtd ;
               }else{
                   unset($_SESSION['carrinho'][$id]);
               }
            }
        }
       } 
       //DEFINE A VARIAVEL TOTAL COMO NULL 
       $TOTAL = null;
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
<form action="?acao=update" method="POST">
    <nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #ADD8E6;" >
      <div class="container">
        <a class="navbar-brand" href="index.php"><img src="./img/logo.png" width="200px" height="100px" style=" image-rendering: pixelated;"  ></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      </div>
    </nav>
    <?php
echo " <div style='width:900px; margin-left:auto; margin-right:auto; display:block;'>
<table class='table table-hover'>
<thead>
  <tr>
  <th scope='col'>Produto(IMAGEM)</th>
  <th scope='col'>Descriçao</th>
  <th scope='col'>Preço</th>
  <th scope='col'>Quantidade</th>
  <th scope='col'>Subtotal</th>
  <th scope='col'>Ação</th>
  </tr>
</thead>";

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
    $SUBTOTAL = $VAR['valor']*$qtd;
    $TOTAL += $SUBTOTAL;

echo "<tbody>
        <tr>
          <th scope='row'>IMG</th>
          <td>".$Desc."</td>
          <td>".$valor."</td>
          <td><input type='number' name='prod[".$id_produto."]' style='width:70px' value=".$qtd."></td>
          <td>".$SUBTOTAL."</td>
          <td><a class='btn btn-danger' style='padding:4px;' href='carrinho.php?acao=del&id=".$id_produto."'>REMOVER</a></td>";
}}
?>
        </tr>
    </tbody>
</table>
<?php 
      echo '<tr> 
                <td colspan="4">TOTAL    R$ '.number_format($TOTAL,2,",",".").'</td>
            </tr><br><br>';  
?>
    <a href="index.php" class="btn btn-info">Adicionar mais produtos</a>
<input type="submit" class="btn btn-success" value="Atualizar carrinho">
</form>
</div>
</div>

</body>
</html>
