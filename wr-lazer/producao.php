<?php include 'conexao.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <title>Document</title>
    </head>
    <body>
        <div class="container">
            <form  action="" method="POST" class="row g-3"> 
                <div class="col-md-6">
                    <!--SELECT FUNCIONARIO-->
                    <label for="inputSurname" class="form-label">Funcionario:</label>
                    <select name="select_func" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php $select_func ="SELECT*FROM tb_funcionario";
                        $result_func = mysqli_query($conexao,$select_func);?>
                        <?php while($row_func = mysqli_fetch_assoc($result_func)){?>
                        <option value="<?php echo $row_func['id_funcionario'];?>"><?php echo $row_func['nome_funcionario'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="inputSurname" class="form-label">Status:</label>
                    <!--SELECT STATUS-->
                    <select name="select_status" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php $select_stt ="SELECT*FROM tb_status";
                        $result_stt = mysqli_query($conexao,$select_stt);?>
                        <?php while($row_stt = mysqli_fetch_assoc($result_stt)){?>
                        <option value="<?php echo $row_stt['id_status'];?>"><?php echo $row_stt['prod_status'];?></option>
                        <?php }?>
                    </select>
                </div>
                <br />
                <br />
                <br />
                <br />
                <div class="col-md-6">
                    <label class="form-label">Data da Produção:</label>
                    <input type="date" class="form-control" name="data_producao" />
                </div>
                <div class="col-md-6">
                    <label class="form-label">Quantidade:</label>
                    <input type="number" class="form-control" name="qtd" />
                </div>
                <br />
                <br />
                <br />
                <br />
                <div class="col-md-6">
                    <label class="form-label">Serviço:</label>
                    <!--SELECT SERVIÇO-->
                    <select name="select_servico" id="" class="form-control">
                        <option selected="selected">Selecione...</option>
                        <?php $select_ser ="SELECT*FROM tb_servico";
                        $result_ser = mysqli_query($conexao,$select_ser);?>
                        <?php while($row_ser = mysqli_fetch_assoc($result_ser)){?>
                        <option value="<?php echo $row_ser['id_servico'];?>"><?php echo $row_ser['Descricao_servico'];?></option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-6">
                    <!--SELECT MANUFATURADO-->
                    <label class="form-label">Manufaturado:</label>
                    <select name="select_manu" class="form-control" >
                        <option selected="selected">Selecione...</option>
                        <?php $select_manu ="SELECT*FROM tb_manufaturado";
                         $result_manu = mysqli_query($conexao,$select_manu);?>
                        <?php while($row_manu = mysqli_fetch_assoc($result_manu)){?>
                        <option value="<?php echo $row_manu['id_manufaturado'];?>"><?php echo $row_manu['nome_manufaturado'];?></option>
                        <?php }?>
                    </select>
                </div>
                <br />
                <br />
                <br />
                <br />
                <div class="col-md-12">
                    <label class="form-label">Quantidade Produzida:</label>
                    <input type="number"class="form-control" name="qtd_produzida" placeholder="Quantidade produzida" >
                    <br>
                </div>
                <br>
                <div class="col-md-12">
               
                <input type="submit" name="btn_cad" class="btn btn-secondary" value="CADASTRAR">
                </div>
            </form>
        </div>
        <?php 
        
        require_once 'MetodosDAO.php';
        $wrlazer = new Wrlazer;

        if(isset($_POST['btn_cad'])){
            $select_func = $_POST['select_func'];
            $select_status = $_POST['select_status'];
            $data_producao = $_POST['data_producao'];
            $qtd = $_POST['qtd'];
            $select_servico = $_POST['select_servico'];
            $select_manu = $_POST['select_manu'];
            $qtd_produzida = $_POST['qtd_produzida'];

            mysqli_query($conexao, "INSERT INTO `tb_producao` (`id_producao`, `fk_funcionario`, `fk_status`, `dt_producao`, `fk_estoque`, `fk_servico`, `fk_manufaturado`, `qtd_mproduzidos`) 
            VALUES (DEFAULT, '$select_func', '$select_status', '$data_producao', '$qtd', '$select_servico', '$select_manu', '$qtd_produzida')");
            
            
        }
        
        
        ?>
    </body>
</html>
<style>
    .container{
        margin-top:100px;
        width:500px;
    }
</style>