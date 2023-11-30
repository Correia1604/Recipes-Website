<?php

    if(!empty($_POST['mail']) && !empty($_POST['titulo']) && !empty($_POST['ingredientes']) && !empty($_POST['descricao'])){
            include('config.php');


            $stmt = $pdo->prepare("INSERT INTO receitas (email_autor, titulo, descricao, ingredientes) VALUES (?, ?, ?, ?)");
            $stmt->execute([$_POST['mail'], $_POST['titulo'], $_POST['descricao'], $_POST['ingredientes']]);
            $stmt = null;  
            
            
            echo 'Receita registada com sucesso!';
    }
    else
    {
        echo 'Erro. Preencha todos os campos!';
    }
?>