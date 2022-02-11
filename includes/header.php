<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title><?php $subPageName = $_GET['page'];
            if (!empty(getInfo($subPageName))) echo getInfo($subPageName) . ' - ';
            echo $siteTitle ?></title>
    <meta name="keywords" content="<?php echo getInfo('keywords') ?>">
    <meta name="description" content="<?php echo getInfo('description') ?>">
    <link rel="stylesheet" href="/static/mdui/css/mdui.min.css" />
    <script src="https://static.llilii.cn/libs/loveway/main.js"></script>
    <script src="/static/mdui/js/mdui.min.js"></script>
    <script src="/static/jquery.min.js"></script>
    <script src="/static/jquery.pjax.js"></script>
    <script src="/static/jquery.md5.js"></script>
    <script src="/static/clipboard.min.js"></script>
    <script src="/static/main.js"></script>
    <style>
        .copyright {
            box-sizing: border-box;
            width: 100%;
            padding: 10px 16px;
            position: absolute;
            bottom: 0;
        }

        a {
            text-decoration: none
        }
    </style>
</head>

<body class="mdui-drawer-body-left mdui-bottom-nav-fixed mdui-appbar-with-toolbar mdui-theme-primary-pink mdui-theme-accent-pink mdui-theme-layout-auto mdui-loaded">
    <header id="appbar" class="mdui-appbar mdui-appbar-fixed">
        <audio src="<?php echo getInfo('audio') ?>" loop autoplay>
            抱歉...您的浏览器暂不支持audio标签哦！
        </audio>
        <div class="mdui-progress" id="isLoading">
            <div class="mdui-progress-indeterminate"></div>
        </div>
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white " onclick="inst.toggle();"><i class="mdui-icon material-icons">menu</i></span>
            <a href="../" class="mdui-typo-headline mdui-hidden-xs"><?php echo $siteTitle; ?></a>
            <div class="mdui-toolbar-spacer"></div>
            <button id="logout" onclick='window.open("https://www.wunote.cn")' mdui-tooltip="{content: '吴先森的笔记'}" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">code</i></button>
        </div>
    </header>
    <div class="mdui-drawer" id="main-drawer">
        <div class="mdui-list " mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-list">
                <a href="/" id="homePage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                    <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                    <div class="mdui-list-item-content">主页</div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>submit" id="submitPage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                    <i class="mdui-list-item-icon mdui-icon material-icons">favorite</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('submit') ?></div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>more" id="morePage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                    <i class="mdui-list-item-icon mdui-icon material-icons">tag_faces</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('more') ?></div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>about" id="aboutPage" class="mdui-list-item mdui-ripple" style="border-radius: 16px;">
                    <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('about') ?></div>
                </a>
            </div>
            <div class="copyright">
                <div class="mdui-typo">
                    <!-- 本程序使用GPL2.0协议开源，请遵守此协议，请勿删除本处版权，否则原作者保留一切法律权利 -->
                    <!-- 如果看不懂GPL2.0协议请自行查看根目录人话版解释。如果想删除本处版权的请直接不要使用本程序。 -->
                    <p class="mdui-typo-caption-opacity">© 2021 <a href="https://www.wunote.cn" target="_blank">UnknownO</a></p>
                    <p class="mdui-typo-caption-opacity">
                        Powered by <a href="https://mdui.org" target="_blank">MDUI</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-container" id="pjax-container" style="max-width: 800px;">