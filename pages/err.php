<?php
header('HTTP/1.1 500 Internal Server Error');
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"></script>
    <Title>出错啦</Title>
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
        <span>Err<span class="mdui-typo-headline">连接数据库出现了一个错误</span></span>
    </div>
    <div class="mdui-valign mdui-main-404">
        <div>
            <a href="javascript:mdui.alert('如果您是本站管理，请检查您是否导入loveway.sql到本站数据库，并且是否config.php中的配置项，使其能正常登录数据库。如果您无法解决此问题，可以与本程序开发者联系<br>如果您是普通访客，请尝试刷新本页，并尝试与此站点的管理员联系。<br>-----此条消息由一位热爱二次元的童鞋编辑')" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">这是为什么</a>
            <a href="javascript:location.reload()" class="mdui-btn mdui-btn-raised mdui-ripple mdui-color-theme-accent">刷新本页面</a>
            <div>
            </div>

        </div>
    </div>
</body>

</html>
<?php
exit();
?>