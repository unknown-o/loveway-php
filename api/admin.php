<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');
switch ($_POST['mode']) {
    case "login":
        $timestamp = $_POST['timestamp'];
        if ($_SESSION['vcode'] != md5($_POST['vcode'] . $VERIFICATION_KEY) && $IMAGE_VERIFICATION) {
            exit('{"code":-1,"msg":"抱歉，人机验证失败","result":""}');
        }
        if ($timestamp - time() > 60 || time() - $timestamp > 60) {
            exit('{"code":-2,"msg":"请求失败！请检查您的系统时间！"}');
        }
        if ($_POST['username'] == $ADMIN_USER && $_POST['password'] == $ADMIN_PASS) {
            setcookie("loveway_token", md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time())), time() + 3600, '/');
            exit('{"code":1,"msg":"登录成功！"}');
        } else {
            exit('{"code":-1,"msg":"登录失败！用户名或密码错误！"}');
        }
    case "updateConfig":
        if ($_COOKIE['loveway_token'] == md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time()))) {
            $pdo = pdoConnect();
            $stmt = $pdo->prepare("UPDATE `loveway_config` SET `value`=? WHERE (`name`= ? )");
            $stmt->bindValue(1, $_POST['value']);
            $stmt->bindValue(2, $_POST['name']);
            if ($stmt->execute()) {
                exit('{"code":1,"msg":"操作成功！"}');
            } else {
                exit('{"code":-3,"msg":"操作失败！[UPDATE DATABASE]失败！"}');
            }
        } else {
            exit('{"code":-2,"msg":"校验登录token失败！"}');
        }
    case "delete":
        if ($_COOKIE['loveway_token'] == md5($ADMIN_USER . $ADMIN_PASS . 'KAGAMINE WORLD!' . date('Y-m-d', time()))) {
            $pdo = pdoConnect();
            $stmt = $pdo->prepare("DELETE FROM `loveway_data` WHERE `id` = ? ");
            $stmt->bindValue(1, $_POST['id']);
            if ($stmt->execute()) {
                exit('{"code":1,"msg":"删除成功！"}');
            } else {
                exit('{"code":-3,"msg":"操作失败！[DELETE DATABASE]失败！"}');
            }
        } else {
            exit('{"code":-2,"msg":"校验登录token失败！"}');
        }
    default:
        exit('{"code":-5,"msg":"缺失参数！"}');
}
