<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous">
</head>
<body>

    <div class="container" style="box-shadow: 0 1px 3px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%); width: 400px; margin-top:100px ; margin-left:auto; margin-right:auto; display:block;" >
    <form action="" method="POST">
      <center>
        <h1>Cadastrar Fornecedor</h1>
      </center>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Nome</label>
            <input type="text" name="name" class="form-control"  placeholder="Nome">
          </div>
          <div class="form-group col-md-6">
            <label for="">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" placeholder="CNPJ">
          </div>
        </div>
        <div class="form-group">
          <label for="">E-mail</label>
          <input type="text" name="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label for="">Telefone</label>
          <input type="text" name='tel' class="form-control" placeholder="Telefone">
        </div>
        <button type="submit" name="btn_cadastrar" class="btn btn-outline-primary">Cadastrar</button>
        <a  href="listarFornecedor.php?pagina=1"  type="button" class="btn btn-outline-success">Listar</a>
      </form>
      <br>
    </div>

    <?php 
    
    require_once 'MetodosDAO.php';
    $wrlazer = new Wrlazer;
    if(isset($_POST['btn_cadastrar'])){
        $name =$_POST['name'];
        $cnpj =$_POST['cnpj'];
        $email =$_POST['email'];
        $tel =$_POST['tel'];
  
        $wrlazer->cadastrar_fornecedor($name,$cnpj,$email,$tel);
    }
    ?>
</body>
</html>