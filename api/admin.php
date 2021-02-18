<?php
header('content-type:application/json');
include('../config.php');
include('../includes/function.php');
switch ($_POST['mode']) {
    case "login":
        if ($_POST['username'] == $ADMIN_USER && $_POST['password'] == $ADMIN_PASS) {
            setcookie("loveway_token", md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time())), time()+3600,'/');
            exit('{"code":1,"msg":"success"}');
        } else {
            exit('{"code":-1,"msg":"username or password error"}');
        }
    case "updateConfig":
        if ($_COOKIE['loveway_token'] == md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time()))) {
            $pdo = pdoConnect();
            $stmt = $pdo->prepare("UPDATE `loveway_config` SET `value`=? WHERE (`name`= ? )");
            $stmt->bindValue(1, $_POST['value']);
            $stmt->bindValue(2, $_POST['name']);
            if ($stmt->execute()) {
                exit('{"code":1,"msg":"success"}');
            } else {
                exit('{"code":-3,"msg":"unknown error"}');
            }
        } else {
            exit('{"code":-2,"msg":"token error"}');
        }
    default:
        exit('{"code":-5,"msg":"mode error"}');
}
