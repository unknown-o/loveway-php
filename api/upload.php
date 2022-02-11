<?php
header('content-type:application/json');
session_start();
include('../config.php');
include('../includes/function.php');

$filename = $_FILES['file']['name'];
if ($filename) {
    $postfix = ['.png', '.jpg', '.jpeg'];
    $file_postfix = strtolower(mb_substr($filename, mb_strrpos($filename, '.')));
    if (!in_array($file_postfix, $postfix)) {
        exit('{"code":-1, "msg":"上传失败！文件类型不符合要求！", "path":""}');
    }
    $image_type = ['image/png', 'image/jpg', 'image/jpeg'];
    if (!in_array($_FILES['file']['type'], $image_type)) {
        exit('{"code":-2, "msg":"上传失败！文件类型错误！", "path":""}');
    }
    if ($_FILES['file']['size'] > $MAX_UPLOAD_SIZE * 1024) {
        exit('{"code":-3, "msg":"上传失败！文件过大", "path":""}');
    }
    if (!getimagesize($_FILES['file']["tmp_name"])) {
        exit('{"code":-4, "msg":"上传失败！读取图像文件失败！", "path":""}');
    }
    $filename_new = md5($VERIFICATION_KEY . strval(time()));
    $result = move_uploaded_file(
        $_FILES["file"]["tmp_name"],
        $UPLOAD_PATH . $filename_new . $file_postfix
    );
    if ($result) {
        exit('{"code":1, "msg":"上传成功！", "path":"' . $UPLOAD_PATH . $filename_new . $file_postfix . '"}');
    } else {
        exit('{"code":-5, "msg":"上传失败！未知错误！", "path":""}');
    }
}