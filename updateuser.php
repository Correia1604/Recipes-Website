<!DOCTYPE html>
<html>
	<head>
        <title>Editar Utilizador</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

<body>
        <header class="header">
            <h1 class="icon-header"><img class="icon-header-img" src="images/icon.png"></h1>
            <h2><button class="button-header"><a href="conta.php">Conta</a></button></h2>
            <h3 class="titulo-receita">Editar utilizador</h3>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    <?php
        try {
        include("config.php");
        $sql = "select * from users where email=:email;";
        $email = $_GET['email'];
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["email" => $email]);
        $user = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    ?>

    <div class="d-flex justify-content-center receitas">
            <form class="form-edit" id="form-edit" method="POST">
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="email" id="email" class="form-control input_user" value="<?php echo ($user != Null) ? $user['email'] : ""; ?>" placeholder="" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="p_nome" id="p_nome" class="form-control input_user" value="<?php echo ($user != Null) ? $user['p_nome'] : ""; ?>" placeholder="" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="u_nome" id="u_nome" class="form-control input_user" value="<?php echo ($user != Null) ? $user['u_nome'] : ""; ?>" placeholder="" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="tel" id="tel" class="form-control input_user" value="<?php echo ($user != Null) ? $user['tel'] : ""; ?>" placeholder="" required>
                </div>
                <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="password" id="password" class="form-control input_user" value="<?php echo ($user != Null) ? $user['password'] : ""; ?>" placeholder="" required>
                </div>
                <div class="form-group p-4">
                    <button type="button" name="button" id="save" class="btn login_btn">Guardar</button>
                    &nbsp;
                    <input name="btcancel" id="btcancel" class="btn btn-danger" type="button" value="Cancel">
                    </div>
            </form>
        </div>

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            $("#save").click(function(evt) {
                    evt = evt ? evt : window.event;
                    evt.preventDefault();
                    var frm = document.getElementById("form-edit");
                    var formdata = new FormData(frm);
                    for (var item of formdata) console.log(item);
                    $.ajax({
                        url:'updatecliente.php',
                        method:'post',
                        processData:false,
                        contentType:false,
                        data:formdata,
                        success:function(dados){
                            console.log(dados); 
                            alert("Utilizador editado com sucesso.");
                            setTimeout(' window.location.href =  "conta.php"', 1000);
                        },
                        error:function(err){alert(err)},
                    });
                });
        </script>
</html>