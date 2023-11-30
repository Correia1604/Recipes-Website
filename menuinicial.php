<!DOCTYPE html>
<html>
	<head>
        <title>Menu Inicial</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <header class="header">
            <h1 class="icon-header"><img class="icon-header-img" src="images/icon.png"></h1>
            <h2><button class="button-header"><a href="listarreceitas.php">Receitas</a></button><button class="btn-sair"><a href="login.php">Sair</a></button></h2>
            <h3 class="titulo-receita">Inserir receita</h3>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="d-flex justify-content-center receitas">
            <form class="form-receitas" id="form-receitas">
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="mail" id="mail" class="form-control input_user" placeholder="E-mail" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="titulo" id="titulo" class="form-control input_user" placeholder="Título" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="ingredientes" id="ingredientes" class="form-control input_user" placeholder="Ingredientes" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <span class="input-group-text"></span>
                    </div>
                    <input type="text" name="descricao" id="descricao" class="form-control input_user" placeholder="Descrição" required>
                </div>
                <div class="input-group1 mb-3">
                    <div class="input-group-append">
                        <button type="button" name="bt_submeter" id="bt_submeter" class="bt_submeter">Submeter</button>
                    </div>
                </div>
            </form>
        </div>
        <a class="fixedButton" href="enviarsms.php">
            <div class="roundedFixedBtn"><i class="bi bi-chat-dots"></i></div>
        </a>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            $(function(){
                $("#bt_submeter").click(function(evt){
                        //console.log("click");   //18/01 - funciona

                        var mail = $('#mail').val();
                        var titulo = $('#titulo').val();
                        var descricao = $('#descricao').val();
                        var ingredientes = $('#ingredientes').val();

                        evt=evt?evt:window.event;
                        evt.preventDefault();
                        var frm = document.getElementById("form-receitas");
                        var formdata = new FormData(frm);
                        for(var item of formdata)console.log(item);
                        $.ajax({
                        url:'receitasinsert.php',
                        method:'post',
                        processData:false,
                        contentType:false,
                        data: formdata,
                        success: function(dados){
                            alert(dados);
                            console.log("sss" + dados);
                            if($.trim(dados) === 'Receita registada com sucesso!'){
                                setTimeout(' window.location.href =  "menuinicial.php"', 1000);
                            }
                        },
                        error:function(err, data){console.log(data);console.log("erro");alert(err);},
                        });
                    });
            });
        </script>
    </body>
</html>