<?php

    if(!empty($_POST['mail']) && !empty($_POST['p_nome']) && !empty($_POST['u_nome']) && !empty($_POST['tel']) && !empty($_POST['password'])){
        if(strlen($_POST['password']) < 3 || strlen($_POST['password']) > 12){
            echo 'A palavra-passe deve conter entre 3 e 12 caracteres!';
        }
        else{
            include('config.php');


            $stmt = $pdo->prepare("INSERT INTO users (email, p_nome, u_nome, tel, password) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$_POST['mail'], $_POST['p_nome'], $_POST['u_nome'], $_POST['tel'], $_POST['password']]);
            $stmt = null;  
            
            
            echo 'Utilizador registado com sucesso!';
        }
    }
    else
    {
        echo 'Erro. Preencha todos os campos!';
    }
?>