<?php
header('HTTP/1.1 404 Not Found');
if ($templateMode) {
    include('./includes/header.php');
}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#3f51b5">
    <meta name="mdui-main-color" content="#3f51b5">
    <Title>页面走丢啦 - <?php echo getInfo('title') ?></Title>
    <style>
        .mdui-background-404 {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 61.8%;
            text-align: center
        }

        .mdui-background-404 {
            background-color: #212121 !important
        }

        .mdui-background-404 span {
            position: relative;
            display: inline-block;
            width: 100%;
            letter-spacing: 0 !important
        }

        .mdui-background-404 span span {
            display: inline-block;
            margin: -10px 0 0 !important;
            opacity: .54
        }

        .mdui-main-404 {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 38.2%
        }

        .mdui-main-404 a {
            margin: 10px 20px;
            padding: 0 22px;
            height: 55px;
            font-size: 20px;
            line-height: 55px
        }

        .mdui-main-404 div {
            width: 100%;
            text-align: center
        }
    </style>
</head>

<body class="mdui-theme-primary-indigo mdui-theme-accent-pink">
    <div class="mdui-color-theme mdui-typo-display-4 mdui-valign mdui-background-404">
        <span>404<span class="mdui-typo-headline">这个页面似乎找不到了哦</span></span>
    </div>
    <div class="mdui-valign mdui-main-404">
        <div>
            <a href="/" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">返回主页面</a>
            <a href="../" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">返回上一级</a>
            <div>
            </div>

        </div>
    </div>
</body>

</html>