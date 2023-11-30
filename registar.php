<!DOCTYPE html>
<html>
    <head>
        <title>Página de Registo</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card-registar">
                    <div class="d-flex justify-content-center">
                        <div class="icon_container">
                            <img src="images/icon.png" class="icon" alt="Receitas Culinárias">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form class="form" id="form">
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-at"></i></span>
                                </div>
                                <input type="text" name="mail" id="mail" class="form-control" placeholder="E-mail" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="p_nome" id="p_nome" class="form-control" placeholder="Primeiro nome" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="u_nome" id="u_nome" class="form-control" placeholder="Último nome" required>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-mobile"></i></span>
                                </div>
                                <input type="text" name="tel" id="tel" class="form-control" placeholder="Telemóvel" required>
                            </div>
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Palavra-passe" required>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="button" name="button" id="criar" class="btn login_btn">Registar</button>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Já tem uma conta? <a href="login.php" class="ml-2">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $("#criar").click(function(evt){
                        //console.log("click");   //18/01 - funciona

                        var mail = $('#mail').val();
                        var p_nome = $('#p_nome').val();
                        var u_nome = $('#u_nome').val();
                        var tel = $('#tel').val();
                        var password = $('#password').val();

                        evt=evt?evt:window.event;
                        evt.preventDefault();
                        var frm = document.getElementById("form");
                        var formdata = new FormData(frm);
                        for(var item of formdata)console.log(item);
                        $.ajax({
                        url:'inseriruser.php',
                        method:'post',
                        processData:false,
                        contentType:false,
                        data: formdata,
                        success: function(dados){
                            alert(dados);
                            console.log("sss" + dados);
                            if($.trim(dados) === 'Utilizador registado com sucesso!'){
                                setTimeout(' window.location.href =  "login.php"', 1000);
                            }
                        },
                        error:function(err, data){console.log(data);console.log("erro");alert(err);},
                        });
                    });
            });
        </script>
    </body>
</html>