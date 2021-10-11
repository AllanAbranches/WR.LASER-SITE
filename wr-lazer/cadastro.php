<?php
function get_endereco($cep){
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "http://viacep.com.br/ws/$cep/xml/";
    $xml = simplexml_load_file($url);
    return $xml;
}

?>
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
            <input type="name" name="txt_nome" placeholder="NOME"><br>
            <input type="text" name="txt_sobrenome" placeholder="SOBRENOME"><br>
            <input type="text" name="txt_email" placeholder="E-MAIL"><br>
            <input type="text" name="txt_senha" placeholder="SENHA"><br>
            <input type="text" name="txt_dt_nas" placeholder="DATA DE NASCIMENTO"><br>
            <input type="text" name="txt_tel" placeholder="TELEFONE"><br>
            <input type="text" name="txt_sexo" placeholder="SEXO"><br>
            <input type="text" name="txt_cep" placeholder="CPF"><br>
            <input type="text" name="txt_cep" placeholder="CEP">
            <input type="text" name="txt_bairro" placeholder="BAIRRO"><br>
            <input type="text" name="txt_rua" placeholder="RUA"><br>
            <input type="text" name="txt_cidade" placeholder="CIDADE"><br>
            <input type="text" name="txt_numero_end" placeholder="NUMERO DO ENDEREÇO"><br>
            <input type="text" name="txt_complemento" placeholder="COMPLEMENTO"><br>
            <input type="submit" name="btn_cadastra" value="CADASTRAR">
        </form>

    </body>
</html>