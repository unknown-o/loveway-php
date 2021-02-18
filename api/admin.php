<?php
header('content-type:application/json');
include('../config.php');
include('../includes/function.php');
$pdo=pdoConnect();
$stmt = $pdo->prepare("UPDATE `loveway_config` SET `value`=? WHERE (`name`= ? )");
$stmt->bindValue(1, $_POST['value']);
$stmt->bindValue(2, $_POST['name']);
if($stmt->execute()){
    exit('{"code":1,"msg":"success"}');
} else {
    exit('{"code":-1,"msg":"unknown error"}');
}
?>