<!DOCTYPE html>
<html lang="en">

<head>
    <title>Página da Conta</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
    crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <header class="header">
            <h1 class="icon-header"><img class="icon-header-img" src="images/icon.png"></h1>
            <h2><button class="button-header"><a href="listarmensagens.php">Mensagens</a></button><button class="btn-sair"><a href="login.php">Sair</a></button></h2>
            <h3 class="titulo-editar">Editar Utilizadores</h3>
        </header>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
    <div class="container">
        <div id="menu"></div>
        <div class="row">
            <div class="col-9">
                <h3>Tabela de clientes</h3>
                <table class="table table-responsive table-striped table-bordered table-success">
                    <thead>
                        <td>E-mail</td>
                        <td>Primeiro Nome</td>
                        <td>Último Nome</td>
                        <td>Telefone</td>
                        <td>Password</td>
                        <td>Apagar Registo</td>
                    </thead>
                    <tbody id="tb">
                        <?php
                        function del($email)
                        {
                            return "<a name='del' data-email='" . $email . "' class='btn btn-danger' email='" . $email . "'>Apagar</a>";
                        }
                        function lnk($email){
                            return "<a href='updateuser.php?email=". $email ."'>". $email ."</a>";
                        }

                        include("config.php");
                        $stmt = $pdo->query("select * from users");
                        $user = $stmt->fetchAll();
                        
                        foreach ($user as $k => $item) {
                            echo "<tr>
                                        <td>" . lnk($item['email']) . "</td>
                                        <td>" . $item['p_nome']       . "</td>
                                        <td>" . $item['u_nome']   . "</td>
                                        <td>" . $item['tel']      . "</td>
                                        <td>" . $item['password']      . "</td>
                                        <td>" . del($item['email']) . "</td>
                                      </tr>";
                        }
                        ?>
                    </tbody>
                </table>
    </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
            $("[name='del']").click(function(evt) {
                evt = evt ? evt : window.event;
                evt.preventDefault();
                $(evt.target).css({
                    "background-color": "blue"
                });
                console.log($(evt.target).data('email'));
                $.ajax({
                    url: "deletecliente.php",
                    type: 'post',
                    datatype: 'json',
                    data: {
                        email: $(evt.target).data('email')
                    },
                    success: function(dados) {
                        console.log(dados);
                        if (dados.msg == 1) {
                            $(evt.target).closest("tr").remove();
                            $("#msg").html("Apagou");
                        }else{
                            alert("Cliente eliminado!");
                            setTimeout(' window.location.href =  "conta.php"', 1000);
                        }
                    },
                    error: function() {
                        alert("erro");
                    }
                });
            });
        });

        function del($email)
        {
            return "<a name='del' data-email='" + $email + "' class='btn btn-danger' email='" + $email + "'>Del</a>";
        }
        </script>
</body>

</html>