<?php 
include 'conexao.php';
session_start();
if(!isset($_SESSION['itens'])){
    $_SESSION['itens'] = array();

}
if(isset($_GET['add']) && $_GET['add']=="carrinho"){
    //Adiciona ao carrinho 
$id_produto = $_GET['id'];
if(!isset($_SESSION['itens'][$id_produto])){
    $_SESSION['itens'][$id_produto]=1;
}else{
    $_SESSION['itens'][$id_produto]=+1;
}
}

if(count($_SESSION['itens'])==0){
    echo "CARRINHO VAZIO";
}else{
      foreach($_SESSION['itens'] as $id_produto){
        $SELECT = "SELECT*FROM tb_manufaturado WHERE id_manufaturado=?";
        $PRODUTOS = mysqli_execute($SELECT);
        echo $PRODUTOS['descricao_manufaturado'];
      }
}
?>