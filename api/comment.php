<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');
$id = htmlspecialchars($_POST['id']);
$nickname = htmlspecialchars($_POST['nickname']);
$content = htmlspecialchars($_POST['content']);
$timestamp = intval(htmlspecialchars($_POST['timestamp']));

if ($_SESSION['vcode'] != md5($_POST['vCode'] . $VERIFICATION_KEY) && $IMAGE_VERIFICATION) {
    exit('{"code":-2,"msg":"抱歉，人机验证失败","result":""}');
}

if ($timestamp - time() > 60 || time() - $timestamp > 60) {
    exit('{"code":-5,"msg":"提交失败！请检查您的系统时间！"}');
}

if (empty($id) || empty($nickname) || empty($content)) {
    exit('{"code":-6,"msg":"表单提交失败！某些参数为空！"}');
}

try {
    $pdo = pdoConnect();
    $stmt = $pdo->prepare("select * from loveway_data WHERE id=?");
    $stmt->bindValue(1, $id);
    if ($stmt->execute()) {
        $rows = $stmt->fetchAll();
        $row = $rows[0];
        $inputContent = array("time" => time(), "nickname" => $nickname, "content" => $content);
        $commentArr = json_decode($row['comment']);
        $commentArr[count($commentArr)] = $inputContent;
        $stmt = $pdo->prepare("UPDATE loveway_data SET comment=? WHERE id=?");
        $stmt->bindValue(1, json_encode($commentArr));
        $stmt->bindValue(2, $id);
        if ($stmt->execute()) {
            exit('{"code":1,"commentNum":'.strval(count($commentArr)).',"commentSrc":'.json_encode($commentArr).',"msg":"评论提交成功！"}');
        } else {
            exit('{"code":-2,"msg":"抱歉，出现了一个未知错误！请与管理员联系！"}');
        }
    } else {
        exit('{"code":-2,"msg":"抱歉，出现了一个未知错误！请与管理员联系！"}');
    }
} catch (PDOException $e) {
    exit('{"code":-1,"msg":"抱歉，出现了一个致命错误！请与管理员联系！"}');
}