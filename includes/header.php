<!DOCTYPE html>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5">
    <title><?php if (!empty(getInfo($_GET['page']))) echo getInfo($_GET['page']) . ' - ';
            echo getInfo('title') ?></title>
    <meta name="keywords" content="<?php echo getInfo('keywords') ?>">
    <meta name="description" content="<?php echo getInfo('description') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css" integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js" integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A" crossorigin="anonymous"></script>
    <script src="https://static.llilii.cn/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://static.llilii.cn/libs/jquery/pjax/jquery.pjax.js"></script>
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

<body class="mdui-appbar-with-toolbar  mdui-theme-primary-pink mdui-theme-accent-pink ">
    <header class="mdui-appbar mdui-appbar-fixed">
        <audio src="<?php echo getInfo('audio') ?>" autoplay>
            您的浏览器不支持 audio 标签。
        </audio>
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white " mdui-drawer="{target: '#main-drawer', swipe: true}"><i class="mdui-icon material-icons">menu</i></span>
            <a href="../" class="mdui-typo-headline mdui-hidden-xs"><?php echo $title; ?></a>
            <div class="mdui-toolbar-spacer"></div>
            <button id="logout" onclick='clearAllCookie()' mdui-tooltip="{content: '退出登录'}" class="mdui-btn mdui-btn-icon mdui-ripple mdui-ripple-white"><i class="mdui-icon material-icons">code</i></button>
        </div>
    </header>
    <div class="mdui-drawer" id="main-drawer">
        <div class="mdui-list " mdui-collapse="{accordion: true}" style="margin-bottom: 76px;">
            <div class="mdui-list">
                <a href="/" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">home</i>
                    <div class="mdui-list-item-content">主页</div>
                </a>
                <a href="<?php if($REWRITE) echo '/'; else echo '/?page=';?>love" id="userPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">favorite</i>
                    <div class="mdui-list-item-content">去表白</div>
                </a>
                <a href="/" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">tag_faces</i>
                    <div class="mdui-list-item-content">更多功能</div>
                </a>
                <a href="/" id="indexPage" class="mdui-list-item mdui-ripple ">
                    <i class="mdui-list-item-icon mdui-icon material-icons">code</i>
                    <div class="mdui-list-item-content">关于本站</div>
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
        Go to <a href="/pjax.php">next page</a>.
    </div>

    <script>
        $(document).pjax('a', '#pjax-container')
        //document.getElementById('<?php if (empty($listName)) echo 'appm';
                                    else echo $listName; ?>').className += " mdui-list-item-active"
        //document.getElementById("logout").style.visibility = "<?php if ($logout) echo 'visible';
                                                                else echo 'hidden'; ?>";
    </script>