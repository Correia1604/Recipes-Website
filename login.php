<!DOCTYPE html>
<html>
    <head>
        <title>Página de Login</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p"
         crossorigin="anonymous"/>
         <link rel="stylesheet" type="text/css" href="css/styles.css">
    </head>

    <body>
        <div class="container h-100">
            <div class="d-flex justify-content-center h-100">
                <div class="user_card">
                    <div class="d-flex justify-content-center">
                        <div class="icon_container">
                            <img src="images/icon.png" class="icon" alt="Receitas Culinárias">
                        </div>
                    </div>
                    <div class="d-flex justify-content-center form_container">
                        <form>
                            <div class="input-group mb-3">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="username" id="username" class="form-control input_user" placeholder="E-mail" required>
                            </div> 
                            <div class="input-group mb-2">
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control input_pass" placeholder="Palavra-Passe" required>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-center mt-3 login_container">
                        <button type="button" name="button" id="login" class="btn login_btn">Login</button>
                    </div>
                    <div class="mt-4">
                        <div class="d-flex justify-content-center links">
                            Não tem uma conta? <a href="registar.php" class="ml-2"> Registar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
        <script>
	$(function(){
		$('#login').click(function(evt){

			evt=evt?evt:window.event;

			if(evt){
				var username = $('#username').val();
				var password = $('#password').val();
			}

			evt.preventDefault();

			$.ajax({
				type: 'POST',
				url: 'jslogin.php',
				data:  {username: username, password: password},
				success: function(data){
					alert(data);
					if($.trim(data) === "Login efetuado com sucesso!"){
						setTimeout(' window.location.href =  "listarreceitas.php"', 1000);
					}else if($.trim(data) === "Entrada de admin"){
                        setTimeout(' window.location.href =  "conta.php"', 1000);
                    }
				},
				error: function(data){
					alert('Ocorreu um erro na operação!');
				}
			});

		});
	});
</script>
    </body>
</html>