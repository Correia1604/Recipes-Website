<!DOCTYPE html>
<html>
    <head>
        <title>Mensagens</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <header class="header">
                <h1 class="icon-header"><img class="icon-header-img" src="images/icon.png"></h1>
                <h2><button class="button-header"><a href="conta.php">Contas</a></button><button class="btn-sair"><a href="login.php">Sair</a></button></h2>
                <h3 class="titulo-editar">Mensagens</h3>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
                <?php
                    include("config.php");
                    $stmt = $pdo->query("select * from sms");
                    $user = $stmt->fetchAll();
                    foreach($user as $k => $row){
                      echo "
                      <div class='d-flex justify-content-center mensagens'>
                      <div class='card'>
                      <div class='card-body'>
                        <div class='tbook' align='center'>
                          <div class='tr'>
                           <div class='email_r'>".$row['email']."</div>
                           <div class='mensagem_r'>".$row['sms']."</div>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>";
                    }
                ?>
    </body>
</html>