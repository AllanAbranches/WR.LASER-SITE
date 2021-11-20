<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "css/index.css"> 

        <title>Wrlazer</title>
    </head>
    <body>
        <div class="topo-index">
            <img class="logo-index" src="./img/logo.png" alt="" > 
        </div> 
        <br><br>
        <center>
            <div class="exib-prod">
               <?php 
               require_once 'MetodosDAO.php';
               $wrlazer = new Wrlazer;
               $wrlazer->produtos();
               ?>
            </div>
        </center>
    </body>
</html>
