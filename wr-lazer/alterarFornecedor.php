<?php include 'conexao.php';
$id = filter_input(INPUT_GET,'id');
$select = "SELECT*FROM tb_fornecedor WHERE id_fornecedor = '$id'";
$query = mysqli_query($conexao, $select);
$row  = mysqli_fetch_assoc($query);
?>
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
    <h2 style="text-align:center">ALTERAR FONECEDOR</h2>
    <form action="" method="POST">
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="">Nome</label>
            <input type="text" name="name" class="form-control"  placeholder="Nome" value="<?php echo $row['nome_fornecedor'];?>">
          </div>
          <div class="form-group col-md-6">
            <label for="">CNPJ</label>
            <input type="text" name="cnpj" class="form-control" placeholder="CNPJ" value="<?php echo $row['cnpj_fornecedor'];?>">
          </div>
        </div>
        <div class="form-group">
          <label for="">E-mail</label>
          <input type="text" name="email" class="form-control" placeholder="E-mail" value="<?php echo $row['email_fornecedor'];?>">
        </div>
        <div class="form-group">
          <label for="">Telefone</label>
          <input type="text" name='tel' class="form-control" placeholder="Telefone"  value="<?php echo $row['tel_fornecedor'];?>">
        </div>
        <button type="submit" name="btn_alterar"  class="btn btn-warning">Alterar</button>
        
      </form>
      <br>
    </div>

    <?php 
    
    require_once 'MetodosDAO.php';
    $wrlazer = new Wrlazer;
    if(isset($_POST['btn_alterar'])){
        $id = filter_input(INPUT_GET,'id');
        $name =$_POST['name'];
        $cnpj =$_POST['cnpj'];
        $email =$_POST['email'];
        $tel =$_POST['tel'];
  
        $wrlazer->alterar_fornecedor($id,$name,$cnpj,$email,$tel);
    }
    ?>
</body>
</html>