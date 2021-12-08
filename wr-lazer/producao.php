<?php include 'conexao.php'; ?>
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
                        <?php
                        $select_func = "SELECT*FROM tb_funcionario";
                        $result_func = mysqli_query($conexao, $select_func);
                        ?>
                        <?php while ($row_func = mysqli_fetch_assoc($result_func)) { ?>
                        <option value="<?php echo $row_func['id_funcionario']; ?>"><?php echo $row_func['nome_funcionario']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <!--SELECT STATUS-->
                    <label class="form-label">Status:</label>
                    <select name="select_stt" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php
                        $select_func = "SELECT*FROM tb_status";
                        $result_func = mysqli_query($conexao, $select_func);
                        ?>
                        <?php while ($row_func = mysqli_fetch_assoc($result_func)) { ?>
                        <option value="<?php echo $row_func['id_status']; ?>"><?php echo $row_func['prod_status']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                <label class="form-label">Data da Producao</label>
                  <input type="date" class="form-control" name="data" id="">
                </div>
                <div class="col-md-6">
                    <!--SELECT ESTOQUE-->
                    <label class="form-label">ESTOQUE QTD:</label>
                    <select name="select_estoque" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php
                        $select_func = "SELECT*FROM tb_estoque";
                        $result_func = mysqli_query($conexao, $select_func);
                        ?>
                        <?php while ($row_func = mysqli_fetch_assoc($result_func)) { ?>
                        <option value="<?php echo $row_func['id_estoque']; ?>"><?php echo $row_func['qtd_materia_prima']; ?></option>
                        <?php } ?>
                    </select>
                </div>
             
                </div>
                <div class="col-md-6">
                    <!--SELECT SERVICO-->
                    <label class="form-label">SERVICO:</label>
                    <select name="select_ser" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php
                        $select_func = "SELECT*FROM tb_servico";
                        $result_func = mysqli_query($conexao, $select_func);
                        ?>
                        <?php while ($row_func = mysqli_fetch_assoc($result_func)) { ?>
                        <option value="<?php echo $row_func['id_servico']; ?>"><?php echo $row_func['Descricao_servico']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                    <!--SELECT MANUFATURADO-->
                    <label class="form-label">MANUFATURADO:</label>
                    <select name="select_manu" class="form-control" id="">
                        <option selected="selected">Selecione...</option>
                        <?php
                        $select_func = "SELECT*FROM tb_manufaturado";
                        $result_func = mysqli_query($conexao, $select_func);
                        ?>
                        <?php while ($row_func = mysqli_fetch_assoc($result_func)) { ?>
                        <option value="<?php echo $row_func['id_manufaturado']; ?>"><?php echo $row_func['nome_manufaturado']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-6">
                <label class="form-label">QUANTIDADE :</label>
                <input type="text" class="form-control" name="qtd" placeholder="QUANTIDADE"><br><br>
                        </div>
                <input type="submit" name="btn_cad" class="btn btn-secondary" value="CADASTRAR">
                </div>
            </form>
        </div>
        <?php
        require_once 'MetodosDAO.php';
        $wrlazer = new Wrlazer();

        if (isset($_POST['btn_cad'])) {
            $select_func = $_POST['select_func'];
            $select_stt = $_POST['select_stt'];
            $date = $_POST['data'];
            $select_est = $_POST['select_estoque'];
            $select_ser = $_POST['select_ser'];
            $select_manu = $_POST['select_manu'];
            $qtd = $_POST['qtd'];

            mysqli_query(
                $conexao,
                "INSERT INTO `tb_producao` (`id_producao`, `fk_funcionario`, `fk_status`, `dt_producao`, `fk_estoque`, `fk_servico`, `fk_manufaturado`, `qtd_mproduzidos`) 
            VALUES (DEFAULT, '$select_func', '$select_stt', '$date', '$select_est', '$select_ser', '$select_manu', '$qtd')"
            );
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