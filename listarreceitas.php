<!DOCTYPE html>
<html>
    <head>
        <title>Receitas</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <header class="header">
                <h1 class="icon-header"><img class="icon-header-img" src="images/icon.png"></h1>
                <h2><button class="button-header"><a href="menuinicial.php">Inserir</a></button><button class="btn-sair"><a href="login.php">Sair</a></button></h2>
                <h3 class="titulo-editar">Receitas</h3>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
                <?php
                    include("config.php");
                    $stmt = $pdo->query("select * from receitas");
                    $user = $stmt->fetchAll();
                    foreach($user as $k => $row){
                      echo "
                      <div class='d-flex justify-content-center receitas'>
                      <div class='card'>
                      <div class='card-body'>
                        <div class='tbook' align='center'>
                          <div class='tr'>
                           <div class='titulo_r'>".$row['titulo']."</div>
                           <div class='email_r'>".$row['email_autor']."</div>
                           <div class='ingredientes_r'>".$row['ingredientes']."</div>
                           <div class='descricao_r'>".$row['descricao']."</div>
                          </div>
                        </div>
                        </div>
                        </div>
                        </div>";
                    }
                ?>
        <a class="fixedButton" href="enviarsms.php">
            <div class="roundedFixedBtn"><i class="bi bi-chat-dots"></i></div>
        </a>
    </body>
</html>