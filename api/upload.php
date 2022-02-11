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
    exit('{"code":-2,"msg":"上传失败！请检查您的系统时间！"}');
}

if (!$UPLOAD_IMAGE) {
    exit('{"code":-5, "msg":"上传失败！上传接口被关闭！", "path":""}');
}

$filename = $_FILES['file']['name'];
if ($filename) {
    $postfix = ['.png', '.jpg', '.jpeg'];
    $file_postfix = strtolower(mb_substr($filename, mb_strrpos($filename, '.')));
    if (!in_array($file_postfix, $postfix)) {
        exit('{"code":-6, "msg":"上传失败！文件类型不符合要求！", "path":""}');
    }
    $image_type = ['image/png', 'image/jpg', 'image/jpeg'];
    if (!in_array($_FILES['file']['type'], $image_type)) {
        exit('{"code":-7, "msg":"上传失败！文件类型错误！", "path":""}');
    }
    if ($_FILES['file']['size'] > $MAX_UPLOAD_SIZE * 1024) {
        exit('{"code":-8, "msg":"上传失败！文件过大", "path":""}');
    }
    if (!getimagesize($_FILES['file']["tmp_name"])) {
        exit('{"code":-9, "msg":"上传失败！读取图像文件失败！", "path":""}');
    }
    $filename_new = md5($VERIFICATION_KEY . strval(time()));
    $result = move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        $UPLOAD_PATH . $filename_new . $file_postfix
    );
    if ($result) {
        exit('{"code":1, "msg":"上传成功！", "path":"' . $UPLOAD_PATH . $filename_new . $file_postfix . '"}');
    } else {
        exit('{"code":-11, "msg":"上传失败！未知错误！", "path":""}');
    }
} else {
    exit('{"code":-12, "msg":"上传失败！没有文件！", "path":""}');
}
