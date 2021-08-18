<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');
$id = htmlspecialchars($_POST['id']);
$timestamp = intval(htmlspecialchars($_POST['timestamp']));

if ($_SESSION['vcode'] != md5($_POST['vCode'] . $VERIFICATION_KEY) && $IMAGE_VERIFICATION) {
    exit('{"code":-2,"msg":"抱歉，人机验证失败","result":""}');
}

if ($timestamp - time() > 60 || time() - $timestamp > 60) {
    exit('{"code":-5,"msg":"提交失败！请检查您的系统时间！"}');
}

try {
    $pdo = pdoConnect();
    $stmt = $pdo->prepare("select * from loveway_data WHERE id=?");
    $stmt->bindValue(1, $id);
    if ($stmt->execute()) {
        $rows = $stmt->fetchAll();
        $row = $rows[0];
        $stmt = $pdo->prepare("UPDATE loveway_data SET favorite=? WHERE id=?");
        $stmt->bindValue(1, intval($row['favorite'])+1);
        $stmt->bindValue(2, $id);
        if ($stmt->execute()) {
            exit('{"code":1,"favorite":"'.strval(intval($row['favorite'])+1).'","msg":"点赞成功！"}');
        } else {
            exit('{"code":-2,"msg":"抱歉，出现了一个未知错误！请与管理员联系！"}');
        }
    } else {
        exit('{"code":-2,"msg":"抱歉，出现了一个未知错误！请与管理员联系！"}');
    }
} catch (PDOException $e) {
    exit('{"code":-1,"msg":"抱歉，出现了一个致命错误！请与管理员联系！"}');
}