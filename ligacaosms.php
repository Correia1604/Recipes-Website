<?php

    if(!empty($_POST['mail']) && !empty($_POST['mensagem'])){
            include('config.php');


            $stmt = $pdo->prepare("INSERT INTO sms (email, sms) VALUES (?, ?)");
            $stmt->execute([$_POST['mail'], $_POST['mensagem']]);
            $stmt = null;  
            
            echo 'Mensagem enviada!';
    }
    else
    {
        echo 'Erro. Preencha todos os campos!';
    }
?>