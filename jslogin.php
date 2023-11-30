<?php 
    session_start();
    require_once('config.php');
    
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
    $stmtselect  = $pdo->prepare($sql);
    $result = $stmtselect->execute([$username, $password]);

	$stmt = $pdo->prepare("SELECT admin FROM users where email='$username'");
	$stmt->execute();
	$users = $stmt->fetchAll();
        
    if($result){
        $user = $stmtselect->fetch(PDO::FETCH_ASSOC);
        
        if($stmtselect->rowCount() > 0){
            if($user['admin'] == "sim")
            {
                echo 'Entrada de admin';
            }else {
                $_SESSION['userlogin'] = $user;
                echo 'Login efetuado com sucesso!';
            }
        }else{
            echo 'Utilizador inixistente!';		
        }
    }else{
        echo 'Erro ao ligar à base de dados!';
    };
?>