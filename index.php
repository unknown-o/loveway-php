<?php
// [未知表白墙]
// Copyright (C) 2021， 吴先森
// 本程序是一个自由软件，你可以重新分发它，可以修改它，但要遵守GPL 2.0版本或者后续其他版本。
// 我们希望本程序是有用的，但是我们不保证它能用，不保证它好用，我们不提供任何保证。
// 更多请见GPL全文，如果理解不了，找人话版看看。
// 按道理你在得到本软件时，应该已经得到一份GPL，如果你没找到，写信给自由软件基金会（FSF）：
// 51 Franklin Street, Fifth Floor, Boston, MA 02110‐1301, USA
// i@mr-wu.top
include('./config.php');
include('./includes/function.php');
$templateMode = empty($_GET['_pjax']);
if ($templateMode && $_GET['page'] != 'card') {
    include('./includes/header.php');
}
switch ($_GET['page']) {
    case "submit":
        include('./pages/submit.php');
        break;
    case "more":
        include('./pages/more.php');
        break;
    case "about":
        include('./pages/about.php');
        break;
    case "card":
        include('./pages/card.php');
        break;
    default:
        include('./pages/homepage.php');
}
if ($templateMode && $_GET['page'] != 'card') {
    include('./includes/footer.php');
}
