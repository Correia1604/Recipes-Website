<?php
    if(isset($_POST["email"])){
        $email=  $_POST["email"];
        include ("config.php");
        try {
            $sql ="delete from users where email=:email";
            $stmt=$pdo->prepare($sql);
            $stmt->execute(["email"=>$email]);
            $total = $stmt->rowCount();
            $msg=array("msg"=>$total);
        }catch (PDOException $e ) {
                $msg=array("msg"=>$e->getCode());
        }
    }else{
            $msg=array("msg"=>"erro");
        }
        echo json_encode($msg);
?>