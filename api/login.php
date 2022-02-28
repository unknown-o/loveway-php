<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');

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
