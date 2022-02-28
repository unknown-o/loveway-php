<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');

if ($_COOKIE['loveway_token'] != md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time()))) {
    exit('{"code":-1,"msg":"鉴权失败！"}');
}

if ($ADMIN_PASS == "kagamine1234") {
    exit('{"code":-2,"msg":"弱密码禁止操作！请修改密码后登录！"}');
}

$pdo = pdoConnect();
$stmt = $pdo->prepare("UPDATE `loveway_config` SET `value`=? WHERE (`name`= ? )");
$stmt->bindValue(1, $_POST['value']);
$stmt->bindValue(2, $_POST['name']);
if ($stmt->execute()) {
    exit('{"code":1,"msg":"操作成功！"}');
} else {
    exit('{"code":-3,"msg":"操作失败！[UPDATE DATABASE]失败！"}');
}
