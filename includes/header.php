<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title><?php if (!empty(getInfo($_GET['page']))) echo getInfo($_GET['page']) . ' - ';
            echo getInfo('title'); ?></title>
    <meta name="keywords" content="<?php echo getInfo('keywords') ?>">
    <meta name="description" content="<?php echo getInfo('description') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css" />
    <script src="https://static.llilii.cn/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://static.llilii.cn/libs/pjax/jquery.pjax.js"></script>
    <script src="https://static.llilii.cn/libs/md5/jquery.md5.js"></script>
    <script src="https://static.llilii.cn/libs/clipboard/clipboard.min.js"></script>
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
    <header class="mdui-appbar mdui-appbar-fixed">
        <audio src="<?php echo getInfo('audio') ?>" autoplay>
            您的浏览器不支持 audio 标签。
        </audio>
        <div class="mdui-progress" id="isLoading">
            <div class="mdui-progress-indeterminate"></div>
        </div>
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white " onclick="inst.toggle();"><i class="mdui-icon material-icons">menu</i></span>
            <a href="../" class="mdui-typo-headline mdui-hidden-xs"><?php echo getInfo('title'); ?></a>
            <div class="mdui-toolbar-spacer"></div>
            <button id="logout" onclick='window.open("https://www.wunote.cn")' mdui-tooltip="{content: '吴先森的笔记'}" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">code</i></button>
        </div>
    </header>
    <div class="mdui-drawer" id="main-drawer">
        <div class="mdui-list " mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-list">
                <a href="/" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                    <div class="mdui-list-item-content">主页</div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>submit" id="userPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">favorite</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('submit') ?></div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>more" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">tag_faces</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('more') ?></div>
                </a>
                <a href="<?php if ($REWRITE) echo '/';
                            else echo '/?page='; ?>about" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                    <div class="mdui-list-item-content"><?php echo getInfo('about') ?></div>
                </a>
            </div>
            <div class="copyright">
                <div class="mdui-typo">
                    <p class="mdui-typo-caption-opacity">© 2021 UnknownO</p>
                    <p class="mdui-typo-caption-opacity">
                        Powered by <a href="https://mdui.org" target="_blank">MDUI</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="mdui-container" id="pjax-container" style="max-width: 800px; ">