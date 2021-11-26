<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "bd_wrlazer";

$conexao = mysqli_connect($localhost,$username,$password,$database);

if($conexao){

}else{
    echo "NAO CONECTADO";
}
?>