<?php 
    include 'config.php';

    $stmt = $pdo->prepare("call menu();");
    $stmt->execute();
    $treedata = $stmt->fetchAll();
    $tempdata = [];

    foreach($treedata as $k=>&$v){
        $tempdata[$v['email']]=&$v;
    }
    foreach($treedata as $k=>&$v){
        if($v['parent_id'] && isset($tempdata[$v['parent_id']])){
            $tempdata[$v['parent_id']]['nodes'][]=&$v;
        }
    }
    foreach($treedata as $k=>&$v){
        if($v['parent_id'] && $tempdata[$v['parent_id']]){
            unset($treedata[$k]);
        }
    }




    echo json_encode($treedata);
?>