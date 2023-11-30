<?php
    $msg;
    try {
        $email = $_POST["email"];
        $p_nome = $_POST['p_nome'];
        $u_nome = $_POST['u_nome'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        include("config.php");
        $sql = "update users set p_nome =:p_nome, u_nome =:u_nome, tel=:tel, password=:password where email=:email;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["p_nome"=>$p_nome, "u_nome"=>$u_nome, "tel"=>$tel, "password"=>$password, "email"=>$email]);
        $total = $stmt->rowCount();
    } catch (PDOException $e) {
        $msg = array("msg" => $e->getMessage());
    }
    echo json_encode($msg);
?>